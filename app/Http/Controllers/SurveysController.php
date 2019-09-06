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
          
            
        ]);
 
        return redirect('/survey');
    }
}
