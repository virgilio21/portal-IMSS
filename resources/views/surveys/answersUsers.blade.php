@extends('layouts.app')



@section('content')
    
    
    <h1 class="">{{$survey->name}}</h1>
    
    <form action="/survey/send/answers" method="POST"> 
        <div class="row">
            <div class="col-12">
                    @foreach ($survey->sections as $section)
                        <h2 class="card-text mt-4">
                        {{$section->name}}
                        </h2>
                        <div class="text-muted card-text mb-2">
                            {{$section->created_at}}
                        </div>

                        @foreach ($section->questions as $question)

                            <p class="question mt-5">

                            {{$loop->iteration}}. {{$question->question}}
                                
                            </p>
                            

                            <div class="row d-flex justify-content-around">
                            @foreach ($question->answers as $answer)
                                
                            @if( $question->typeQuestions == "abierta")

                                <div class="form-group">
                                <textarea name="abierta{{$question->id}}" id="" cols="70" rows="5"></textarea>
                                </div>

                            @endif

                            <div class="form-check-inline">
                            <label class="form-check-label" for="radio{{$answer->id}}">
                            <input type="radio" class="form-check-input" id="radio{{$answer->id}}" name="optradio{{$question->id}}" value="{{$answer->answer}}" >{{$answer->answer}} 
                            </div>

                            
                                
                                
                                
                            @endforeach
                            </div> 

                        @endforeach

                    @endforeach
                
            </div>
        </div>


            
            

        @if($survey->sections->isEmpty())
            <h4>No hay nada que responder.</h4>
        @else
        <button type="submit" class="btn btn-success mt-4">Guardar</button>
        @endif
    </form>
     

    
    
    <script src="{{ asset('js/passValueOfModal.js') }}" defer></script>

    
@endsection
