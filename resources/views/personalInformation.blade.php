@extends('layouts.app')

@section('content')
<div class="col-md-10 text-center" style="margin:auto" >
    <h2>Información Personal</h2>
    <br>

    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('mensaje')}}
    </div>
    @endif

    <form action="/update/information/" method="POST">
        {{ csrf_field() }}
        <div style="display: flex; flex-wrap: wrap;">
            <div class="alert alert-primary alert-dismissible col-md-4"> 
                <p style="font-weight: bold;">Matricula</p>
                <label>{{Auth::user()->enrollment}}</label>
            </div>
        </div>
    
        <div style="display: flex; flex-wrap: wrap; ">
            <div class="alert alert-success alert-dismissible col-md-4"> 
                <p style="font-weight: bold;">Nombres</p>
                <label>{{Auth::user()->name}}</label>
            </div>
            <div class="alert alert-success alert-dismissible col-md-4"> 
                <p style="font-weight: bold;">Apellidos</p>
                <label>{{Auth::user()->surnames}}</label>
            </div>
            
            @if (Auth::user()->hasRole('user'))
                @if(Auth::user()->semester==9)
                    <div class="alert alert-success alert-dismissible col-md-4"> 
                        <p style="font-weight: bold;">Alumno</p>
                        <label>Egresado</label>
                    </div>
                @else
                    <div class="alert alert-success alert-dismissible col-md-4"> 
                        <p style="font-weight: bold;">Semestre</p>
                        <label>{{Auth::user()->semester}}</label>
                    </div>
                @endif
            @endif

            <div class="alert alert-success alert-dismissible col-md-4"> 
                <p style="font-weight: bold;">Email</p>
                <input name="email" type="text" value="{{Auth::user()->email}}" style="width:90%">
            </div>
            
            <div class="alert alert-success alert-dismissible col-md-4"> 
                <p style="font-weight: bold;">Domicilio</p>
                <input name="address" type="text" value="{{Auth::user()->address}}" style="width:90%">
            </div>
            <div class="alert alert-success alert-dismissible col-md-4">  
                <p style="font-weight: bold;">Celular</p>
                <input name="phone" type="text" value="{{Auth::user()->phone}}" style="width:90%">
            </div>    
        </div>   


        <button type="submit" class="btn btn-warning">
                {{ __('Actualizar') }} 
        </button>
    </form>
    <br>
</div>
@endsection
    