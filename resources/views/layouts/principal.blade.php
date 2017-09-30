<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>INET-MOHA</title>
    
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/Pretty-Footer.css')}}">
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Cookie')}}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css')}}">
    
    
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
</head>

<body>
    
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="/" target="_parent"> <img src="{{ asset('assets/img/logo-inet.png')}}" width="350px" class="img-responsive-logo"></a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>

            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    @guest
                            <li role="presentation"><a href="{{ route('login') }}">Acceder</a></li>
                            <li role="presentation"><a href="{{ route('register') }}">Registrarme</a></li>
                    @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar Sesion
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <?php
            $message=Session::get('message');

        ?>
        @if($message == 'store')
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Usuario Registrado</strong>
            </div>
        @endif
        @yield('content')

    </div>
    <footer>
        <div class="row">
            <div class="col-md-4 col-sm-6 footer-navigation">
                <h3><a href="index">INET<span>MOHA </span></a></h3>
                <p class="links"><a href="/">Inicio </a><strong> · </strong><a href="/ofertas">Ofertas </a><strong> · </strong><a href="/demandas">Demandas </a><strong> · </strong><a href="/precios">Precios </a><strong> · </strong><a href="/operadores">Operadores </a><strong> · </strong><a href="/operaciones">Operaciones </a></p>
                <p
                class="company-name">INET MOHA © 2017</p>
            </div>
            <div class="col-md-4 col-sm-6 footer-contacts">
                <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                    <p>Corrientes, Argentina</p>
                </div>
                <div><i class="fa fa-phone footer-contacts-icon"></i>
                    <p class="footer-center-info email text-left">+54 3794 111111</p>
                </div>
                <div><i class="fa fa-envelope footer-contacts-icon"></i>
                    <p> <a href="#" target="_blank">info@produccion.gov</a></p>
                </div>
            </div>
            <div class="clearfix visible-sm-block"></div>
            <div class="col-md-4 footer-about">
                <img class="img-responsive img-logo-ctes" src="assets/img/logo.png"><span><h4>Ministerio de Produccion</h4></span>
                
                <p> Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
                </p>
                <div class="social-links social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-github"></i></a></div>
            </div>
        </div>
    </footer>
    
</body>

</html>