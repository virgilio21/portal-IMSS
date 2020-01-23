@extends('layouts.app')
@section('content')

<div class="col-md-12 text-center">
        <h2>Materia: {{$grupo -> matter -> name_matter}}</h2>
        <a href="/unidad/{{encrypt($grupo->id)}}" class="btn btn-warning">Agregar unidades</a>
    
    <h4 class="mt-5">Lista de alumnos registrados</h4>

    @php
        $contador = 1;
    @endphp

    @if (isset($alumnosGrupo))
        @foreach ($alumnosGrupo as $item)
            @if ($item -> matter_user_id == $grupo -> id)
                <a href="/calificacion/{{encrypt($item -> matter_user_id)}}/{{encrypt($item->user->id)}}">{{$contador}}- {{$item -> user -> name}} {{$item -> user -> surnames}}</a><br>
                @php
                    $contador += 1;
                @endphp
            @endif
        @endforeach    
    @endif
 
</div>

<br>

@endsection