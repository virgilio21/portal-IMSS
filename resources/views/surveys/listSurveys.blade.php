@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center">Lista de encuestas disponibles</h1>
    <div class="row">
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
                        <div class="alert alert-primary caja" role="alert">
                            <a href="/survey/response/{{encrypt($survey->id)}}" class="alert-link text-center">{{$survey->name}} 
                            </a>
                            <div class="text-muted card-text d-flex justify-content-between">
                                <span>Creado: {{$survey->created_at}}</span>
                                <span>Actualizado: {{$survey->updated_at}}</span>
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
</div>

    <script>
    
        $(document).ready(function(){

            $(".caja").click(function(){
            window.location = $(this).find("a:first").attr("href");

        });

        });
    </script>

@endsection