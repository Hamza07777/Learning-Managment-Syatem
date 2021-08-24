<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="HAMZA BIN SAJID">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{old('app_name')  ?? helper_app_name() ?? 'APP'}}    </title>

    @include("layouts.partials.css")
    <style>
        ::-webkit-file-upload-button {
            background: #635AF2;
            color: white;
            padding: 8px 25px;
            font-size: 10px;
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
            border-color: #635AF2;
            transition: all 0.15s ease;
            letter-spacing: 1px;
            box-sizing: border-box;
            outline: none;
            cursor: pointer;
            line-height: 1.5;
            display: inline-block;
            font-weight: bold;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
        }
        input[type="file"] {
            border: none !important;
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
    <script>
          {{ helper_custom_js() }}
    </script>
    <script src="{{ asset('/public/js/app.js') }}"></script>

</head>
<body>
<!-- Loader starts-->
<div class="loader-wrapper">
    <div class="theme-loader"></div>
</div>
<!-- Loader ends-->

<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <div class="page-body-wrapper sidebar-icon">

    @include("layouts.partials.header")

    @include("layouts.partials.side_menu")

        <div class="page-body">
            <div class="container-fluid"><br>
                
                    @yield("content")
                   
            </div>

        </div>
        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 footer-copyright">
                        <p class="mb-0">Copyright 2020 © Xolo All rights reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <p class="pull-right mb-0">Hand crafted & made with &nbsp;<i class="fa fa-heart"></i></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

@include('layouts.partials.js')

@yield('scripts')
<!-- login js-->
<!-- Plugin used-->
</body>
</html>
