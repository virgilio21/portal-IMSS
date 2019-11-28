@extends('layouts.app')


@section('content')
    
    <h1>Hola si funciona {{$survey->name}}</h1>


    @foreach ( $survey->sections as $section )
        
        @foreach ($section->questions as $question)
            
            @foreach ($question->answers as $answer)
                
                <p>{{$question->question}}</p>
                <p>{{$answer->answer}}-{{ $answer->count}}</p>
            @endforeach
        @endforeach
    @endforeach

    
    
@endsection