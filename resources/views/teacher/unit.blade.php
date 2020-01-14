@extends('layouts.app')
@section('content')

@if (isset($edit))
    @include('layouts.updateUnit')
@else 


    @if(Session::has('mensaje'))
        <div class="col-md-12" >
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <p class="text-center">{{Session::get('mensaje')}}</p>
            </div>
        </div>
    @endif

    @if(Session::has('error'))
        <div class="col-md-12" >
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <p class="text-center">{{Session::get('error')}}</p>
            </div>
        </div>
    @endif

    <div class="col-md-12" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" >
    
                            Agregar unidad a {{$grupo -> matter -> name_matter}} 
                    </div>
                    <div class="card-body">    
                        <form method="POST" action="/unidad/create">
                            {{csrf_field()}}

                            <div class="form-group row">
                                <label for="name_unit" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Unidad') }}</label>

                                <div class="col-md-6">
                                    <input id="name_unit" type="text" class="form-control @error('description') is-invalid @enderror" name="name_unit" value="{{old('name_unit')}}" required autocomplete="name_unit" autofocus>

                                    @error('name_unit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <input type="hidden" name="id_grupo" id="id_grupo" value={{$grupo->id}}>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                            {{ __('Guardar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
                
    <br><br>
    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#create">Borrar Unidades</a>
    <br><br>

        @if(isset($unidades))  
            <Table class="table table-responsive-xl table-striped">
                @foreach($unidades as $item)
                    @if ($loop->iteration == 1)
                        <thead>
                            <th>Nombre unidad</th>
                            <th>Actualizar</th>
                                    <!--<th>Eliminar</th>-->
                        </thead>      
                    @endif

                   
                    @if($item->matter_user_id == $grupo->id)
                        <tr>
                            <td>{{$item->name_unit}}</td>
                            <td><a href="/editarUnidad/{{encrypt($item->matter_user_id)}}/{{encrypt($item->name_unit)}}" class="btn btn-success"><i class="fas fa-edit"></i></a></td>
                        </tr>
                    @endif
 
                @endforeach
            </table>
        @endif
    </div>

@endif



<form action="/unidades/eliminar/{{$grupo->id}}" method="POST" >
    {{csrf_field()}}
    <div class="modal fade" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">¿Estas seguro de eliminar todas las unidades a los alumnos registrados al curso?</p>
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

@endsection