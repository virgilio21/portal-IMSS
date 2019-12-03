@extends('layouts.app')


@section('content')
 
    <h2 class="text-center mb-4">Usuarios que han contestado la encuesta.</h2>
    <ul>

        @foreach ( $users as $user )
        
            <a href="/answers/user/{{$user->id}}"><li class="mb-2">{{$user->name}} {{$user->surnames}}</li></a>

        @endforeach
    
    </ul>


@endsection