@extends('layouts.app')

@section('content')
<style>
    div.row{
        margin:0;
       
    }
</style>



@if(Session::has('mensaje'))
    <div class="col-md-12" >
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p class="text-center">{{Session::get('mensaje')}}</p>
        </div>
    </div>
@endif

@if(Session::has('error'))
    <div class="col-md-12" >
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p class="text-center">{{Session::get('error')}}</p>
        </div>
    </div>
@endif

    @if(isset($cursos))
             
            <div class="row d-flex justify-content-around mt-5">
                 
                @forelse ($cursos as $curso) 
                
                @if (Auth::user() -> isFollowing($curso))
                    
                <input id="id_student" name="id_student" type="hidden" value="{{Auth::user()->id}}">
                <div class="card-deck" style = "width:400px";>
                <div class="card text-white mb-3 bg-primary">
                    <div class="card-header">{{$curso -> matter -> name_matter}} {{$curso -> group}}</div>
                        <div class="card-body text-white">
                        <h5 class="card-title">Descripción: {{$curso -> description}}</h5>
                        <input id="id_group" name="id_group" type="hidden" value="{{$curso -> id}}">
                        <p class="card-text">Profesor: {{$curso -> user -> name}} {{$curso -> user -> surnames}}</p>
                        </div>
                        <div class="card-footer">
                                <p>Ya estas matriculado</p>
                        </div>
                    </div>
                </div>
        

                @else
                    <form action="/curso/create" method="post">
                        {{ csrf_field() }}
                        <div class="card-deck" style = "width:400px";>
                        <div class="card text-white mb-3 bg-primary">
                            <div class="card-header">{{$curso -> matter -> name_matter}} {{$curso -> group}}</div>
                                <div class="card-body text-white">
                                <h5 class="card-title">Descripción: {{$curso -> description}}</h5>
                                <p class="card-text">Profesor: {{$curso -> user -> name}} {{$curso -> user -> surnames}}</p>
                                </div>
                                <input id="materia" name="materia" type="hidden" value="{{$curso -> matter -> name_matter}}">
                                <input id="id_group" name="id_group" type="hidden" value="{{$curso->id}}">
                                <input id="id_student" name="id_student" type="hidden" value="{{Auth::user()->id}}">
                                <div class="card-footer">
                                        <button class="btn btn-danger">
                                                {{ __('Matricular') }} 
                                        </button>
                                </div>
                            </div>
                        </div>  
                    </form>
                @endif
                    
                
                @empty
                    <h2>No existe cursos disponibles</h2>
                @endforelse
            </div>
    @endif
@endsection