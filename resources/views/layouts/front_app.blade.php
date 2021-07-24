<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="HAMZA BIN SAJID">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>APP</title>

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
        </style>
    

</head>
<body>
<!-- Loader starts-->
<div class="loader-wrapper">
    <div class="theme-loader"></div>
</div>
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <div class="page-body-wrapper sidebar-icon">

    @include("layouts.partials.header")

            <div class="container-fluid"><br>
                
                    @yield("content")
                   
            </div>

        <!-- footer start-->
    </div>
</div>
@include('layouts.partials.js')
@yield('scripts')
<!-- login js-->
<!-- Plugin used-->
</body>
</html>
