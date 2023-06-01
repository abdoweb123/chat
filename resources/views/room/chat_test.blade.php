@extends('room.index')



@section('style')
    <style>
        .other_user{
            background-color: #a09a9a;
            padding: 6px 25px;
            /* width: 50%; */
            border-radius: 20px;
            display: inline;
            color: white;
        }

        .authed_user{
            background-color: #3d58a4;
            padding: 6px 25px;
            border-radius: 20px;
            display: inline;
            color: white;
        }
    </style>
@stop


@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>{{$room_user->sender_id != auth()->id() ? $room_user->sender->name : $room_user->receiver->name}}</h4>
                    </div>
                    <div class="card-body" id="message-list">
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <div class="">
                                    {{--                                    <img src="https://via.placeholder.com/50" alt="Avatar" class="rounded-circle me-3">--}}
                                    @foreach($chats as $chat)
                                        <div class="m-3 @if($chat->sender_id != auth()->id()) text-left @else text-right @endif">
                                            <p class="@if($chat->sender_id != auth()->id()) other_user @else authed_user @endif">{{$chat->message}}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <form onsubmit="sendMessage(); return false;">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Type your message" id="message-input">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop




@section('script')
    <script>
        
    </script>
    @stop
