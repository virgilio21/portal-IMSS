@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >
                    Actualizar unidad a {{$grupo -> matter -> name_matter}} 
                       
                </div>
                <div class="card-body">    
                    <form method="POST" action="/unidad/update/">
                            {{method_field('PATCH')}}
                            {{csrf_field()}}

                        <div class="form-group row">
                            <label for="name_unit" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Unidad') }}</label>

                           
                            <div class="col-md-6">
                                <input id="name_unit" type="text" class="form-control @error('description') is-invalid @enderror" name="name_unit" value="{{$name_unit}}" required autocomplete="name_unit" autofocus>

                                @error('name_unit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>
                        
                        <input type="hidden" name="id_grupo" id="id_grupo" value="{{$grupo->id}}">
                        <input type="hidden" name="unit" id="unit" value="{{$name_unit}}">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning">
                                        {{ __('Actualizar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection