<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/images/logo.png" type="image/x-icon">
    <title>{{ config('app.name', 'CCRD') }}</title>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap.css" type="text/css">
    <!-- <link rel="stylesheet" type="text/css" href="../fonts/font-awesome/css/font-awesome.css"> -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{url('/')}}"><img src="/images/logo.png" width="30" height="30">
        CCRD Centro de Captação de Reciclagem Domiciliar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a href="{{ url('/login')}}" class="mr-3">Entrar</a>
                <a href="{{ url('/register')}}">Cadastrar</a>
        </div> -->
    </nav>

    @yield('content')

    <!-- Scripts -->
    <script src="/js/bootstrap.js"></script>
</body>
</html>
