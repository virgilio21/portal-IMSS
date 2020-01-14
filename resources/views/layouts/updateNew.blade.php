@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" >
                        Editar noticia
                    </div>
                    <div class="card-body">    
                        <form method="POST" action="/noticia/update/{{$noticia -> id}}">
                            {{method_field('PATCH')}}
                            {{csrf_field()}}

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Noticia') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$noticia->title}}" required autocomplete="title" autofocus>

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
                                    <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{$noticia->link}}" required autocomplete="link" autofocus>

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
                                    <textarea id="content" type="text" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror" name="content"required autocomplete="content" autofocus>{{$noticia->content}}</textarea>
                                    @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
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
    <br>
    
@endsection