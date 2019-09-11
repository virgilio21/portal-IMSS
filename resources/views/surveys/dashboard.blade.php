@extends('layouts.app')


@section('content')
    
    <h1>Hola este es el dashboard</h1>

    <div class="row">

        <div class="col-6">
            <form action="/survey/create" method="POST">
                
                
                <div class="form-group">
                
                    {{ csrf_field() }}
                    <input class="form-control" type="text" name="nameSurvey" placeholder="¿Cual es el nombre de tu nueva escuesta?" value='{{ old('nameSurvey') }}' required autocomplete="name" />

                    @if( $errors->has('nameSurvey'))

                        <!--Obtiene los errores asociados a message, iterando-->
                        @foreach ($errors->get('nameSurvey') as $error)
                            <div class="form-control-feedback" >{{$error}}</div>    
                        @endforeach
                    @endif
        
                </div>

               
            
            </form>
        </div>
    </div>

    <div class="row">

        
            <!--Un else foreach es como un if else, el forelse es if y el emply es else
            !!!!La primera parte se ejecuta si el array tiene datos y por conseguiente el emply se ejecuta si no hay datos en el arreglo
            -->
            @forelse ($surveys as $survey)
                <div class="col-6">
                    
                 
                    <div class="alert alert-primary" role="alert">
                        <a href="/survey/{{$survey->id}}" class="alert-link">{{$survey->name}} 
                        </a>
                        <div class="text-muted card-text">
                            {{$survey->created_at}}
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

@endsection