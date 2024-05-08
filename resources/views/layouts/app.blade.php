<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

     <!-- Favicons -->
     <link href="{{ asset('assetss/images/eyeee.png') }}" rel="icon">
     <link href="{{ asset('asstersHome/images/img/eyeee.png') }}" rel="icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <!-- CSS login and signup -->
    <link rel="stylesheet" href="{{ asset('css-login/style.css') }}">
    <style>
        .alert {
            border: 1px solid #dc3545;
            border-radius: 0.25rem;
            background-color: #f8d7da;
            color: #721c24;
        }

        .alert ul {
            list-style-type: none;
            padding-left: 0;
        }

        .alert li {
            padding: 0.5rem 1rem;
        }

        .form-field {
            margin-bottom: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 0.5rem;
            border-radius: 0.25rem;
            border: 1px solid #ced4da;
        }
    </style>


</head>

<body class="hold-transition login-page">
    @yield('content')
</body>

</html>
