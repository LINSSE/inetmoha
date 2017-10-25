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
    <script type="text/javascript" src="{{ asset('assets/js/miscript.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>

</head>

<body>
    <div class="container-fluid trans">
    
    <nav class="navbar navbar-default">
        
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="/" target="_parent"><h3>MOHA</h3></a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    @guest
                            <li role="presentation"><a href="{{ route('login') }}">Acceder</a></li>
                            <li role="presentation"><a href="{{ route('register') }}">Registrarme</a></li>
                    @elseif (Auth::user()->admin === 1)

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a href="/admin/principal">Administración</a></li>
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

                    @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a href="/usuario/show/{{Auth::user()->id}}">Perfil</a></li>
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
    @guest

    @elseif(Auth::user()->admin === 1)
        @include('admin.menu')
    @else
        @include('usuario.menu')
        @if(Auth::user()->activo === 0)
                            
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger activo" role="alert">
                            <strong>Su cuenta aún no esta activa para realizar operaciones. Un Administrador verificará sus datos.</strong>
                            </div>
                        </div>
                    </div>
        @endif
    @endguest
    <div class="container-fluid principal">
        <?php
            $message=Session::get('message');

        ?>
        @if($message == 'correcto')
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
                    <h3><a href="index"><span>MOHA </span></a></h3>
                    <p class="links"><a href="/">Inicio </a><strong> · </strong><a href="/ofertas">Ofertas </a><strong> · </strong><a href="/demandas">Demandas </a><strong> · </strong><a href="/precios">Precios </a><strong> · </strong><a href="/operadores">Operadores </a><strong> · </strong><a href="/operaciones">Operaciones </a></p>
                    <p
                    class="company-name">MOHA © 2017</p>
                </div>
                <div class="col-md-4 col-sm-6 footer-contacts">
                    <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                        <p>San Martín 2224, Corrientes, Argentina</p>
                    </div>
                    <div><i class="fa fa-phone footer-contacts-icon"></i>
                        <p class="footer-center-info email text-left">+54 0379-4476047</p>
                    </div>
                    <div><i class="fa fa-envelope footer-contacts-icon"></i>
                        <p> <a href="#" target="_blank">secretariadeproduccion.mptt@corrientes.gov.ar</a></p>
                    </div>
                </div>
                <div class="clearfix visible-sm-block"></div>
                <div class="col-md-4 footer-about">
                    <img class="img-responsive img-logo-ctes" src="{{url('assets/img/logo.png')}}"><span><h4>Ministerio de Produccion</h4></span>
                    
                    <p> 
                    </p>
                    <div class="social-links social-icons"><a href="https://www.facebook.com/Ministerio-de-Producción-de-Corrientes-1424236394481898/"><i class="fa fa-facebook"></i></a><a href="https://twitter.com/uopcorrientes"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></div>
                </div>
            </div>
            
        </footer>
    </div>

    </body>
</html>