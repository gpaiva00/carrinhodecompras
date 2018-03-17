<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Início</title>
    <meta name="description" content="painel ccrd">
    <meta name="author" content="CCRD">
    <link rel="shortcut icon" href="/images/logo.png" type="image/x-icon">
    <!-- All the files that are required -->
    <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->
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

        /* Footer */

        #footer {
            background-color: #222222;
            color: #777;
            padding: 5px 0 10px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 50px;
            /* Height of the footer */
        }

        #footer p {
            font-size: 13px;
            margin-top: 10px;
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
    <section id="menu-0">
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="/images/logo.png" width="30" height="30" class="d-inline-block align-top" alt=""> CCRD
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="input-group input-group-sm">
                    <input type="search" class="form-control col-md-4" placeholder="Pesquisar produto" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="fa fa-bell"></i>
                                <!--<p class="notification"></p>-->
                                <p>Notificações</p>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu" style="max-height: 300px; overflow-y: auto;" aria-labelledby="dropdownMenu2">
                                <li>
                                    <a href="#">Nenhuma notificação</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fas fa-shopping-bag"></i> 7 - Items
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-cart" role="menu">
                                <li>
                                    <span class="item">
                                        <span class="item-left">
                                            <img src="http://lorempixel.com/50/50/" alt="" />
                                            <span class="item-info">
                                                <span>Item name</span>
                                                <span>23$</span>
                                            </span>
                                        </span>
                                        <span class="item-right">
                                            <button class="btn btn-xs btn-danger pull-right">x</button>
                                        </span>
                                    </span>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="">View Cart</a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li>
                    <img src="images/users/eu.jpg" width="50" height="50">
                    <a class="nav-link dropdown-toggle mr-10" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      @if (Auth::guest())
                        Convidado
                      @endif
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>                                
                </li> -->
                    </ul>
                </div>
        </nav>
    </section>

    <!--content-->
    @yield('content')

    <div id="footer">
        <div class="container">
            <p>Copyright &copy; All rights reserved. Design by
                <a href="https://www.linkedin.com/in/gabriel-p-842179107/" target="_blank" rel="nofollow">gPaiva</a>
            </p>
        </div>
    </div>
    <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
    <script src="/js/bootstrap.js" type="text/javascript"></script>
    <!-- <script src="../js/index-panel.js"></script> -->
</body>

</html>