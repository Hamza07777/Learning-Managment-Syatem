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

    

</head>
<body>
<!-- Loader starts-->
<div class="loader-wrapper">
    <div class="theme-loader"></div>
</div>
<!-- Loader ends-->

<!-- page-wrapper Start-->

                    @yield("content")


@include('layouts.partials.js')
@yield('scripts')
<!-- login js-->
<!-- Plugin used-->
</body>
</html>
