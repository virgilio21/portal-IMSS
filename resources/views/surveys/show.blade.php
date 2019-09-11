@extends('layouts.app')



@section('content')
 
    <h1>{{$survey->name}}</h1>

    <div class="row">

        <div class="col-6">


            <form action="/survey/section/create" method="POST">
                
                
                <div class="form-group">
                
                    {{ csrf_field() }}
                    <input class="form-control" type="text" name="nameSection" placeholder="¿Cual es el nombre de tu nueva sección?" value='{{ old('nameSection') }}' required autocomplete="nameSection" />

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
                    <a href="#" class="mb-4" data-toggle="modal" data-target="#create" id="nameValue" onclick="recibirSection();">{{$section->name}}</a>
                </h2>
                <div class="text-muted card-text">
                    {{$section->created_at}}
                </div>
                @endforeach
            
        </div>
    </div>
     

    <script>

    function recibirSection(){
        var nombreSection = document.getElementById('nameValue').innerHTML;
        document.getElementById('sectionName').value = nombreSection;
    }
     
        
    </script>
    @include('layouts.question')
    
    
@endsection


    

