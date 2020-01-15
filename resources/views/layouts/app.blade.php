<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Escuela de enfermería Mérida</title>

    <!-- Scripts -->
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    

    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' integrity='sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr'
	 crossorigin='anonymous'>
	
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/stylesVirgo.css') }}">

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
            top:100%;
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

        div.modal-body img{
            width: 100% !important;
            max-height: 45vh;
            object-fit: cover;
        }
        
        
        @media screen and (max-width:768px){
            table{
                display: inline-table !important;
            }

            table.buscador{
                display: block !important;
            }

        }

        @media screen and (max-width:414px){
            table{
                display: block !important;
            }

            .navbar-toggler{
                border-color: white !important;
            }

            .navbar-toggler i{
                color: white !important;
            }
        }
        

    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand black" href="{{ url('/') }}">
                    Home
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <i class="fas fa-edit"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">


                        
                            
                        @if(Auth::check())
                            @if (Auth::user()->hasRole('admin'))
                                <li class="nav-item">
                                    <a class="nav-link black" href="/usuarios">Registro</a>
                                </li>
                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link black" href="/alumnos">Buscar usuario</a>
                                </li>
                                @endif  
                                <li class="nav-item">
                                    <a class="nav-link black" href="/matters">Materias</a>
                                </li>   
                                <li class="nav-item">
                                    <a class="nav-link black" href="/grupos">Grupos</a>
                                </li>    
                                <li class="nav-item">
                                    <a class="nav-link black" href="/noticias">Noticias</a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link black" href="/survey">Encuestas</a>
                                </li>
                            @endif



                            @if (Auth::user()->hasRole('teacher'))
                                <li class="nav-item">
                                    <a class="nav-link black" href="/asignaturas">Materias</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link black" href="/survey/list">Encuestas</a>
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

                                <li class="nav-item">
                                    <a class="nav-link black" href="/survey/list">Encuestas</a>
                                </li>
                            @endif

                        @else
                            <li class="nav-item">
                                <a class="nav-link black" href="/#noticias">Noticias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link black" href="/#instalacion">Instalaciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link black" href="/index/profesores">Profesores</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link black" href="/#">Ubicación</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link black" href="#footer">Acerca</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link black" href="/#">Documentos</a>
                            </li>
                        @endif

                        

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link black" href="{{ route('login') }}">Iniciar sesión</a>
                            </li>
                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle black" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item black" href="/perfil">Perfil</a>


                                    <a class="dropdown-item black" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>
                                   
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

        <main class="py-4 container-fluid">
            @yield('content')
        </main>
    </div>


    @if(!Auth::check())
    <footer id="footer">
        <div class="row componer text-center pt-3 pb-3">
            <div class="col-md-3 d-flex justify-content-center align-items-end borde-dashed2"><p>Copyright © ® 2019 
            Derechos reservados.</p></div>
            <div class="col-md-3 borde-dashed2 movilFooter">
                <h5><strong>Acerca de nosotros</strong></h5> 
                <p class="mb-1"><a class="pb-1 pt-1 blue" href="#" data-toggle="modal" data-target="#mision">Misión</a></p>
                <p class="mb-1"><a href="#" class="pb-1 pt-1 blue" data-toggle="modal" data-target="#vision">Visión</a></p>
                <p class="mb-1"><a href="#" class="pb-1 pt-1 blue" data-toggle="modal" data-target="#valores">Valores</a></p>
            </div>
            <div class="col-md-3 borde-dashed2 movilFooter">
                <h5><strong>Contacto</strong></h5> 
                <p class="mb-1">Tel: 9879015</p>
                <small class="mb-1">Correo: Myrna.gamboa@imss.gob.mx</small>
            </div>
            <div class="col-md-3 movilFooter">
                <h5><strong>Ayuda y dudas</strong></h5> 
                <p class="mb-1"><a href="#" class="pb-2 pt-2 blue" data-toggle="modal" data-target="#ayuda">Consulta tu duda</a></p>
            </div>
        </div>
    </footer>
    @endif

<!--Inicio mision modal-->

    <div class="modal fade" id="mision" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Misión</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <img src="{{asset('img/mision.png')}}" alt="">
                
                
                <p class="mt-3">Formar profesionales competentes en la ciencia del cuidado de enfermería con enfoque holístico centrado en la persona, familia y comunidad, socialmente responsables y con apego a la normatividad vigente que contribuyan  al bienestar de una sociedad en continua transformación y culturalmente diversa.</p>
            </div>
          </div>
        </div>
      </div>

    <!--Final mision modal-->

    <!--Inicio vision modal-->

    <div class="modal fade" id="vision" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Visión</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <img src="{{asset('img/vision.png')}}" alt="">
                
                
                <p class="mt-3">Mantener en el 2023, el liderazgo en la formación de profesionales competentes en la ciencia del cuidado de enfermería con reconocimiento en el padrón de programas de alto rendimiento de licenciatura a través del cumpliendo de estándares de la más alta calidad educativa.</p>
            </div>
          </div>
        </div>
      </div>

    <!--Final vision modal-->


    <!--Inicio valores-->

    <div class="modal fade" id="valores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Valores</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <img src="{{asset('img/valores.png')}}" alt="">
                
                <p class="mt-3"><strong>Lealtad.-</strong> Ser fiel a los principios éticos, buscando el cumplimiento de sus fines con plena conciencia de servicio.</p>

                <p class="mt-3"><strong>Eficiencia.-</strong> Debe desempeñar las funciones propias de su cargo, en forma personal, con elevada moral, profesionalismo, vocación, disciplina, diligencia, oportunidad y eficacia para dignificar la función publica y mejorar la calidad de los servicios, sujetandose a las condiciones de tiempo, forma y lugar.</p>

                <p class="mt-3"><strong>Probidad.-</strong> Debe desempeñar sus funciones con prudencia, integridad, honestidad, decencia, seriedad, moralidad, ecuanimidad y rectitud. Debe actuar con honradez, tanto en el ejercicio de su cargo como en el uso de los recursos institucionales que le sean conferidos por razón de sus funciones. Debe repudiar, combatir y denunciar toda forma de corrupción.</p>

                <p class="mt-3"><strong>Responsabilidad.-</strong> Debe actuar con un claro concepto del deber, para el cumplimiento del fin encomendado.</p>

                <p><strong>Confidencialidad.-</strong> Está obligado a guardar discreción y reserva sobre todas las situaciones que se presentan en el ejercicio de sus funciones o con motivo de ellas.</p>


            </div>
          </div>
        </div>
      </div>

    <!--Fin valores-->


<!-- Inicio modal formulario de ayuda -->
  <div class="modal fade" id="ayuda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Tienes dudas?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form method="POST" action="/formulario">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="fullNmae">Nombre completo</label>
                    <input type="text" name="fullName" class="form-control" id="fullNmae" placeholder="Juan Barba Blanca">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu email">
                  <small id="emailHelp" class="form-text text-muted">Verifica que tienes tu correo correctamente escrito de lo contrario jamás te llegara la respuesta.</small>
                </div>
                
                <div class="form-group">

                  <label for="help">¿Cual es tu duda?</label>
                  <input type="text" name="help" class="form-control" id="help" placeholder="¡escríbenos aqui!">
                  
                </div>
                
            
                <div class="alert alert-success" role="alert">
                    Se enviara un correo a tu cuenta con la respuesta.
                </div>

                
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-primary btn-my-color" value="Enviar" />
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

<!-- FIN modal formulario de ayuda -->
</body>
</html>
