@extends('layouts.app')

@section('content')
<div class="col-md-12" >
    <h2 class="text-center">{{$grupo -> matter -> name_matter}}</h2>
    
    @if ($prom -> final_qualification!=0)
        <h2 class="text-center">Promedio: {{$prom -> final_qualification}}</h2>  
    @endif

    <br>

    @if(isset($unidades))
        <table class="table table-responsive-xl table-striped">

            @forelse ($unidades as $item)
            
                @if ($loop->iteration == 1)
                    <thead>
                        <th>Unidad</th>
                        <th>Calificación</th>
                    </thead>  
                @endif

                <tr>
                    <td>{{$item -> name_unit}}</td>
                    <td>{{$item -> qualification}}</td>
                </tr>
            
            @empty
                <h2 class="text-center">Sin unidades agregadas por el momento</h2>
            @endforelse
        </table>  

        <br>    

    @endif
   

  
</div>
@endsection
