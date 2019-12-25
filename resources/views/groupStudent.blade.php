@extends('layouts.app')
@section('content')

<h1>{{$alumno->name}} {{$alumno->surnames}}</h1>

    @foreach ($alumno -> groups as $curso)
        @if ($curso -> visibility == 1)
            <form action="/desmatricular" method="POST">
                {{ csrf_field() }}
                <input id="id_student" name="id_student" type="hidden" value="{{$alumno->id}}">
                <div class="card-deck" style = "width:350px";>
                <div class="card border-primary mb-3">
                    <div class="card-header">{{$curso -> matter -> name_matter}} {{$curso -> group}}</div>
                        <div class="card-body text-primary">
                        <h5 class="card-title">Horario: {{$curso -> description}}</h5>
                        <input id="id_group" name="id_group" type="hidden" value="{{$curso -> id}}">
                        <p class="card-text">Profesor: {{$curso -> user -> name}} {{$curso -> user -> surnames}}</p>
                        </div>
                        <div class="card-footer">
                                <button type="submit" class="btn btn-danger">
                                        {{ __('Desmatricular') }} 
                                </button>
                        </div>
                    </div>
                </div> 
            </form> 
        @endif
      
    @endforeach

@endsection
