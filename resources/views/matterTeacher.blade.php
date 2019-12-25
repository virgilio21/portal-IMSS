@extends('layouts.app')

@section('content')

<h2> Maestro: {{Auth::user()->name}} {{Auth::user()->surnames}} </h2>
<br>

    @if (isset($grupos)) 
        <table class="table table-responsive-xl table-striped">
            <thead>
                <th>Materia</th>
                <th>Grupo</th>
                <th>Horario</th>
                <th>Alumnos</th>   
            </thead>
            
            @foreach ($grupos  as $item)

                @if(Auth::user()-> id == $item-> user_id)                            
                    @if ($item -> visibility == 1)
                        <tr>
                            <td>{{$item -> matter -> name_matter }}</td>
                            <td>{{$item -> group}}</td>
                            <td>{{$item -> description}}</td>

                            <td><a href="/lista/{{$item->id}}" class="btn btn-warning">Ver</a></td>
                        </tr> 
                    @endif  
                @endif
            @endforeach
        </table>
    @endif
       

@endsection