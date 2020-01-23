@extends('layouts.app')



@section('content')

<div class="container">
<div class="row">
    @if(Session::has('error'))
    <div class="col-12" >
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{Session::get('error')}}
        </div>
    </div>
    @endif
</div>

<div class="row">
    <div class="col-12" >
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Realizar cambios cuando un alumno ya ha contestado la encuesta puede afectar a la interpretacion de los resultados. 
        </div>
    </div>
</div>

<a href="#" class="mb-4" data-toggle="modal" data-target="#editSurvey" onclick="recibirValue( 'nameSurvey','{{$survey->name}}', 'surveyId','{{$survey->id}}' );"><h1>Nombre: {{$survey->name}}</h1></a>
<a href="/survey/{{encrypt($survey->id)}}" >Regresar a la vista de creación.</a>



    <div class="row mt-4">
        <div class="col-12">
                @foreach ($survey->sections as $section)
                    <h2 class="card-text">
                    <a href="#" class="mb-4 mr-3" data-toggle="modal" data-target="#editSection" onclick="recibirValue( 'nameSection','{{$section->name}}', 'sectionId', '{{$section->id}}');">{{$section->name}}</a>
                    <a href="#" data-toggle="modal" data-target="#removeItem" onclick="recibirValue('itemId', '{{$section->id}}', 'itemType','section')">
                    <i class="far fa-trash-alt text-danger"></i>
                    </a>
                    </h2>
                    <div class="text-muted card-text">
                        {{$section->created_at}}
                    </div>

                    @foreach ($section->questions as $question)

                        <p class="question">                           
                        <a href="#" class="mb-4 mr-3" data-toggle="modal" data-target="#editQuestion" onclick="recibirValue('question', '{{$question->question}}', 'questionId', '{{$question->id}}' )">
                                    {{$loop->iteration}}. {{$question->question}}
                        </a>
                        <a href="#" data-toggle="modal" data-target="#removeItem">
                            <i class="far fa-trash-alt text-success" onclick="recibirValue('itemId', '{{$question->id}}', 'itemType','question')"></i>
                        </a>
                        </p>

                        <div class="row d-flex justify-content-around">
                        @foreach ($question->answers as $answer)
                            
                            
                                <p>
                                    @if( ($answer->answer == 'Otro') or ($answer->answer == 'Muy satisfecho') or ($answer->answer == 'Satisfecho') or ($answer->answer == 'Ni satisfecho, ni insatisfecho') or ($answer->answer == 'Insatisfecho') or ($answer->answer == 'Muy insatisfecho'))
                                        
                                        {{$loop->iteration}}. {{$answer->answer}}
                                        
                                    @elseif( $answer->question->typeQuestions == 'abierta' )
                                        
                            
                                    
                                    @else
                                    <a href="#" class="mb-4 mr-3" data-toggle="modal" data-target="#editAnswer" onclick="recibirValue('answer', '{{$answer->answer}}', 'answerId', '{{$answer->id}}' )">
                                            {{$loop->iteration}}. {{$answer->answer}}
                                    </a>

                                    <a href="#" data-toggle="modal" data-target="#removeItem" onclick="recibirValue('itemId', '{{$answer->id}}', 'itemType','answer')">
                                        <i class="far fa-trash-alt text-primary"></i>
                                    </a>

                                    @endif
                                    

                                    
                                </p>
                            
                            
                            
                        @endforeach
                        </div> 

                    @endforeach

                @endforeach
            
        </div>
    </div>
</div>
     
    
    
    @include('layouts.surveyEdit')
    @include('layouts.sectionEdit')
    @include('layouts.questionEdit')
    @include('layouts.answerEdit')
    @include('layouts.removeItem')
    <script src="{{ asset('js/passValueOfModal.js') }}" defer></script>

    
@endsection



    


