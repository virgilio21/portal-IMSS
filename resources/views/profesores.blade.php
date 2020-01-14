@extends('layouts.app')
@section('content')
    
  <section id="cards-spekers" class="mt-4"  >
    <div class="container">
      <div class="row mb-3">

        <div class="col text-center text-uppercase">

            
            <h2>~ Conoce a los profesores ~</h2>

        </div>
      </div>

      <div class="row">

        <div class="col-lg-3 col-md-6 col-12">

            <div class="card">
            <img src="{{asset('img/IMG_6034.jpg')}}" class="card-img-top" alt="face-perfil">
                <div class="card-body">
                  <h5 class="card-title">Sacha Lifszyc</h5>
                  <span class="badge badge-primary">JavaScript</span>
                  <span class="badge badge-info">React</span>
                  <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum sapiente repellendus iusto, vel corrupti officiis? Culpa repellendus ex debitis odit est earum numquam ratione temporibus nisi doloribus, enim impedit? Sed?.</p>
                  
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4">

              <div class="card">
              <img src="{{asset('img/IMG_6034.jpg')}}" class="card-img-top" alt="face-perfil">
                  <div class="card-body">
                    <h5 class="card-title">Sacha Lifszyc</h5>
                    <span class="badge badge-danger">Java</span>
                  <span class="badge badge-secondary">Juegos de hacer</span>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum sapiente repellendus iusto, vel corrupti officiis? Culpa repellendus ex debitis odit est earum numquam ratione temporibus nisi doloribus, enim impedit? Sed?.</p>
                   
                  </div>
                </div>

              </div>
            
              <div class="col-lg-3 col-md-6 col-12 mb-4">

                  <div class="card mb-4">
                  <img src="{{asset('img/IMG_6034.jpg')}}" class="card-img-top" alt="face-perfil">
                      <div class="card-body">
                        <h5 class="card-title">Sacha Lifszyc</h5>
                        <span class="badge badge-light">Python</span>
                        <span class="badge badge-dark">Dark web</span>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum sapiente repellendus iusto, vel corrupti officiis? Culpa repellendus ex debitis odit est earum numquam ratione temporibus nisi doloribus, enim impedit? Sed?.</p>
                        
                      </div>
                    </div>
                  </div>

              
                  <div class="col-lg-3 col-md-6 col-12 mb-4">

                      <div class="card">
                      <img src="{{asset('img/IMG_6034.jpg')}}" class="card-img-top" alt="face-perfil">
                          <div class="card-body">
                            <h5 class="card-title">Sacha Lifszyc</h5>
                            <span class="badge badge-success">Bootstrap</span>
                            <span class="badge badge-warning">JavaScript</span>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum sapiente repellendus iusto, vel corrupti officiis? Culpa repellendus ex debitis odit est earum numquam ratione temporibus nisi doloribus, enim impedit? Sed?.</p>
                            
                          </div>
                        </div>
                      </div>
      </div>
    </div>

  </section>
@endsection