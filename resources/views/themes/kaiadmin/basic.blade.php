<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @include('themes.kaiadmin.style')
    @yield('style')
</head>
<body class="@yield('body-class')">
    <div class="wrapper">
        @yield('content')
    </div>

@include('themes.kaiadmin.script')

@stack('script')

</body>
</html>