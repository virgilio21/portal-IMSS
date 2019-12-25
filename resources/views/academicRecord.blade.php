@extends('layouts.app')

@section('content')
    <h2 style="text-align: center;">Historial academico no oficial</h2>
  
    @if (Auth::user()-> semester == 2)
    <table class="table table-responsive-xl table-striped">
    <h2>Primer semestre</h2>
        <thead>
                <th>Materia</th>
                <th>Creditos</th>
                <th>Horas</th>
                <th>Calificación</th>
        </thead>       
        @php
            $suma = 0;
            $veces = 0;
            $prom = 0;
        @endphp

        @foreach (Auth::user() -> groups as $curso)

            
               
            

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                    <tr>
                    @if ($item->matter_user_id == $curso->id and $curso->matter->semester==1)
                        <td>{{$curso->matter->name_matter}}</td>
                        <td>{{$curso->matter->number_credits}}</td>
                        <td>{{$curso->matter->number_hours}}</td>
                        <td>{{$item->final_qualification}}</td>
                       @php
                           $suma += $item->final_qualification;
                           $veces += count([$item->final_qualification]);
                           $prom = ($suma/$veces);
                       @endphp
                    @endif
                    </tr>
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom,2)}}</caption>
    </table>


    @php
        $promG = $prom ;
        $promG = $promG/1;
    @endphp
    <h3 style="text-align: center;">Promedio General: {{round($promG,2)}}</h3>

    @endif



    
    @if (Auth::user()-> semester == 3)
    <table class="table table-responsive-xl table-striped">
            
        @php
            $suma = 0;
            $veces = 0;
            $prom = 0;
        @endphp

       
                <h2>Primer semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
           

        @foreach (Auth::user() -> groups as $curso)


            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                    <tr>
                    @if ($item->matter_user_id == $curso->id and $curso->matter->semester==1)
                        <td>{{$curso->matter->name_matter}}</td>
                        <td>{{$curso->matter->number_credits}}</td>
                        <td>{{$curso->matter->number_hours}}</td>
                        <td>{{$item->final_qualification}}</td>
                       @php
                           $suma += $item->final_qualification;
                           $veces += count([$item->final_qualification]);
                           $prom = ($suma/$veces);
                       @endphp
                    @endif
                    </tr>
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom,2)}}</caption>
    </table>

    <table class="table table-responsive-xl table-striped">
        @php
        $suma2 = 0;
        $veces2 = 0;
        $prom2 = 0;
    @endphp        
    
                <h2>Segundo semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
         
        @foreach (Auth::user() -> groups as $curso)

           

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==2)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma2 += $item->final_qualification;
                                $veces2 += count([$item->final_qualification]);
                                $prom2 = ($suma2/$veces2);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom2,2)}}</caption>
    </table>

    @php
        $promG = $prom + $prom2 ;
        $promG = $promG/2;
    @endphp
    <h3 style="text-align: center;">Promedio General: {{round($promG,2)}}</h3>
    @endif







    @if (Auth::user()-> semester == 4)
    <table class="table table-responsive-xl table-striped">
            
        @php
            $suma = 0;
            $veces = 0;
            $prom = 0;
        @endphp
        
                <h2>Primer semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>

        @foreach (Auth::user() -> groups as $curso)

            
            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                    <tr>
                    @if ($item->matter_user_id == $curso->id and $curso->matter->semester==1)
                        <td>{{$curso->matter->name_matter}}</td>
                        <td>{{$curso->matter->number_credits}}</td>
                        <td>{{$curso->matter->number_hours}}</td>
                        <td>{{$item->final_qualification}}</td>
                       @php
                           $suma += $item->final_qualification;
                           $veces += count([$item->final_qualification]);
                           $prom = ($suma/$veces);
                       @endphp
                    @endif
                    </tr>
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom,2)}}</caption>
    </table>

    <table class="table table-responsive-xl table-striped">
        @php
        $suma2 = 0;
        $veces2 = 0;
        $prom2 = 0;
    @endphp        
    
                <h2>Segundo semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>

        @foreach (Auth::user() -> groups as $curso)


            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==2)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma2 += $item->final_qualification;
                                $veces2 += count([$item->final_qualification]);
                                $prom2 = ($suma2/$veces2);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom2,2)}}</caption>
    </table>


    <table class="table table-responsive-xl table-striped">
        @php
        $suma3 = 0;
        $veces3 = 0;
        $prom3 = 0;
    @endphp        
     

                <h2>Tercer semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
     

        @foreach (Auth::user() -> groups as $curso)

           

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==3)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma3 += $item->final_qualification;
                                $veces3 += count([$item->final_qualification]);
                                $prom3 = ($suma3/$veces3);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom3,2)}}</caption>
    </table>

    @php
        $promG = $prom + $prom2 + $prom3 ;
        $promG = $promG/3;
    @endphp
    <h3 style="text-align: center;">Promedio General: {{round($promG,2)}}</h3>

    @endif


    @if (Auth::user()-> semester == 5)
    <table class="table table-responsive-xl table-striped">
            
        @php
            $suma = 0;
            $veces = 0;
            $prom = 0;
        @endphp
        
                <h2>Primer semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>

        @foreach (Auth::user() -> groups as $curso)

            
            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                    <tr>
                    @if ($item->matter_user_id == $curso->id and $curso->matter->semester==1)
                        <td>{{$curso->matter->name_matter}}</td>
                        <td>{{$curso->matter->number_credits}}</td>
                        <td>{{$curso->matter->number_hours}}</td>
                        <td>{{$item->final_qualification}}</td>
                       @php
                           $suma += $item->final_qualification;
                           $veces += count([$item->final_qualification]);
                           $prom = ($suma/$veces);
                       @endphp
                    @endif
                    </tr>
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom,2)}}</caption>
    </table>

    <table class="table table-responsive-xl table-striped">
        @php
        $suma2 = 0;
        $veces2 = 0;
        $prom2 = 0;
    @endphp        
    
                <h2>Segundo semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>

        @foreach (Auth::user() -> groups as $curso)


            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==2)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma2 += $item->final_qualification;
                                $veces2 += count([$item->final_qualification]);
                                $prom2 = ($suma2/$veces2);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom2,2)}}</caption>
    </table>


    <table class="table table-responsive-xl table-striped">
        @php
        $suma3 = 0;
        $veces3 = 0;
        $prom3 = 0;
    @endphp        
     

                <h2>Tercer semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
     

        @foreach (Auth::user() -> groups as $curso)

           

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==3)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma3 += $item->final_qualification;
                                $veces3 += count([$item->final_qualification]);
                                $prom3 = ($suma3/$veces3);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom3,2)}}</caption>
    </table>



    <table class="table table-responsive-xl table-striped">
        @php
        $suma4 = 0;
        $veces4 = 0;
        $prom4 = 0;
    @endphp        
     

                <h2>Cuarto semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
     

        @foreach (Auth::user() -> groups as $curso)

           

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==4)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma4 += $item->final_qualification;
                                $veces4 += count([$item->final_qualification]);
                                $prom4 = ($suma4/$veces4);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom4,2)}}</caption>
    </table>

    @php
        $promG = $prom + $prom2 + $prom3+ $prom4;
        $promG = $promG/4;
    @endphp

    <h3 style="text-align: center;">Promedio General: {{round($promG,2)}}</h3>
    @endif





    @if (Auth::user()-> semester == 6)
    <table class="table table-responsive-xl table-striped">
            
        @php
            $suma = 0;
            $veces = 0;
            $prom = 0;
        @endphp
        
                <h2>Primer semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>

        @foreach (Auth::user() -> groups as $curso)

            
            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                    <tr>
                    @if ($item->matter_user_id == $curso->id and $curso->matter->semester==1)
                        <td>{{$curso->matter->name_matter}}</td>
                        <td>{{$curso->matter->number_credits}}</td>
                        <td>{{$curso->matter->number_hours}}</td>
                        <td>{{$item->final_qualification}}</td>
                       @php
                           $suma += $item->final_qualification;
                           $veces += count([$item->final_qualification]);
                           $prom = ($suma/$veces);
                       @endphp
                    @endif
                    </tr>
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom,2)}}</caption>
    </table>

    <table class="table table-responsive-xl table-striped">
        @php
        $suma2 = 0;
        $veces2 = 0;
        $prom2 = 0;
    @endphp        
    
                <h2>Segundo semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>

        @foreach (Auth::user() -> groups as $curso)


            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==2)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma2 += $item->final_qualification;
                                $veces2 += count([$item->final_qualification]);
                                $prom2 = ($suma2/$veces2);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom2,2)}}</caption>
    </table>


    <table class="table table-responsive-xl table-striped">
        @php
        $suma3 = 0;
        $veces3 = 0;
        $prom3 = 0;
    @endphp        
     

                <h2>Tercer semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
     

        @foreach (Auth::user() -> groups as $curso)

           

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==3)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma3 += $item->final_qualification;
                                $veces3 += count([$item->final_qualification]);
                                $prom3 = ($suma3/$veces3);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom3,2)}}</caption>
    </table>



    <table class="table table-responsive-xl table-striped">
        @php
        $suma4 = 0;
        $veces4 = 0;
        $prom4 = 0;
    @endphp        
     

                <h2>Cuarto semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
     

        @foreach (Auth::user() -> groups as $curso)

           

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==4)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma4 += $item->final_qualification;
                                $veces4 += count([$item->final_qualification]);
                                $prom4 = ($suma4/$veces4);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom4,2)}}</caption>
    </table>


    <table class="table table-responsive-xl table-striped">
        @php
        $suma5 = 0;
        $veces5 = 0;
        $prom5 = 0;
    @endphp        
     

                <h2>Quinto semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
     

        @foreach (Auth::user() -> groups as $curso)

           

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==5)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma5 += $item->final_qualification;
                                $veces5 += count([$item->final_qualification]);
                                $prom5 = ($suma5/$veces5);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom5,2)}}</caption>
    </table>

    @php
        $promG = $prom + $prom2 + $prom3+ $prom4 + $prom5;
        $promG = $promG/5;
    @endphp
    
    <h3 style="text-align: center;">Promedio General: {{round($promG,2)}}</h3>
    @endif





    @if (Auth::user()-> semester == 7)
    <table class="table table-responsive-xl table-striped">
            
        @php
            $suma = 0;
            $veces = 0;
            $prom = 0;
        @endphp
        
                <h2>Primer semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>

        @foreach (Auth::user() -> groups as $curso)

            
            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                    <tr>
                    @if ($item->matter_user_id == $curso->id and $curso->matter->semester==1)
                        <td>{{$curso->matter->name_matter}}</td>
                        <td>{{$curso->matter->number_credits}}</td>
                        <td>{{$curso->matter->number_hours}}</td>
                        <td>{{$item->final_qualification}}</td>
                       @php
                           $suma += $item->final_qualification;
                           $veces += count([$item->final_qualification]);
                           $prom = ($suma/$veces);
                       @endphp
                    @endif
                    </tr>
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom,2)}}</caption>
    </table>

    <table class="table table-responsive-xl table-striped">
        @php
        $suma2 = 0;
        $veces2 = 0;
        $prom2 = 0;
    @endphp        
    
                <h2>Segundo semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>

        @foreach (Auth::user() -> groups as $curso)


            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==2)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma2 += $item->final_qualification;
                                $veces2 += count([$item->final_qualification]);
                                $prom2 = ($suma2/$veces2);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom2,2)}}</caption>
    </table>


    <table class="table table-responsive-xl table-striped">
        @php
        $suma3 = 0;
        $veces3 = 0;
        $prom3 = 0;
    @endphp        
     

                <h2>Tercer semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
     

        @foreach (Auth::user() -> groups as $curso)

           

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==3)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma3 += $item->final_qualification;
                                $veces3 += count([$item->final_qualification]);
                                $prom3 = ($suma3/$veces3);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom3,2)}}</caption>
    </table>



    <table class="table table-responsive-xl table-striped">
        @php
        $suma4 = 0;
        $veces4 = 0;
        $prom4 = 0;
    @endphp        
     

                <h2>Cuarto semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
     

        @foreach (Auth::user() -> groups as $curso)

           

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==4)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma4 += $item->final_qualification;
                                $veces4 += count([$item->final_qualification]);
                                $prom4 = ($suma4/$veces4);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom4,2)}}</caption>
    </table>


    <table class="table table-responsive-xl table-striped">
        @php
        $suma5 = 0;
        $veces5 = 0;
        $prom5 = 0;
    @endphp        
     

                <h2>Quinto semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
     

        @foreach (Auth::user() -> groups as $curso)

           

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==5)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma5 += $item->final_qualification;
                                $veces5 += count([$item->final_qualification]);
                                $prom5 = ($suma5/$veces5);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom5,2)}}</caption>
    </table>


    <table class="table table-responsive-xl table-striped">
        @php
        $suma6 = 0;
        $veces6 = 0;
        $prom6 = 0;
    @endphp        
     

                <h2>Sexto semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
     

        @foreach (Auth::user() -> groups as $curso)

           

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==6)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma6 += $item->final_qualification;
                                $veces6 += count([$item->final_qualification]);
                                $prom6 = ($suma6/$veces6);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom6,2)}}</caption>
    </table>


    @php
        $promG = $prom + $prom2 + $prom3+ $prom4 + $prom5 + $prom6;
        $promG = $promG/6;
    @endphp
    
    <h3 style="text-align: center;">Promedio General: {{round($promG,2)}}</h3>
    @endif


    


    @if (Auth::user()-> semester == 8)
    <table class="table table-responsive-xl table-striped">
            
        @php
            $suma = 0;
            $veces = 0;
            $prom = 0;
        @endphp
        
                <h2>Primer semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>

        @foreach (Auth::user() -> groups as $curso)

            
            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                    <tr>
                    @if ($item->matter_user_id == $curso->id and $curso->matter->semester==1)
                        <td>{{$curso->matter->name_matter}}</td>
                        <td>{{$curso->matter->number_credits}}</td>
                        <td>{{$curso->matter->number_hours}}</td>
                        <td>{{$item->final_qualification}}</td>
                       @php
                           $suma += $item->final_qualification;
                           $veces += count([$item->final_qualification]);
                           $prom = ($suma/$veces);
                       @endphp
                    @endif
                    </tr>
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom,2)}}</caption>
    </table>

    <table class="table table-responsive-xl table-striped">
        @php
        $suma2 = 0;
        $veces2 = 0;
        $prom2 = 0;
    @endphp        
    
                <h2>Segundo semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>

        @foreach (Auth::user() -> groups as $curso)


            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==2)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma2 += $item->final_qualification;
                                $veces2 += count([$item->final_qualification]);
                                $prom2 = ($suma2/$veces2);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom2,2)}}</caption>
    </table>


    <table class="table table-responsive-xl table-striped">
        @php
        $suma3 = 0;
        $veces3 = 0;
        $prom3 = 0;
    @endphp        
     

                <h2>Tercer semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
     

        @foreach (Auth::user() -> groups as $curso)

           

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==3)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma3 += $item->final_qualification;
                                $veces3 += count([$item->final_qualification]);
                                $prom3 = ($suma3/$veces3);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom3,2)}}</caption>
    </table>



    <table class="table table-responsive-xl table-striped">
        @php
        $suma4 = 0;
        $veces4 = 0;
        $prom4 = 0;
    @endphp        
     

                <h2>Cuarto semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
     

        @foreach (Auth::user() -> groups as $curso)

           

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==4)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma4 += $item->final_qualification;
                                $veces4 += count([$item->final_qualification]);
                                $prom4 = ($suma4/$veces4);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom4,2)}}</caption>
    </table>


    <table class="table table-responsive-xl table-striped">
        @php
        $suma5 = 0;
        $veces5 = 0;
        $prom5 = 0;
    @endphp        
     

                <h2>Quinto semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
     

        @foreach (Auth::user() -> groups as $curso)

           

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==5)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma5 += $item->final_qualification;
                                $veces5 += count([$item->final_qualification]);
                                $prom5 = ($suma5/$veces5);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom5,2)}}</caption>
    </table>



    <table class="table table-responsive-xl table-striped">
        @php
        $suma6 = 0;
        $veces6 = 0;
        $prom6 = 0;
    @endphp        
     

                <h2>Sexto semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
     

        @foreach (Auth::user() -> groups as $curso)

           

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==6)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma6 += $item->final_qualification;
                                $veces6 += count([$item->final_qualification]);
                                $prom6 = ($suma6/$veces6);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom6,2)}}</caption>
    </table>

    <table class="table table-responsive-xl table-striped">
        @php
        $suma7 = 0;
        $veces7 = 0;
        $prom7 = 0;
    @endphp        
     

                <h2>Septimo semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
     

        @foreach (Auth::user() -> groups as $curso)

           

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==7)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma7 += $item->final_qualification;
                                $veces7 += count([$item->final_qualification]);
                                $prom7 = ($suma7/$veces7);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom7,2)}}</caption>
    </table>


    @php
        $promG = $prom + $prom2 + $prom3+ $prom4 + $prom5 + $prom6 + $prom7;
        $promG = $promG/7;
    @endphp
    
    <h3 style="text-align: center;">Promedio General: {{round($promG,2)}}</h3>
    @endif




    @if (Auth::user()-> semester == null and Auth::user()->visibility==0)
    <table class="table table-responsive-xl table-striped">
            
        @php
            $suma = 0;
            $veces = 0;
            $prom = 0;
        @endphp
        
                <h2>Primer semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>

        @foreach (Auth::user() -> groups as $curso)

            
            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                    <tr>
                    @if ($item->matter_user_id == $curso->id and $curso->matter->semester==1)
                        <td>{{$curso->matter->name_matter}}</td>
                        <td>{{$curso->matter->number_credits}}</td>
                        <td>{{$curso->matter->number_hours}}</td>
                        <td>{{$item->final_qualification}}</td>
                       @php
                           $suma += $item->final_qualification;
                           $veces += count([$item->final_qualification]);
                           $prom = ($suma/$veces);
                       @endphp
                    @endif
                    </tr>
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom,2)}}</caption>
    </table>

    <table class="table table-responsive-xl table-striped">
        @php
        $suma2 = 0;
        $veces2 = 0;
        $prom2 = 0;
    @endphp        
    
                <h2>Segundo semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>

        @foreach (Auth::user() -> groups as $curso)


            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==2)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma2 += $item->final_qualification;
                                $veces2 += count([$item->final_qualification]);
                                $prom2 = ($suma2/$veces2);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom2,2)}}</caption>
    </table>


    <table class="table table-responsive-xl table-striped">
        @php
        $suma3 = 0;
        $veces3 = 0;
        $prom3 = 0;
    @endphp        
     

                <h2>Tercer semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
     

        @foreach (Auth::user() -> groups as $curso)

           

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==3)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma3 += $item->final_qualification;
                                $veces3 += count([$item->final_qualification]);
                                $prom3 = ($suma3/$veces3);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom3,2)}}</caption>
    </table>



    <table class="table table-responsive-xl table-striped">
        @php
        $suma4 = 0;
        $veces4 = 0;
        $prom4 = 0;
    @endphp        
     

                <h2>Cuarto semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
     

        @foreach (Auth::user() -> groups as $curso)

           

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==4)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma4 += $item->final_qualification;
                                $veces4 += count([$item->final_qualification]);
                                $prom4 = ($suma4/$veces4);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom4,2)}}</caption>
    </table>


    <table class="table table-responsive-xl table-striped">
        @php
        $suma5 = 0;
        $veces5 = 0;
        $prom5 = 0;
    @endphp        
     

                <h2>Quinto semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
     

        @foreach (Auth::user() -> groups as $curso)

           

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==5)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma5 += $item->final_qualification;
                                $veces5 += count([$item->final_qualification]);
                                $prom5 = ($suma5/$veces5);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom5,2)}}</caption>
    </table>


    <table class="table table-responsive-xl table-striped">
        @php
        $suma6 = 0;
        $veces6 = 0;
        $prom6 = 0;
    @endphp        
     

                <h2>Sexto semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
     

        @foreach (Auth::user() -> groups as $curso)

           

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==6)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma6 += $item->final_qualification;
                                $veces6 += count([$item->final_qualification]);
                                $prom6 = ($suma6/$veces6);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom6,2)}}</caption>
    </table>

    <table class="table table-responsive-xl table-striped">
        @php
        $suma7 = 0;
        $veces7 = 0;
        $prom7 = 0;
    @endphp        
     

                <h2>Septimo semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
     

        @foreach (Auth::user() -> groups as $curso)

           

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==7)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma7 += $item->final_qualification;
                                $veces7 += count([$item->final_qualification]);
                                $prom7 = ($suma7/$veces7);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom7,2)}}</caption>
    </table>

    
    <table class="table table-responsive-xl table-striped">
        @php
        $suma8 = 0;
        $veces8 = 0;
        $prom8 = 0;
    @endphp        
     

                <h2>Octavo semestre</h2>
                <thead>
                    <th>Materia</th>
                    <th>Creditos</th>
                    <th>Horas</th>
                    <th>Calificación</th>
                </thead>
     

        @foreach (Auth::user() -> groups as $curso)

           

            @if ($curso->visibility==0)
                @foreach (Auth::user()->grupoAlumno as $item)

                   
                    @if ($item->matter_user_id == $curso->id)
                        @if ($curso->matter->semester==8)
                        <tr>
                            <td>{{$curso->matter->name_matter}}</td>
                            <td>{{$curso->matter->number_credits}}</td>
                            <td>{{$curso->matter->number_hours}}</td>
                            <td>{{$item->final_qualification}}</td>

                            @php
                                $suma8 += $item->final_qualification;
                                $veces8 += count([$item->final_qualification]);
                                $prom8 = ($suma8/$veces8);
                            @endphp

                        </tr>
                        @endif
                    @endif
                @endforeach       
            @endif
        @endforeach

        <caption>Promedio semestral: {{round($prom8,2)}}</caption>
    </table>


    @php
        $promG = $prom + $prom2 + $prom3+ $prom4 + $prom5 + $prom6 + $prom7 + $prom8;
        $promG = $promG/8;
    @endphp
    
    <h3 style="text-align: center;">Promedio General: {{round($promG,2)}}</h3>
    @endif

@endsection