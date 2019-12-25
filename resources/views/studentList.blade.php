@extends('layouts.app')
@section('content')

    <div style="display: flex;">
        <h2>{{$grupo -> matter -> name_matter}}</h2><a href="/unidad/{{$grupo->id}}" class="btn btn-warning" style="margin-left: 20px;">Agregar unidades</a>
    </div>
    <br>
    <h4>Lista alumnos</h4>

    @php
        $contador = 1;
    @endphp

    @if (isset($alumnosGrupo))
        @foreach ($alumnosGrupo as $item)
            @if ($item -> matter_user_id == $grupo -> id)
                <a href="/calificacion/{{$item -> matter_user_id}}/{{$item->user->id}}">{{$contador}}- {{$item -> user -> name}} {{$item -> user -> surnames}}</a><br>
                @php
                    $contador += 1;
                @endphp
            @endif
        @endforeach    
    @endif
  




@endsection