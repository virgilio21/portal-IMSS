@extends('layouts.app')



@section('content')
    
    
<a href="#" class="mb-4" data-toggle="modal" data-target="#editSurvey" onclick="recibirValue( 'nameSurvey','{{$survey->name}}', 'surveyId','{{$survey->id}}' );"><h1>{{$survey->name}}</h1></a>

<a href="#" class="mb-4" data-toggle="modal" data-target="#removeItem">
    Remove
</a>

    <div class="row mt-4">
        <div class="col-12">
                @foreach ($survey->sections as $section)
                    <h2 class="card-text">
                    <a href="#" class="mb-4" data-toggle="modal" data-target="#editSection" onclick="recibirValue( 'nameSection','{{$section->name}}', 'sectionId', '{{$section->id}}');">{{$section->name}}</a>
                    </h2>
                    <div class="text-muted card-text">
                        {{$section->created_at}}
                    </div>

                    @foreach ($section->questions as $question)

                        <p class="question">                           
                        <a href="#" class="mb-4 black" data-toggle="modal" data-target="#editQuestion" onclick="recibirValue('question', '{{$question->question}}', 'questionId', '{{$question->id}}' )">
                                    {{$loop->iteration}}. {{$question->question}}
                                </a>
                        </p>

                        <div class="row d-flex justify-content-around">
                        @foreach ($question->answers as $answer)
                            
                            
                                <p>
                                    <a href="#" class="mb-4 black" data-toggle="modal" data-target="#editAnswer" onclick="recibirValue('answer', '{{$answer->answer}}', 'answerId', '{{$answer->id}}' )">
                                                {{$loop->iteration}}. {{$answer->answer}}
                                    </a>
                                    
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



    


