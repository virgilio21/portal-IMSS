@extends('layouts.app')

@section('content')
    <h2>{{$grupo -> matter -> name_matter}}</h2>
    
    @if ($prom -> final_qualification!=0)
        <h2>Promedio: {{$prom -> final_qualification}}</h2>  
    @endif

    <br>

    @if(isset($unidades))
        <table class="table table-responsive-xl table-striped">

            @foreach ($unidades as $item)
            
                @if ($loop->iteration == 1)
                    <thead>
                        <th>Unidad</th>
                        <th>Calificación</th>
                    </thead>  
                @endif


                @if ($item -> user_id == Auth::user() -> id and $item->matter_user_id == $grupo -> id)

                <tr>
                    <td>{{$item -> name_unit}}</td>
                    <td>{{$item -> qualification}}</td>
                </tr>
                @endif
            @endforeach
        </table>  

        <br>    

    @endif
   

  

@endsection
