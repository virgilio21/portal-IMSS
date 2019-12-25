@extends('layouts.app')

@section('content')
    
    
    @if(isset($cursos))
    <h2 style="text-align: center;">Registrarse en cursos</h2>
    <br>
            <div class="row d-flex justify-content-around">
                    
                @foreach ($cursos as $curso) 
                    @if ($curso -> visibility == 1 and $curso -> matter -> semester == Auth::user()->semester and Auth::user()->visibility==1)
                    
                        @if (Auth::user() -> isFollowing($curso))
                    
                        <input id="id_student" name="id_student" type="hidden" value="{{Auth::user()->id}}">
                        <div class="card-deck" style = "width:350px";>
                        <div class="card border-primary mb-3">
                            <div class="card-header">{{$curso -> matter -> name_matter}} {{$curso -> group}}</div>
                                <div class="card-body text-primary">
                                <h5 class="card-title">Horario: {{$curso -> description}}</h5>
                                <input id="id_group" name="id_group" type="hidden" value="{{$curso -> id}}">
                                <p class="card-text">Profesor: {{$curso -> user -> name}} {{$curso -> user -> surnames}}</p>
                                </div>
                                <div class="card-footer">
                                        <p>Ya estas matriculado</p>
                                </div>
                            </div>
                        </div>
                

                        @else
                            <form action="/curso/create" method="POST">
                                {{ csrf_field() }}
                                <input id="id_student" name="id_student" type="hidden" value="{{Auth::user()->id}}">
                                <div class="card-deck" style = "width:350px";>
                                <div class="card border-primary mb-3">
                                    <div class="card-header">{{$curso -> matter -> name_matter}} {{$curso -> group}}</div>
                                        <div class="card-body text-primary">
                                        <h5 class="card-title">Horario: {{$curso -> description}}</h5>
                                        <input id="id_group" name="id_group" type="hidden" value="{{$curso -> id}}">
                                        <p class="card-text">Profesor: {{$curso -> user -> name}} {{$curso -> user -> surnames}}</p>
                                        </div>
                                        <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">
                                                        {{ __('Matricular') }} 
                                                </button>
                                        </div>
                                    </div>
                                </div> 
                            </form> 
                        @endif
                    @endif

                @endforeach
            </div>
    @endif
@endsection