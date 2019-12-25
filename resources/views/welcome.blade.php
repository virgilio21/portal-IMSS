@extends('layouts.app')

<<<<<<< HEAD
@section('content')
    <h1>Bienvenido</h1>
=======


@section('content')
<link rel="stylesheet" href="{{asset('css/index.css')}}">

 <!--Section Carrucel-->

 <section id="section-carousel">
          <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-pause="false">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="{{asset('img/IMG_6062.jpg')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{asset('img/IMG_6044.jpg')}}" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{asset('img/IMG_6058.jpg')}}" alt="Third slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{asset('img/IMG_6034.jpg')}}" alt="Third slide">
                </div>
                
                <!--Overlay, es parecido a poner un fondo negro sobre el carrucel, es una clase que nosotros creamos-->
                <!--La clase carousel-caption nos permite poner por encima el fondo, por defecto el overlay no se ve ya que se queda detras del carousel-->
                <div class="overlay carousel-caption">

                  <div class="container">

                    <div class="row align-items-center">

                      <div class="col-md-6 offset-md-6 text-md-right text-center">

                        <h1>Escuela de enfermería Mérida delegación Yucatán.</h1>
                        <p class="d-none d-md-block
                        " >eligendi soluta quae illo qui quisquam consequatur, dicta temporibus ex? Nisi facere rem id, perferendis dicta voluptate veritatis hic molestiae voluptas!</p>

                        <a href="#" class="btn btn-outline-light">Ver profesores</a>

                        <button type="buttom" class="btn btn-my-color" data-target="#ticket" data-toggle="modal" >Inscribete</button>
                      </div>
                    </div>

                  </div>

                </div>


              </div>
            </div>

      </section>
    <!--Fin Section Carrucel-->


  <!--Inicio Section Propuesta-->
    <div class="row fondoEducativo componer">
      <div class="col-md-4 text-center borde-dashed" >
        <h2>12</h2>
        <p>Docentes certificados por el COMCE</p>
      </div>
      <div class="col-md-4 text-center borde-dashed">
        <h2>+12</h2>
        <p>Egresados reconocidos por excelencia a nivel nacional al año</p>
      </div>
      <div class="col-md-4 text-center">
        <h2>+50</h2>
        <p>Alumnos egresados al año	</p>
      </div> 
    </div>
  <!--Fin Section Propuesta-->


  <!--Inicio Section Instalaciones-->
    <div class="pb-2 pt-4" id="instalacion">
      <h2 class="text-center mb-4" style="color:#02A8A8">~ Instalaciones ~</h2>
      <div class="row componer text-center">
        <div class="col-md-6">
          <img src="{{asset('img/IMG_6035.jpg')}}" alt="" class="instalacion mb-3">
        </div>
        <div class="col-md-6">
          <img src="{{asset('img/IMG_6040.jpg')}}" alt="" class="instalacion mb-3">
        </div>
        <div class="col-md-6">
          <img src="{{asset('img/IMG_6042.jpg')}}" alt="" class="instalacion mb-3">
        </div>
        <div class="col-md-6">
          <img src="{{asset('img/IMG_6066.jpg')}}" alt="" class="instalacion mb-3">
        </div>
      </div>
    </div>
   

  <!--Fin Section Instalaciones-->

    <script src="{{asset('js/index.js')}}"></script>
>>>>>>> landing
@endsection
