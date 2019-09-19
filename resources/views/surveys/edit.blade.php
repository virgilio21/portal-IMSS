@extends('layouts.app')


@section('content')

    <h1 class="mb-4">

        Nombre:
        <a href="#" class="mb-4" data-toggle="modal" data-target="#editSurvey" >{{$survey->name }} 🐤</a>
        @include('layouts.surveyEdit')
        
    
    </h1>
    


    <div class="row">
        <div class="col-12">
            <?php 
                            
                            $contador = 0;
                            $contadorRespuestas = 0
            ?>
            @foreach ($survey->sections as $section)
                <h2 class="card-text">
                <a href="#" class="mb-4" data-toggle="modal" data-target="#editSection{{$loop->iteration}}">
                        
                        {{$section->name}}</a>
                </h2>
                <div class="text-muted card-text">
                        {{$section->created_at}}
                </div>

                @include('layouts.sectionEdit')

                @foreach ($section->questions as $question)

                    <p class="question">

                        <?php $contador++;?>
                    <a href="#" class="mb-4 black" data-toggle="modal" data-target="#editQuestion{{$loop->iteration}}<?php echo($contador)?>">
                                {{$loop->iteration}}. {{$question->question}}</a>
                            
                            @include('layouts.questionEdit')
                        
                    </p>

                    <div class="d-flex justify-content-around">
                            @foreach ($question->answers as $answer)
                                <?php $contadorRespuestas++;?>
                                <p>
                                <a href="#" class="mb-4 black" data-toggle="modal" data-target="#editAnswer<?php echo($contadorRespuestas)?>" > {{$loop->iteration}}. {{$answer->answer}}</a>
                                @include('layouts.answerEdit')
                                </p>
                                
                            @endforeach
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>




<!--Zona de include y scripts-->







@endsection