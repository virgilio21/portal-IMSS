<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<<<<<<< HEAD
    <title>{{ config('app.name', 'Laravel') }}</title>
=======
    <title>Escuela de enfermería Mérida</title>
>>>>>>> landing

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

<<<<<<< HEAD
=======
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' integrity='sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr'
	 crossorigin='anonymous'>
	
>>>>>>> landing
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<<<<<<< HEAD
=======

    

    <style>
        nav.navbar{
            background:linear-gradient( 90deg, #1c3643, #273b47 25%, #1e5372 ) !important;
        }

        a.black{
            color:white !important;
        }
        
        div.dropdown-menu, div.dropdown-menu-right{
            background:linear-gradient( 90deg, #1c3643, #273b47 25%, #1e5372 ) !important;
        }

        a.dropdown-item{
            background:linear-gradient( 90deg, #1c3643, #273b47 25%, #1e5372 ) !important;
        }

        main.container-fluid{
          padding-left:0 !important;
          padding-right:0 !important;
          padding-bottom:0 !important;
        }

        footer{
            color: white;
            background:linear-gradient( 90deg, #1c3643, #273b47 25%, #1e5372 ) !important;
        }

        footer div.row{
            margin-right:0 !important;
        }

        div.borde-dashed2{
            border-right-style: dashed !important;
            border-right-width: 1px  !important;
        }

        a.blue{
            color:#3490dc !important;
        }
    </style>

>>>>>>> landing
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
<<<<<<< HEAD
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
=======
                <a class="navbar-brand black" href="{{ url('/') }}">
                    Home
>>>>>>> landing
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

<<<<<<< HEAD
=======

                        
                            
                        @if(Auth::check())
                            @if (Auth::user()->hasRole('admin'))
                                <li class="nav-item">
                                    <a class="nav-link black" href="/usuarios">Registrar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link black" href="/matters">Materias</a>
                                </li>   
                                <li class="nav-item">
                                    <a class="nav-link black" href="/grupos">Grupos</a>
                                </li>    
                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link black" href="/alumnos">Usuario</a>
                                </li>
                                @endif  
                                <li class="nav-item">
                                    <a class="nav-link black" href="/noticias">Noticias</a>
                                </li> 
                            @endif



                            @if (Auth::user()->hasRole('teacher'))
                                <li class="nav-item">
                                    <a class="nav-link black" href="/asignaturas">Materias</a>
                                </li>
                            @endif



                            @if (Auth::user()->hasRole('user'))

                                @if(Auth::user()->visibility==1)
                                <li class="nav-item">
                                    <a class="nav-link black" href="/cursos">Cursos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link black" href="/materias">Calificaciones</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link black" href="/historial">Historial</a>
                                </li>
                                @endif

                                @if(Auth::user()->visibility==0)
                                    <li class="nav-item">
                                        <a class="nav-link black" href="/historial">Historial</a>
                                    </li>
                                @endif
                            @endif

                        @else
                            <li class="nav-item">
                                <a class="nav-link black" href="#">Noticias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link black" href="#instalacion">Instalaciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link black" href="#">Profesores</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link black" href="#">Ubicación</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link black" href="#footer">Acerca de nosotros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link black" href="#">Documentación</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link black" href="#">Programas</a>
                            </li>
                        @endif

                        

>>>>>>> landing
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
<<<<<<< HEAD
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
=======
                                <a class="nav-link black" href="{{ route('login') }}">Iniciar sesión</a>
                            </li>
                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle black" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
>>>>>>> landing
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
<<<<<<< HEAD
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

=======
                                    <a class="dropdown-item black" href="/perfil">Perfil</a>


                                    <a class="dropdown-item black" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>
                                   
>>>>>>> landing
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

<<<<<<< HEAD
        <main class="py-4 container">
            @yield('content')
        </main>
    </div>
=======
        <main class="py-4 container-fluid">
            @yield('content')
        </main>
    </div>

    <footer id="footer">
        <div class="row componer text-center pt-3 pb-3">
            <div class="col-md-3 d-flex justify-content-center align-items-end borde-dashed2"><p>Copyright © ® 2019 
            Derechos reservados.</p></div>
            <div class="col-md-3 borde-dashed2">
                <h5><strong>Acerca de nosotros</strong></h5> 
                <p class="mb-1"><a href="" class="blue">Misión</a></p>
                <p class="mb-1"><a href="" class="blue">Visión</a></p>
                <p class="mb-1"><a href="" class="blue">Valores</a></p>
            </div>
            <div class="col-md-3 borde-dashed2">
                <h5><strong>Contacto</strong></h5> 
                <p class="mb-1">Tel: 9879015</p>
                <p class="mb-1">Correo: Myrna.gamboa@imss.gob.mx</p>
            </div>
            <div class="col-md-3">
                <h5><strong>Ayuda y dudas</strong></h5> 
                <p class="mb-1"><a href="" class="blue">Consulta tu duda</a></p>
            </div>
        </div>
    </footer>
>>>>>>> landing
</body>
</html>
