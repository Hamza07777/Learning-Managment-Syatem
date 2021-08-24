
@if(!empty(helper_favicon_image())) 
    <link rel="icon" href="{{ asset('public/logos/'.helper_favicon_image()) }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('public/logos/'.helper_favicon_image()) }}" type="image/x-icon">
@else
    <link rel="icon" href="{{ asset('public/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.png') }}" type="image/x-icon">
@endif

<!-- Google font-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700&amp;display=swap" rel="stylesheet">
<!-- Font Awesome-->
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/fontawesome.css') }}">
<!-- ico-font-->
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/icofont.css') }}">
<!-- Themify icon-->
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/themify.css') }}">
<!-- Flag icon-->
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/flag-icon.css') }}">

<!-- Feather icon-->
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/feather-icon.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/select2.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/scrollable.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/timepicker.css') }}">

<!-- Plugins css start-->
<!-- Plugins css Ends-->

<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/bootstrap.css') }}">
<!-- App css-->
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/style.css') }}">
<link id="color" type="text/css" rel="stylesheet" href="{{ asset('public/assets/css/color-4.css') }}" media="screen">
<!-- Responsive css-->
<link id="color" type="text/css" rel="stylesheet" href="{{ asset('public/assets/css/color-1.css') }}" media="screen">

<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/date-picker.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/datatables.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/photoswipe.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/photoswipe.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/vector-map.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/owlcarousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/range-slider.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/rating.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css"/>
<style type="text/css">
    .notifyjs-corner {
        z-index: 10000 !important;
        
    }
    #toast-container{
        margin-top: 4%;
    }
    
     .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
      }
      .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
      }
      .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
      }
      .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
      }
      input:checked + .slider {
      background-color: #2196F3;
      }
      input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
      }
      input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
      }
      /* Rounded sliders */
      .slider.round {
      border-radius: 34px;
      }
      .slider.round:before {
      border-radius: 50%;
      }
      {{ helper_custom_css() }}
</style>

<script src="{{ asset('/public/js/app.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>

