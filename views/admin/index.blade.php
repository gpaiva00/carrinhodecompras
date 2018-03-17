<!doctype html>
<html lang="{{ app->getLocale() }}l">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Início</title>
    <meta name="description" content="painel ccrd">
    <meta name="author" content="CCRD">
    
    <!-- All the files that are required -->
    <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script> -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap.css" type="text/css">
    <!-- <link rel="stylesheet" type="text/css" href="../fonts/font-awesome/css/font-awesome.css"> -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="../css/ad
    min.css"> -->
    <style>
        html,
        body {
        background: #efefef;
        /* padding: 10px; */
        font-family: 'Varela Round';
        }
        /* Footer */
        #footer {
            background-color: #222222;
            color: #777;
            padding: 5px 0 10px 0;
            position:absolute;
            bottom:0;
            width:100%;
            height:50px;   /* Height of the footer */
        }
        #footer p {
            font-size: 13px;
            margin-top: 10px;
        }
        #footer a {
            color: #aaa;
        }
        #footer a:hover, #footer a:focus {
            text-decoration: none;
            color: #e17135;
        }
        
    </style>
</head>
<body>
    <center>
    <div class="card" style="margin-top:10%; margin-bottom: 0; width: 20em;">
        <div class="card-body">
            <h5 class="card-title">
                <i class="fas fa-check-circle"></i>
                Entrar no painel de controle
            </h5>
            <div class="message"></div>
            <form role="form" name="lgn" style="padding: 20px;">
                <div class="form-group">
                    <input type="email" class="form-control" name="username" aria-describedby="emailHelp" placeholder="Nome de usuário" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" aria-describedby="emailHelp" placeholder="Senha" required>
                </div>
                <center><button style="width: 40%;" type="button" class="btn btn-success">Entrar</button></center>
            </form>
        </div>
    </div>
    </center>
    <div id="footer">
        <div class="container">
            <p>Copyright &copy; All rights reserved. Design by
            <a href="https://www.linkedin.com/in/gabriel-p-842179107/" target="_blank" rel="nofollow">gPaiva</a>
            </p>
        </div>
    </div>
    <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.js" type="text/javascript"></script>
    <!-- <script src="../js/index-panel.js"></script> -->
</body>
</html>{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
