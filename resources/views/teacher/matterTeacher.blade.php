@extends('layouts.app')

@section('content')
<div class="col-md-12" >
    <table class="table table-responsive-xl table-striped">
    @forelse ($grupo as $item)
       
        @if ($loop->iteration == 1)  
        <h2 class="text-center mb-5"> Maestro: {{Auth::user()->name}} {{Auth::user()->surnames}} </h2>
            <thead>
                <th>Materia</th>
                <th>Grupo</th>
                <th>Horario</th>
                <th>Alumnos</th>   
            </thead>
        @endif

        <tr>
            <td>{{$item -> matter -> name_matter }}</td>
            <td>{{$item -> group}}</td>
            <td>{{$item -> description}}</td>

            <td><a href="/lista/{{encrypt($item->id)}}" class="btn btn-warning">Ver</a></td>
        </tr> 
    
    @empty
        <br><br>
        <h2 class="text-center">No tienes cursos asignados</h2>
    @endforelse
    </table>
@endsection