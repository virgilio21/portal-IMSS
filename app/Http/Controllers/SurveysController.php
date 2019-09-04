<?php

namespace App\Http\Controllers;
use App\Survey;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSurveyRequest;

class SurveysController extends Controller
{
    

    public function home(){

        $surveys = Survey::latest()->paginate(3);


        return view('surveys.dashboard', [

            'surveys' => $surveys,
        ]);
    }

    public function create(CreateSurveyRequest $request){

        Survey::create([
            
            'name' => $request->input('nameSurvey'),
            //Hay que guardar la imagen en algun lugar en este caso en una carpetas messages dentro de storage public, para eso se usa el comando php artisan storage:link para vincular la carpeta storage public a la carptea public, es un link sombolico :D.
            //Nos devuelve un nombre al azar para emitar nombres repetidos.
            
        ]);
 
        return redirect('/survey');
    }
}
