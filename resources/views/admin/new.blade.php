@extends('layouts.app')

@section('content')
@if (isset($edit))
    @include('layouts.updateNew')
@else 
    
    @if(Session::has('mensaje'))
    <div class="col-md-12">
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
                        Agregar noticia
                    </div>
                    <div class="card-body">    
                        <form method="POST" action="/noticia/create">
                            {{csrf_field()}}

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Noticia') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title')}}" required autocomplete="title" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('Link') }}</label>

                                <div class="col-md-6">
                                    <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{old('link')}}" required autocomplete="link" autofocus>

                                    @error('link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Contenido') }}</label>

                                <div class="col-md-6">
                                    <textarea id="content" type="text" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" name="content" value="{{old('content')}}" required autocomplete="content" autofocus></textarea>

                                    @error('content')
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

    @if (isset($noticias))
    <div class="text-center col-md-12" >
        <Table class="table table-responsive-xl table-striped">
        
            @foreach ($noticias as $noticia)
                @if ($loop->iteration == 1)
                    <thead>
                        <th>Noticia</th>
                        <th>Link</th>
                        <th>Contenido</th>
                        <th>Actualizar</th>
                        <th>Eliminar</th>
                    </thead>
                @endif    

                <tr>
                    <td>{{$noticia -> title}}</td>
                    <td class="abreviar">{{$noticia -> link}}</td>
                    <td>{{$noticia -> content}}</td>
                    <td ><a href="noticia/{{encrypt($noticia->id)}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a></td>
                    <td ><a href="noticia/eliminar/{{$noticia->id}}" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                </tr>

        
            @endforeach

        </Table>
    </div>
    @endif

    <br>
@endif
@endsection