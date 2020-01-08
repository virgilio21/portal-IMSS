@extends('layouts.app')


@section('content')

    
    <div class="row">

        <h1 class="text-center">Lista de encuessstas disponibles.</h1>
        @if(Session::has('mensaje'))
        <div class="col-12" >
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{Session::get('mensaje')}}
            </div>
        </div>
        @endif
    </div>

    <div class="row mt-4">

       

        
            <!--Un else foreach es como un if else, el forelse es if y el emply es else
            !!!!La primera parte se ejecuta si el array tiene datos y por conseguiente el emply se ejecuta si no hay datos en el arreglo
            -->
            @forelse ($surveys as $survey)
                
                    <div class="col-12 col-md-6">    
                        <div class="alert alert-primary" role="alert">
                            <a href="/survey/response/{{$survey->id}}" class="alert-link">{{$survey->name}} 
                            </a>
                            <div class="text-muted card-text">
                                {{$survey->created_at}}
                            </div>
                        </div>
                    </div>
                   
            @empty
                <p>No hay encuestas disponibles</p>
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