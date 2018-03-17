<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page_title')</title>
    <meta name="description" content="painel ccrd">
    <meta name="author" content="CCRD">
    <link rel="shortcut icon" href="/images/logo.png" type="image/x-icon">
    <!-- All the files that are required -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'> -->
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
            font-family: 'Roboto';
        }
        img:hover{
            cursor: pointer;
        }
        /* Footer */

        #footer {
            position:fixed;
            bottom:0px;
            background-color: #222222;
            color: #777;
            width: 100%;
            height: 30px;
            /* Height of the footer */
        }

        #footer p {
            font-size: 13px;
            margin-top: 5px;
        }

        #footer a {
            color: #aaa;
        }

        #footer a:hover,
        #footer a:focus {
            text-decoration: none;
            color: #e17135;
        }
    </style>
</head>

<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.12&appId=175874166385422';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{route('user.index')}}"><img src="/images/logo.png" width="30" height="30">CCRD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ml-5">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fas fa-shopping-bag"></i> <span class="num-itens">0</span> itens
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 450px;">
                        <div class="row cart-items">
                            <!-- <div class="col-md-2 float-left">
                                    <button class="btn btn-primary"><i class="fa fa-plus"></i></button>
                                    <button class="btn btn-danger"><i class="fa fa-minus"></i></button>
                                </div> -->
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="btn btn-primary col-md-12" href="{{ route('sacola') }}">Ver Sacola</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fa fa-bell"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0 mr-auto">
                <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar produtos" aria-label="Search">
                <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            </form>
            @if(Auth::guest())
                <a href="{{ url('/login')}}" class="mr-3">Entrar</a>
                <a href="{{ url('/register')}}">Cadastrar</a>
            @else
                <img src="/images/no-user.png" width="50" height="50" class="mr-3">
                <div class="nav-item dropdown show mr-auto">
                    <a class="dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        {{Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('perfil', Auth::user()->email)}}"><i class="fa fa-user text-info"></i> Meu perfil</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-history text-secondary"></i> Histórico de pedidos</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-star text-warning"></i> Prêmios</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-question-circle text-primary"></i> Ajuda</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout')}}"><i class="fas fa-sign-out-alt text-danger"></i> Sair</a>
                    </div>
                </div>    
            @endif
        </div>
    </nav>

    <!--content-->
    @yield('content_page')

    <div id="footer">
    <div class="fb-like float-right mr-5" data-href="https://fb.me/ccrdreciclagens" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
        <div class="container">
            <p>Copyright &copy; All rights reserved. Design by
                <a href="https://www.linkedin.com/in/gabriel-p-842179107/" target="_blank" rel="nofollow">gPaiva</a>
            </p>
        </div>
    </div>
    <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery.form.min.js"></script>
    <script type="text/javascript" src="/js/my-script.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
    <script src="/js/bootstrap.js" type="text/javascript"></script>
    <!-- <script src="../js/index-panel.js"></script> -->
</body>

</html>