@extends('layouts.app')
@section('content')


        @if (isset($edit))
            @include('layouts.modificarMatter')
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
                            <div class="card-header">Registrar Materia</div>
            <div class="card-body">
    <form method="POST" action="/matter/create">
        {{csrf_field()}}

        
        <div class="form-group row">
            <label for="key_matter" class="col-md-4 col-form-label text-md-right">{{ __('Clave materia') }}</label>

            <div class="col-md-6">
            <input id="key_matter" type="text" class="form-control @error('key_matter') is-invalid @enderror" name="key_matter" value="{{old('key_matter')}}" required autocomplete="key_matter" autofocus>

            @error('key_matter')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>
   
        <div class="form-group row">
                <label for="name_matter" class="col-md-4 col-form-label text-md-right">{{ __('Materia') }}</label>
    
                <div class="col-md-6">
                <input id="name_matter" type="text" class="form-control @error('name_matter') is-invalid @enderror" name="name_matter" value="{{old('name_matter')}}" required autocomplete="name_matter" autofocus>
    
                @error('name_matter')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>


        <div class="form-group row">
                <label for="number_hours" class="col-md-4 col-form-label text-md-right">{{ __('Numero Hrs') }}</label>
    
                <div class="col-md-6">
                <input id="number_hours" type="text" class="form-control @error('number_hours') is-invalid @enderror" name="number_hours" value="{{old('number_hours')}}" required autocomplete="number_hours" >
    
                @error('number_hours')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="number_credits" class="col-md-4 col-form-label text-md-right">{{ __('Numero Creditos') }}</label>
    
                <div class="col-md-6">
                <input id="number_credits" type="text" class="form-control @error('number_credits') is-invalid @enderror" name="number_credits" value="{{old('number_credits')}}" required autocomplete="number_credits" >
    
               
    
                @error('number_credits')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>

        <div class="form-group row">
            <label for="semester" class="col-md-4 col-form-label text-md-right">{{ __('Semestre') }}</label>

            <div class="col-md-6">
            <input id="semester" type="text" class="form-control @error('semester') is-invalid @enderror" name="semester" value="{{old('semester')}}" required autocomplete="semester" >

           

            @error('semester')
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
    </div></div>

<br><br>
        


        @if (isset($materias))
        <div class="text-center col-md-12" >
            <table class="table table-responsive-xl table-striped">
            
                @foreach ($materias as $materia) 
                <!--<div class="alert alert-dark" role="alert">-->
                    
                        @if($materia -> visibility == 1)
                            <!--<p class="alert-link">-->
                        
                            @if ($loop->iteration == 1)
                                <thead>
                                    <th>Clave</th>
                                    <th>Materia</th>
                                    <th>Horas</th>
                                    <th>Creditos</th>
                                    <th>Semestre</th>
                                    <th>Actualizar</th>
                                    <!--<th>Eliminar</th>-->
                                </thead>
                            @endif
                        
                            <tr>                   
                                <td>{{ $materia -> key_matter}} </td>
                                <td>{{ $materia -> name_matter}} </td>
                                <td>{{ $materia -> number_hours}}</td>
                                <td>{{ $materia -> number_credits}} </td>
                                <td>{{ $materia -> semester}}</td>
                            
                                <!--</p>-->
                                <td ><a href="/matter/{{encrypt($materia -> id)}}/edit/" class="btn btn-success"><i class="fas fa-edit"></i></a></td>
                                 <!--<<td ><a href="/matter/eliminar/{$materia -> id}}" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>-->
                                <!--</div>-->
                            </tr>
                        @endif
                @endforeach
            </table>
        </div>        
        @endif  
    
            
        <!-- <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                Nueva tarea
            </a>    -->    
    @endif
@endsection






    

        
 
    <!--<div class="modal fade" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
            </div>
        </div>
    </div>-->
    