@extends('room.index')



@section('style')
    <style>
        .other_user{
            background-color: #a09a9a;
            padding: 6px 25px;
            /* width: 50%; */
            border-radius: 20px;
            display: inline-block;
            color: white;
            margin: 0;
        }

        .authed_user{
            background-color: #3d58a4;
            padding: 6px 25px;
            border-radius: 20px;
            display: inline-block;
            color: white;
            margin: 0;
        }
    </style>
@stop


@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 id="other_user_h4">
                            <!-- here is code from js ( ajax ) -->
                        </h4>
                    </div>
                    <div class="card-body" id="message-list">
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <div id="put_in">
                                    <!-- here is code from js ( ajax ) -->
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
{{--                        <form method="post" id="send_message" action="{{route('send_message')}}">--}}
{{--                            @csrf--}}
                        <input type="hidden" name="sender_id" value="{{auth()->id()}}">
                        <input type="hidden" name="receiver_id" value="">
                            <div class="input-group">
                                <input type="text" id="message-input" name="message" class="form-control" placeholder="Type your message">
                                <button id="send_message" class="btn btn-primary"><i class="fa fa-send"></i></button>
                            </div>
{{--                        </form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop




@section('script')
    <script>
        $(document).ready(function(){

            // Fetch chat ajax
            // function intervalId(){
            setInterval(function(){
                console.log('dsa');
                $.ajax({
                    url: "{{route('getChats')}}",
                    // url: "/getChats",
                    type: 'post',
                    data : {
                        '_token' : "{{csrf_token()}}",
                        'user_id'     : {{$user_id}},
                    },
                    dataType: 'json',
                    success: function(response){

                        createRows(response);
                    }
                });
                }, 1000);
            // }
            // intervalId(); // call the function



            // Create table rows
            function createRows(response){

                $('#put_in').empty(); // Empty <tbody>

                $.each (response.chats, function (key, value) {

                    $("#put_in").prepend(
                        "<div class='div_message'>"+
                        "<p class='p_message'>" + value.message + "</p>"+
                        "</div>"
                    );

                    if (value.sender_id !== {{auth()->id()}}) {
                        $('.p_message').attr('class',"other_user");
                        $('.div_message').attr('class',"text-left mt-2");
                    }
                    else {
                        $('.p_message').attr('class',"authed_user");
                        $('.div_message').attr('class',"text-right mt-2");

                        // $('input[name="receiver_id"]').val(value.sender_id);
                        // document.getElementById('other_user_h4').innerText = value.sender.name;
                    }


                });



                if (response.other_user.sender_id !== {{auth()->id()}}) {
                   document.getElementById('other_user_h4').innerText = response.other_user.sender.name;
                    $('input[name="receiver_id"]').val(response.other_user.sender_id);
                }
                else {
                     document.getElementById('other_user_h4').innerText = response.other_user.receiver.name;
                    $('input[name="receiver_id"]').val(response.other_user.receiver_id);
                }




                // $.each (response.other_user, function (key, value) {
                // $('input[name="receiver_id"]').val(response.other_user['sender_id']);


                // });

            }



            $('#send_message').click(function (){
            // $('#send_message').submit(function (e){
            //     e.preventDefault();

                var sender_id = $('input[name="sender_id"]').val();
                var receiver_id = $('input[name="receiver_id"]').val();
                var message = $('input[name="message"]').val();

                $.ajax({
                    url: "{{route('send_message')}}",
                    type: 'post',
                    data : {
                        '_token' : "{{csrf_token()}}",
                        'sender_id'   : sender_id,
                        'receiver_id' : receiver_id,
                        'message'     : message,
                    },
                    dataType: 'json',
                    success: function(response){

                        // Create table rows
                        // function new_message(response){

                            // $.each (response.chats, function (key, value) {


                                console.log(response.new_message['message']);

                                $("#put_in").append(
                                    "<div class='div_message'>"+
                                        "<p class='p_message'>" + response.new_message['message'] + "</p>"+
                                    "</div>"
                                );

                                if (response.new_message['sender_id'] === {{auth()->id()}}) {
                                    $('.p_message').attr('class',"other_user");
                                    $('.div_message').attr('class',"text-left mt-2");
                                }
                                else {
                                    $('.p_message').attr('class',"authed_user");
                                    $('.div_message').attr('class',"text-right mt-2");
                                }

                               $('input[name="message"]').val("");

                            // });

                        // }
                    }
                });
            });

        });




    </script>
    @stop
