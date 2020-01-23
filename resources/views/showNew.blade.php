@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
<div class="container mb-3">
    <div class="row">

        @php
            $a = $noticia->content;
            $string = $a;
            $xx = html_entity_decode($string, ENT_HTML401, 'UTF-8');
        @endphp
            <div class="col-12">
                <h2 class="text-center">{{$noticia->title}}</h2>
                <img src="{{asset('img/IMG_6058.jpg')}}" alt="" class="tamanio mb-3">
                <div id="txt">{!!$xx!!}</div>
            <div id="el"></div>
            </div>
        
    </div>
</div>

<script>
    /*txt = document.getElementById("txt");
    console.log(txt.innerHTML);*/
    /*const name = "{{$xx}}";
    el.innerHTML = name;*/
</script>



@endsection