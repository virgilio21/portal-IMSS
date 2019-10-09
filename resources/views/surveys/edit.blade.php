@extends('layouts.app')



@section('content')
    
    
<a href="#" class="mb-4" data-toggle="modal" data-target="#editSurvey" onclick="recibirValue( 'nameSurvey','{{$survey->name}}', 'surveyId','{{$survey->id}}' );"><h1>{{$survey->name}}</h1></a>
<a href="/survey/{{$survey->id}}" >Regresar a la vista de creación.</a>



    <div class="row mt-4">
        <div class="col-12">
                @foreach ($survey->sections as $section)
                    <h2 class="card-text">
                    <a href="#" class="mb-4" data-toggle="modal" data-target="#editSection" onclick="recibirValue( 'nameSection','{{$section->name}}', 'sectionId', '{{$section->id}}');">{{$section->name}}</a>
                    <a href="#" data-toggle="modal" data-target="#removeItem" onclick="recibirValue('itemId', '{{$section->id}}', 'itemType','section')">
                    <i class="far fa-trash-alt text-danger"></i>
                    </a>
                    </h2>
                    <div class="text-muted card-text">
                        {{$section->created_at}}
                    </div>

                    @foreach ($section->questions as $question)

                        <p class="question">                           
                        <a href="#" class="mb-4 black" data-toggle="modal" data-target="#editQuestion" onclick="recibirValue('question', '{{$question->question}}', 'questionId', '{{$question->id}}' )">
                                    {{$loop->iteration}}. {{$question->question}}
                        </a>
                        <a href="#" data-toggle="modal" data-target="#removeItem" >
                            <i class="far fa-trash-alt text-success" onclick="recibirValue('itemId', '{{$question->id}}', 'itemType','question')"></i>
                        </a>
                        </p>

                        <div class="row d-flex justify-content-around">
                        @foreach ($question->answers as $answer)
                            
                            
                                <p>
                                    @if( ($answer->answer == 'Otro') or ($answer->answer == 'Muy satisfecho') or ($answer->answer == 'Satisfecho') or ($answer->answer == 'Ni satisfecho, ni insatisfecho') or ($answer->answer == 'Insatisfecho') or ($answer->answer == 'Muy insatisfecho') or ($answer->answer == 'Esta es una pregunta abierta'))
                                    
                                    {{$loop->iteration}}. {{$answer->answer}}
                                    @else
                                    

                                    <a href="#" class="mb-4 black" data-toggle="modal" data-target="#editAnswer" onclick="recibirValue('answer', '{{$answer->answer}}', 'answerId', '{{$answer->id}}' )">
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
     
    
    
    @include('layouts.surveyEdit')
    @include('layouts.sectionEdit')
    @include('layouts.questionEdit')
    @include('layouts.answerEdit')
    @include('layouts.removeItem')
    <script src="{{ asset('js/passValueOfModal.js') }}" defer></script>

    
@endsection



    


