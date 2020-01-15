@extends('layouts.app')
@section('content')

<div class="col-12">
<h2 class="text-center">Alumno: {{$alumno->name}} {{$alumno->surnames}}</h2>

    <div class="row d-flex justify-content-around mt-5">
          
    @forelse ($cursos as $curso)
            <form action="/desmatricular" method="POST">
                {{ csrf_field() }}
                <input id="id_student" name="id_student" type="hidden" value="{{$alumno->id}}">
                <div class="card-deck" style = "width:400px";>
                <div class="card text-white mb-3 bg-primary">
                    <div class="card-header">{{$curso -> matter -> name_matter}} {{$curso -> group}}</div>
                        <div class="card-body text-white">
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
    @empty
            <h2 class="text-center">No tiene cursos cargados</h2>
    @endforelse
    </div>
</div>
@endsection
