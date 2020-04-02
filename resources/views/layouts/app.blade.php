<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{asset('asset/css/logo.png')}}" type="image/x-icon">

    {{-- Link Css Start Now  --}}
        <link rel="stylesheet" href="{{asset('asset/plugins/toastr/toastr.min.css')}}">
        <link rel="stylesheet" href="{{asset('asset/plugins/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('asset/css/adminlte.css')}}">
        <link rel="stylesheet" href="{{asset('asset/plugins/sweetalert2/sweetalert2.min.css')}}">



    {{-- Script Javascript Start Here --}}

        <script src="{{asset('asset/plugins/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('asset/js/demo.js')}}"></script>
        <script src="{{asset('asset/js/adminlte.min.js')}}"></script>
        <script src="{{asset('asset/plugins/toastr/toastr.min.js')}}"></script>
        <script src="{{asset('asset/plugins/sweetalert2/sweetalert2.all.js')}}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="hold-transition login-page">
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
