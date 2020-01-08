@extends('layouts.app')



@section('content')
    
    
    <h1 class="text-center">{{$survey->name}}</h1>
    <h2>Hola mundo</h2>
    <form action="/survey/send/answers" method="POST"> 
        {{ csrf_field() }}
        <div class="row">
            <div class="col-12">
                    @foreach ($survey->sections as $section)
                        <h2 class="card-text mt-4 text-primary">
                        {{$section->name}}
                        </h2>
                        <div class="text-muted card-text mb-2">
                            {{$section->created_at}}
                        </div>

                        @foreach ($section->questions as $question)

                            <p class="question mt-5">
                                
                            {{$loop->iteration}}. {{$question->question}}
                                
                            </p>
                            
                            @if( $question->typeQuestions == "abierta")

                                <div class="form-group">
                                <textarea name="abierta{{$question->id}}" id="" class="form-check-input" cols="80" rows="5"></textarea>
                                </div>
                            @endif


                            <div class="row d-flex justify-content-around">
                            @foreach ($question->answers as $answer)
                                
                            
                            @if( $question->typeQuestions == "cerradaMasOtro" )

                                @if( $answer->visibility == true )
                                    <div class="form-check-inline">
                                    
                                    <label class="form-check-label" for="radio{{$answer->id}}">

                                    <input type="radio" class="form-check-input mb-3" id="radio{{$answer->id}}" onclick="desbloqueo('{{$answer->answer}}', '{{$question->id}}')" name="optradio{{$question->id}}" value="{{$answer->id}}" >{{$answer->answer}}

                                    @if($answer->answer == 'Otro')
                                    <input type="text" class="mb-3" name="optradio{{$question->id}}Otro"  id="textOtro{{$question->id}}" disabled/>    
                                    @endif  
                                    </div>
                                @endif
                            @elseif( $question->typeQuestions != 'abierta' )
                                <div class="form-check-inline">
                                <label class="form-check-label" for="radio{{$answer->id}}">
                                <input type="radio" class="form-check-input mb-3" id="radio{{$answer->id}}" name="optradio{{$question->id}}" value="{{$answer->id}}" >{{$answer->answer}} 
                                </div>
                              
                            @endif

                            

                            
                                
                                
                                
                            @endforeach
                            </div> 

                        @endforeach

                    @endforeach
                
            </div>
        </div>


            
            

        @if($survey->sections->isEmpty())
            <h4>Esta encuesta esta vacia.</h4>
        @else
            @if( Auth::user()->hasRole('teacher') or Auth::user()->hasRole('user') )
                <button type="submit" class="btn btn-success mt-4">Guardar</button>
            @else
                <h5 class="mt-5 text-danger">No puedes contestar la encuesta esta vista es solo de previsualización.</h5>
            @endif
        
        @endif
    </form>
     

    
    
    <script src="{{ asset('js/passValueOfModal.js') }}" defer></script>

    <script>
    
        function desbloqueo( Mirespuesta, questionId){


            let inputText = document.getElementById( 'textOtro'+ questionId );

            console.log(inputText);
            
            if( inputText != undefined ){

                if( Mirespuesta === 'Otro' ){

                    inputText.removeAttribute( "disabled" );
                    inputText.focus();

                }else{

                    inputText.setAttribute( "disabled","");

                }
            }

            
        }
       
    </script>

    
@endsection
