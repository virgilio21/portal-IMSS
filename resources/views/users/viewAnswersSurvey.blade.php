@extends('layouts.app')


@section('content')

<div class="container">
<h2 class="text-center">{{$userName}} a contestado "{{$surveyName}}".</h2>

    <div class="row">

        <div class="col-8">


            @foreach ( $answers as $answer )
                <div class="mt-4 mb-4">
                    <h3> {{$loop->iteration}}. {{$answer->question->question}} </h3>
                    <p class="text-danger"> R= {{$answer->answer}} </p>
                </div>
            @endforeach

        </div>
    </div>
</div>
@endsection