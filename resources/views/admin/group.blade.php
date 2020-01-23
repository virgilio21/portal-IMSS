@extends('layouts.app')

@section('content')

@if (isset($edit))
    @include('layouts.updateGroup')
@else 

@if(Session::has('mensaje'))
    <div class="col-md-12" >
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p class="text-center">{{Session::get('mensaje')}}</p>
        </div>
    </div>
@endif


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrar grupo</div>
                <div class="card-body">
                    <form method="POST" action="/group/create">
                    {{csrf_field()}}
                        <div class="form-group row">
                            <label for="matter" class="col-md-4 col-form-label text-md-right">{{ __('Materia') }}</label>
                
                            <div class="col-md-6">
                            <select name="matter" id="matter" class="form-control @error('matter') is-invalid @enderror" required>
                                    @foreach ($materias as $item)
                                        <option value="{{$item->id}}">{{$item -> name_matter}}</option>
                                    @endforeach
                            </select>
                            @error('matter')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="teacher" class="col-md-4 col-form-label text-md-right">{{ __('Maestro') }}</label>
                
                            <div class="col-md-6">
                            <select name="teacher" id="teacher" class="form-control @error('teacher') is-invalid @enderror" required>
                                @foreach ($maestros as $item)
                                    @if ($item -> hasRole('teacher') and $item->visibility==1)
                                        <option value="{{$item->id}}">{{$item -> name}} {{$item -> surnames}}</option> 
                                    @endif   
                                @endforeach
                            </select>
                
                            @error('teacher')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description2" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>
                
                            <div class="col-md-6">
                            <input id="description2" type="text" class="form-control @error('description2') is-invalid @enderror" name="description2" value="{{old('description2')}}" required autocomplete="description2" autofocus>
                
                            @error('description2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="group" class="col-md-4 col-form-label text-md-right">{{ __('Grupo') }}</label>
                
                            <div class="col-md-6">
                            <input id="group" type="text" class="form-control @error('group') is-invalid @enderror" name="group" value="{{old('group')}}" required autocomplete="group" autofocus>
                
                            @error('group')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                            </div>
                        </div>

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
<br>
<!--<a href="fin" class="btn btn-danger">Fin del curso</a>-->
<div class="col-md-12 pt-3 pb-3" >
<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#create">Fin del curso</a>
</div>
<br>
<!--<div class="col-md-12 pt-3 pb-3" >
<a href="crearExcel" >Descargar EXCEL</a>
</div>-->


@if (isset($grupos))
<div class="text-center col-md-12" >
    <Table class="table table-responsive-xl table-striped">
    
        @foreach ($grupos as $item)
            @if ($loop->iteration == 1)
                <thead>
                    <th>Materia</th>
                    <th>Horario</th>
                    <th>Grupo</th>
                    <th>Maestro</th>
                    <th>Actualizar</th>
                        <!--<th>Eliminar</th>-->
                </thead>
            @endif    
                
                <tr>
                    <td>{{$item -> matter -> name_matter}}</td>
                    <td>{{$item -> description}} </td>
                    <td>{{$item -> group}} </td>
                    <td>{{$item -> user -> name}} {{$item -> user -> surnames}}</td>
                    <td ><a href="/group/{{encrypt($item -> id)}}/edit/" class="btn btn-success"><i class="fas fa-edit"></i></a></td>
                    <!--<td ><a href="/group/eliminar/{$item -> id}}" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>-->
                </tr>
    
        @endforeach

    </Table>
</div>
@endif

@endif


<form action="/fin" method="POST" >
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
                    <p>¿Estas seguro de que es el fin de curso? Se bloquearan los grupos existentes y los alumnos incrementarán su semestre.</p>
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
