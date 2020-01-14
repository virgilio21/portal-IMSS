@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
<div class="container mb-3">
    <div class="row">
        @foreach($noticias as $item)
            <div class="col-lg-4 col-md-6 col-12 mt-3 d-flex align-items-strech">
            <div class="card">
                <img src="{{asset('img/IMG_6062.jpg')}}" class="card-img-top" alt="face-perfil">
                <div class="card-body">
                <h5 class="card-title text-center">{{$item->title}}</h5>
                <div class="d-flex justify-content-around align-items-center">
                <a href="/noticia/show/{{$item-> id}}" class="btn btn-danger" >Leer más</a><span class="muted badge badge-warning">{{$item->created_at}}</span>
              </div>
                </div>
            </div>
            </div>
        @endforeach
    </div>
    <br>
    <div class="row">
        @if(count($noticias))
            <div class="mt-2 mx-auto">
                {{$noticias->links()}}
            </div>
        @endif
    </div>
</div>
@endsection