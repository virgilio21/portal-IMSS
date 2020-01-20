@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/index.css')}}">

 <!--Section Carrucel-->

 <section id="section-carousel">
          <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-pause="false">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="{{asset('img/IMG_6062.JPG')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{asset('img/IMG_6044.JPG')}}" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{asset('img/IMG_6058.JPG')}}" alt="Third slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{asset('img/IMG_6034.JPG')}}" alt="Third slide">
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


<!--Inicio Section noticias-->
<section class="container-fluid" id="fondoNoticias">
<div id="noticias" class="pt-4">
    <h2 class="text-center mb-4">~ NOTICIAS ~</h2>
    <p class="text-center"><a href="/noticias/all" class="btn btn-danger">Ver todas las noticias</a></p>
    <div class="container">
      <div class="row responsivo">
      @foreach($noticias as $item)    
        <div class="col-lg-4 col-md-6 col-12 d-flex align-items-strech" id="cajasNoticias">
          <div class="card">
            <img src="{{asset('img/IMG_6034.JPG')}}" class="card-img-top" alt="face-perfil">
            <div class="card-body">
              <h5 class="card-title text-center">{{$item->title}}</h5>
              <div class="d-flex justify-content-around align-items-center">
                <a href="/noticia/show/{{$item-> id}}" class="btn btn-danger" >Leer más</a><span class="muted badge badge-warning">{{$item->created_at}}</span>
              </div> 
            </div>
          </div>
        </div>
      @endforeach
      </div>
    </div>
  </div> 
  <br>
  </section>
  <!--Fin Section noticias-->



  <!--Inicio Section Instalaciones-->
    <div class="pb-2 pt-4" id="instalacion">
      <h2 class="text-center mb-4">~ INSTALACIONES ~</h2>
      <div class="row componer text-center">
        <div class="col-md-6">
          <img src="{{asset('img/IMG_6035.JPG')}}" alt="" class="instalacion mb-3">
        </div>
        <div class="col-md-6">
          <img src="{{asset('img/IMG_6040.JPG')}}" alt="" class="instalacion mb-3">
        </div>
        <div class="col-md-6">
          <img src="{{asset('img/IMG_6042.JPG')}}" alt="" class="instalacion mb-3">
        </div>
        <div class="col-md-6">
          <img src="{{asset('img/IMG_6066.JPG')}}" alt="" class="instalacion mb-3">
        </div>
      </div>
    </div>
   

  <!--Fin Section Instalaciones-->






    <script src="{{asset('js/index.js')}}"></script>
@endsection
