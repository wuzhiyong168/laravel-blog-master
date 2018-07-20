<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'J'))</title>
    <link href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <style>
        html,body {
            width:100%;
            height:100%;
            background: white;
            overflow: hidden;
        }
        .login {
            width:100%;
            height:100%;
            background: url("/images/login.jpg");
            -webkit-background-size:cover;
            background-size:cover;
            background-position: center;
            position: relative;
        }
        .login-content {
            position: absolute;
            top:50px;
            right: 100px;
            width: 350px;
            height:250px;
            text-align: center;
            display: table;
        }

    </style>

</head>
<body>
{{--<div class="z-footer">--}}
{{--</div>--}}
<div class="login">
    {{--<p class="z-text-big">JoyWu's blog</p>--}}
    <div style="position: absolute;top: 10%;right: 0px;">
        @yield('content')
    </div>

</div>

</body>
</html>