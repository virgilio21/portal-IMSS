@extends('layouts.app')
@section('content')

@if (isset($edit))
    @include('layouts.updateUser')
@else 

    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{Session::get('mensaje')}}
        </div>
    @endif


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrar Usuario') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/usuario/create">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="enrollment" class="col-md-4 col-form-label text-md-right">{{ __('Matricula') }}</label>

                                <div class="col-md-6">
                                    <input id="enrollment" type="text" class="form-control @error('enrollment') is-invalid @enderror" name="enrollment" value="{{ old('enrollment') }}" required autocomplete="enrollment" autofocus>

                                    @error('enrollment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="rol" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

                                <div class="col-md-6">
                                    <select name="rol" id="rol" class="form-control" >
                                        <option value="admin" selected>administrador</option>
                                        <option value="teacher">maestro</option>
                                        <option value="user">estudiante</option>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Enviar') }}
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
    <br>



    @if (isset($users))
    <div class="text-center col-md-12" >
            <table class="table table-responsive-xl table-striped">


                    <thead>
                        <th>Matricula</th>
                        <th>Nombre Completo</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Actualizar</th>
                    </thead>
                
                    
                    @foreach ($users as $item) 
                    <tr>
                    <!--<div class="alert alert-dark" role="alert">-->
                        
                    <!--<p class="alert-link">-->
                            <td>{{ $item -> enrollment }}</td>
                            <td>{{ $item['name']}} {{ $item['surnames']}}</td>
                            <td>{{ $item -> email }}</td>

                                @foreach ($item -> roles as $i)
                                    <td>{{$i->name}}</td>
                                @endforeach
                        
                            <!--</p>-->
                            <td ><a href="/usuario/{{$item -> id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a></td>
                            
                           
                    </tr>
                    @endforeach
                    
            @endif  
        
                
            <!-- <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                    Nueva tarea
                </a>    -->    
    </table>
    </div>
@endif
@endsection 
