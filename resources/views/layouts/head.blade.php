<!-- Title -->
<title>@yield("title")</title>



<!-- Favicon -->
<link rel="shortcut icon" href="{{ URL::asset('assets/images/the_best.jpg') }}" type="image/x-icon" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">




<!--- Style css -->
<link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">

<!--- Style css -->
@if (App::getLocale() == 'ar')
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">
@else
    <link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet">
@endif




@yield('head')



@yield('style')

<style>
   /*.dataTables_paginate,*/
   /*.dataTables_info*/
   /*{display:none}*/

   select.form-control-sm:not([size]):not([multiple]){padding:10px}

   .pagination {justify-content:center}
   .modal-body .row{margin-top:13px;}


    body,h1,h2,h3,h4,h5,h6{font-family: Cairo,'tahoma','sans-serif' !important;}
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button{
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number]{
        -moz-appearance: textfield;
    }

    /*.dataTables_length{display: none}*/
    .messages , .alert-danger {width:30%}


   a:hover{
       text-decoration: none !important;
   }

   input::-webkit-input-placeholder{
       color: black;
       opacity: 0.5 !important;
   }

   .tostr{
       position: fixed;
       top: 12px;
       right: 10px;
       z-index: 999999;
   }

</style>



{{-- start phone_code --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
{{-- end phone_code --}}
