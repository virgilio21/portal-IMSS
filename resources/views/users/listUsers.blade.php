@extends('layouts.app')


@section('content')
 
    <h2 class="text-center mb-4">Usuarios que han contestado la encuesta.</h2>

    <div class="row">



        <div class="col-6">


        
            <ul>
                @foreach ( $users as $user )
                    <li class="mb-2"><a href="/answers/user/{{$user->id}}"><span class="list">{{$user->surnames}}</span>  {{$user->name}}</a></li> 

                    @if( $loop->iteration == $loop->count )
                        <h5 class="mt-4">Total de usuarios que han respondido:{{$loop->count}}</h5>
                    @endif
                @endforeach
            </ul>

            
        </div>
    </div>


@endsection