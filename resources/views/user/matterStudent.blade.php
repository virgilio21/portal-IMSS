@extends('layouts.app')

@section('content')
    <div class="col-md-12" >
    <table class="table table-responsive-xl table-striped">
    @forelse ($grupo as $item)
        @if ($loop->iteration == 1)
        <h2 class="text-center mb-5"> Alumno: {{Auth::user()->name}} {{Auth::user()->surnames}} </h2>          
        <thead>
            <th>Materia</th>
            <th>Maestro</th>
            <th>Horario</th>
            <th>Grupo</th>
            <th>Unidades</th>
        </thead>
        @endif

        <tr>
            <td>{{$item -> matter -> name_matter}}</td>
            <td>{{$item -> user -> name}} {{$item -> user -> surnames}}</td>
            <td>{{$item  -> description}}</td>
            <td>{{$item -> group}}</td>
            <td><a href="/unidades/{{$item ->id}}" class="btn btn-primary">Ver</a></td>
        
        </tr>

    @empty
        <br>
        <br>
        <h2 class="text-center">No tienes materias cargadas</h2>
    @endforelse

    </div>

@endsection