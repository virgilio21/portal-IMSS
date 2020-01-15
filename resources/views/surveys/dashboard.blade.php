@extends('layouts.app')


@section('content')
    
<div class="container">
    <h1 class="mb-4">Dashboard de encuestas.</h1>
    <div class="row">
        @if(Session::has('error'))
        <div class="col-12" >
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{Session::get('error')}}
            </div>
        </div>
        @endif
    </div>


    
    <form action="/survey/create" method="POST">
                
                
              
                
                    {{ csrf_field() }}
                    
                        
                
                <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="nameSurvey">Nombra tu encuesta</label>
                          <input type="text" id="nameSurvey" name="nameSurvey"class="form-control" id="inputCity" placeholder="¿Cual es el nombre de tu nueva escuesta?" value='{{ old('nameSurvey') }}' required autocomplete="nameSurvey">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="access">Accesible para</label>
                          <select name="access" id="access" class="form-control">
                                <option value="alumnos" selected>alumnos</option>
                                <option value="maestros">maestros</option>
                                <option value="ambos">alumnos y maestros</option>
                          </select>

                        @if( $errors->has('nameSurvey'))

                        <!--Obtiene los errores asociados a message, iterando-->
                            @foreach ($errors->get('nameSurvey') as $error)
                            <div class="form-control-feedback" >{{$error}}</div>    
                            @endforeach
                        @endif
                        </div>

                </div>

                
                <input type="submit" value="Crear" class="btn btn-success pr-5 pl-5 pt-2 pb-2">
                
                    

               
            
    </form>
    

    <div class="row mt-4">

        
            <!--Un else foreach es como un if else, el forelse es if y el emply es else
            !!!!La primera parte se ejecuta si el array tiene datos y por conseguiente el emply se ejecuta si no hay datos en el arreglo
            -->
            @forelse ($surveys as $survey)
                <div class="col-md-6 col-12">
                    
                    
                    <div class="alert alert-primary" role="alert">
                        <a href="/survey/{{encrypt($survey->id)}}" class="alert-link mr-1">{{$survey->name}} 
                        </a>
                        <span class="text-muted mr-2">
                            Creado:{{$survey->created_at}}
                        </span>
                        <span class="text-muted mr-1">
                            Estado:@php 
                                if($survey->visibility == 0){
                                    echo('Oculto');
                                }
                                else {
                                    echo('Running');
                                }
                            @endphp
                        </span>
                        
                    <a href="/survey/response/{{encrypt($survey->id)}}">Ver formulario</a>
                        <div class="text-muted card-text d-flex justify-content-around mt-3">
                            
                            @if( $survey->visibility == 1 )
                                <form action="/survey/hidden/" method="POST">
                                <input type="hidden" name="surveyId" value="{{$survey->id}}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-warning">
                                        Ocultar
                                    </button>
                                </form>
                            @else
                                <form action="/survey/hidden/" method="POST">
                                <input type="hidden" name="surveyId" value="{{$survey->id}}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-success">
                                        Activar
                                    </button>
                                </form>

                                <a href="/survey/results/{{encrypt($survey->id)}}" class="btn btn-primary">Ver resultados</a>

                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#removeSurvey" onclick="deleteSurvey('itemId', '{{$survey->id}}')">Eliminar</a>


                            @endif
                            
                        </div>
                    </div>
                    
    
                </div>
            @empty
                <p>No hay nuevos mensajes</p>
                
            @endforelse
    
            <!--Si aun hay mensajes se crearan otras paginas y laravel agregara un parametro a las rutas-->
    
            
        </div>
    
        <div class="row">
            @if(count($surveys))
                <div class="mt-2 mx-auto">
                    {{$surveys->links()}}
                </div>
            @endif
        </div>
</div>

        @include('layouts.deleteSurvey')
        <script src="{{ asset('js/passValueOfModal.js') }}" defer></script>

        
@endsection