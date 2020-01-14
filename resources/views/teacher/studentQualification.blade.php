@extends('layouts.app')

@section('content')
<div class="col-md-12" >


@if(Session::has('mensaje'))
    <div class="col-md-12" >
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p class="text-center">{{Session::get('mensaje')}}</p>
        </div>
    </div>
@endif



<h1>{{$grupo->matter->name_matter}}</h1> 
<h2>{{$alumno -> name}} {{$alumno -> surnames}}</h2>

<a href="" data-toggle="modal" data-target="#prom">Sacar Promedio Final</a> <p>{{$promedio}}</p>




@if (isset($unidades))
    <table class="table table-responsive-xl table-striped">
 

        @foreach ($unidades as $item) 
        
                @if ($loop->iteration == 1)
                    <thead>
                        <th>Unidad</th>
                        <th>Calificación</th>
                        <th>Actualizar</th>
                    </thead> 
                @endif  
           
                @if ($alumno -> id == $item -> user_id and $item -> matter_user_id == $grupo -> id)

                <tr>    
                   <td>{{$item -> name_unit}}</td>
                   <td>{{$item -> qualification}}</td>
                    <td><a class="btn btn-success" data-toggle="modal" data-target="#create" onclick="recibirValue('id_unidad','{{$item->id}}')">Subir</a></td>
                </tr>
                @endif
            
        @endforeach
    </table>
@endif

<form action="/promedio/{{$alumno->id}}/{{$grupo->id}}" method="POST" >
    {{csrf_field()}}
    <div class="modal fade" id="prom">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">¿Ya terminaste con las calificaciones del alumno? Si es asi se calculara el promedio</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Aceptar') }}
                </button>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="{{asset('js/passValueOfModal.js')}}"></script>

<form action="/subir" method="POST" >
    {{csrf_field()}}
    <div class="modal fade" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                    <p>Escribe la calificación aqui</p>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_unidad" name="id_unidad">
                    <input type="text" name="calification" id="calification" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Guardar') }}
                </button>
                </div>
            </div>
        </div>
    </div>
</form>

</div>


@endsection




