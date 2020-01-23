@extends('layouts.app')
@section('content')

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
                <div class="card-header" >
                    Buscar usuario
                </div>
                <div class="card-body">    
                    <form method="POST" action="alumno">
                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="matricula" class="col-md-4 col-form-label text-md-right">{{ __('Matricula') }}</label>

                            <div class="col-md-6">
                                <input id="matricula" type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula" value="{{old('matricula')}}" required autocomplete="matricula" autofocus>

                                @error('matricula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                        {{ __('Buscar') }}
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

@if (isset($alumno))
    <div class="text-center col-md-12" >
    @if($alumno ->hasRole('user'))
    
    <table class="table table-responsive-xl table-striped buscador">
    
            <thead>
                <th>Matricula</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Semestre</th>
                <th>Dirección</th>
                <th>Telefono</th>
                @if($alumno->semester==9 and $alumno->visibility == 0)
                    <th>Estatus</th>
                @else
                    <th>Cursos</th>
                    <th>Acción</th>
                @endif
               
            </thead>    
    
    
           
                <tr>
                    <!--<p class="alert-link">-->
                    <td>{{ $alumno['enrollment']}} </td>
                    <td>{{ $alumno['name']}} {{ $alumno['surnames']}} </td>
                    <td>{{ $alumno['email']}} </td>
                    <td>{{ $alumno -> semester}}</td>
                    <td>{{ $alumno['address']}}</td>
                    <td>{{ $alumno['phone']}} </td>
                    <!--</p>-->
                    @if($alumno->semester==9 and $alumno->visibility == 0)
                    
                    @else
                        <td><a href="alumno/cursos/{{$alumno->id}}" class="btn btn-success">Ver</a></td>
                    @endif

                    @if($alumno->visibility == 0)
                        @if($alumno->semester==9)
                            <td><a href="#" class="btn btn-success">EGRESADO</a></td>
                        @else
                            <td ><a href="#" class="btn btn-warning" data-toggle="modal" data-target="#alta" onclick="recibirValue('alta2','{{$alumno->id}}')">Alta</a></td>
                        @endif
                    @else
                        <td ><a href="#" class="btn btn-danger"  data-toggle="modal" data-target="#baja" onclick="recibirValue('baja2','{{$alumno->id}}')">Baja</a></td>     
                    @endif

                    <!--</div>-->
                </tr>
    </table>  
    
    @endif


    @if($alumno ->hasRole('teacher'))
    <table class="table table-responsive-xl table-striped">
    
            <thead>
                <th>Matricula</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Telefono</th>
                <th>Acción</th>
            </thead>    
    
    
           
                <tr>
                    <!--<p class="alert-link">-->
                    <td>{{ $alumno['enrollment']}} </td>
                    <td>{{ $alumno['name']}} {{ $alumno['surnames']}} </td>
                    <td>{{ $alumno['email']}} </td>
                    <td>{{ $alumno['address']}}</td>
                    <td>{{ $alumno['phone']}} </td>
                    <!--</p>-->
                    
                    @if($alumno->visibility == 0)
                        <td ><a href="#" class="btn btn-warning" data-toggle="modal" data-target="#alta" onclick="recibirValue('alta2','{{$alumno->id}}')">Alta</a></td>
                    @else
                        <td ><a href="#" class="btn btn-danger"  data-toggle="modal" data-target="#baja" onclick="recibirValue('baja2','{{$alumno->id}}')">Baja</a></td>     
                    @endif
                    <!--</div>-->
                </tr>
    </table>   
    @endif     

    </div> 
@endif  
 


<script src="{{asset('js/passValueOfModal2.js')}}"></script>

<form action="/bajaUsuario" method="POST" >
    {{csrf_field()}}
    <div class="modal fade" id="baja">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="baja2" name="baja2">
                    <p>¿Estas seguro de dar de baja al usuario?</p>
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



<form action="/altaUsuario" method="POST" >
    {{csrf_field()}}
    <div class="modal fade" id="alta">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="alta2" name="alta2">
                    <p>¿Estas seguro de dar de alta a usuario?</p>
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








