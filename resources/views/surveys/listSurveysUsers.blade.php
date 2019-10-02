@extends('layouts.app')


@section('content')
    
    <h1>Hola este es el dashboard</h1>

    <div class="row mt-4">

        
            <!--Un else foreach es como un if else, el forelse es if y el emply es else
            !!!!La primera parte se ejecuta si el array tiene datos y por conseguiente el emply se ejecuta si no hay datos en el arreglo
            -->
            @forelse ($surveys as $survey)
                @if( (Auth::user()->hasRole('user')) And (($survey->access == 'alumnos') Or ($survey->access == 'ambos')) )

                    @if( $survey->visibility == 1 )
                    <div class="col-6">    
                        
                        <div class="alert alert-primary" role="alert">
                            <a href="/survey/{{$survey->id}}" class="alert-link">{{$survey->name}} 
                            </a>
                        <a href="/survey/response/{{$survey->id}}">Ver formulario</a>
                            <div class="text-muted card-text">
                                {{$survey->created_at}}
                            </div>
                        </div>
                        
                        
                    </div>
                    @endif
                
                    @elseif( (Auth::user()->hasRole('teacher')) And (($survey->access == 'maestros') Or ($survey->access == 'ambos')) )

                    @if( $survey->visibility ==  1 )
                    <div class="col-6">    
                        
                        <div class="alert alert-primary" role="alert">
                            <a href="/survey/{{$survey->id}}" class="alert-link">{{$survey->name}} 
                            </a>
                        <a href="/survey/response/{{$survey->id}}">Ver formulario</a>
                            <div class="text-muted card-text">
                                {{$survey->created_at}}
                            </div>
                        </div>
                        
                        
                    </div>
                    @endif
                @endif
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