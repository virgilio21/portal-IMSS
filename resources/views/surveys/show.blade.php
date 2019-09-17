@extends('layouts.app')



@section('content')
    
    
    <h1>{{$survey->name}}</h1>

    <div class="row">

        <div class="col-6">


            <form action="/survey/section/create" method="POST">
                
                
                <div class="form-group">
                
                    {{ csrf_field() }}
                    <input class="form-control" type="text" name="nameSection" placeholder="¿Cual es el nombre de tu nueva sección?" value='{{ old('nameSection') }}' required autocomplete="nameSection"  />

                    

                    @if( $errors->has('nameSection'))

                        <!--Obtiene los errores asociados a message, iterando-->
                        @foreach ($errors->get('nameSection') as $error)
                            <div class="form-control-feedback" >{{$error}}</div>    
                        @endforeach
                    @endif
        
                </div>

               
            
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
                @foreach ($survey->sections as $section)
                    <h2 class="card-text">
                        <a href="#" class="mb-4" data-toggle="modal" data-target="#create" onclick="recibirValue( 'sectionName','{{$section->id}}' );">{{$section->name}}</a>
                    </h2>
                    <div class="text-muted card-text">
                        {{$section->created_at}}
                    </div>

                    @foreach ($section->questions as $question)

                        <p class="question">

                            @if( $question->typeQuestions == "cerradaDefault")
                                {{$loop->iteration}}. {{$question->question}}
                            @endif

                            @if( $question->typeQuestions == "cerradaPropia")
                                <a href="#" class="mb-4 black" data-toggle="modal" data-target="#createAnswer" onclick="recibirValue('questionId', '{{$question->id}}')">
                                    {{$loop->iteration}}. {{$question->question}}
                                </a>
                            @endif
                            
                        </p>

                        <div class="row d-flex justify-content-around">
                        @foreach ($question->answers as $answer)
                            
                            
                                <p>
                                    {{$loop->iteration}}. {{$answer->answer}}
                                </p>
                            
                            
                            
                        @endforeach
                        </div> 

                    @endforeach

                @endforeach
            
        </div>
    </div>
     

    
    @include('layouts.question')
    @include('layouts.answer')
    <script src="{{ asset('js/passValueOfModal.js') }}" defer></script>

    
@endsection


    


