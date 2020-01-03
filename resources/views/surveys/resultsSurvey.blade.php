@extends('layouts.app')


@section('content')

    <style>
    
    
        canvas.tamanio{
            height:100vh !important;
        }
    
    </style>

    <script src="{{ asset('js/chartjs.js') }}" defer></script>

    <h1 class="mb-4 text-center">Encuesta: {{$surveyName}}</h1>
    @foreach ( $questions as $question )
        <canvas id="myChart{{$loop->iteration}}" class="tamanio"></canvas>
    @endforeach
        
        

    @foreach ( $questions as $question )
        

        @php

            $opcionesRespuestas = array();
            foreach ( $question->answers as $answer ) {
                
                if( $answer->visibility == true ){
                $opcionesRespuestas[] = $answer->answer;
                }
            }

            $opcionesRespuestasContadas = array();
            foreach ( $question->answers as $answer ) {
                
                $opcionesRespuestasContadas[] = $answer->count;
            }
            
        @endphp

       

        <script>

            $(document).ready(function(){
            
            
            var respuestas = @php  echo(json_encode($opcionesRespuestas)) @endphp;
            var respuestasContadas = @php  echo(json_encode($opcionesRespuestasContadas)) @endphp;

            var ctx = document.getElementById("myChart{{$loop->iteration}}");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: respuestas,
                    datasets: [{
                        label: "{{$question->question}}",
                        data: respuestasContadas,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

        });

        </script>

    @endforeach

    <h5><a href="/users/list/" class="text-success">Ver lista de usuarios que contestaron.</a></h5>
    
@endsection