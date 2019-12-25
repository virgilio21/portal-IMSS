@extends('layouts.app')

@section('content')

    @if (isset($alumno)) 
        <h2> Alumno: {{Auth::user()->name}} {{Auth::user()->surnames}} </h2>
        <br>

        <table class="table table-responsive-xl table-striped">
                            
            <thead>
                <th>Materia</th>
                <th>Maestro</th>
                <th>Horario</th>
                <th>Grupo</th>
                <th>Unidades</th>
            </thead>
                        
           
            @foreach ($alumno  as $item)
                            
                @if(Auth::user()-> id == $item-> id)
                    

                    @foreach ($item -> groups as $i)
                        @if ($i -> visibility == 1)

                           
                            <tr>
                                <td>{{$i -> matter -> name_matter}}</td>
                                <td>{{$i -> user -> name}} {{$i -> user -> surnames}}</td>
                                <td>{{$i -> description}}</td>
                                <td>{{$i -> group}}</td>
                                <td><a href="/unidades/{{$i->id}}" class="btn btn-primary">Ver</a></td>
                            
                            </tr>
                        @endif  
                    @endforeach
                @endif
            @endforeach
        </table>
    @endif

@endsection