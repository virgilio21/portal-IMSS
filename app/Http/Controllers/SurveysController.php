<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestionRequest;
use App\Survey;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSurveyRequest;
use App\Http\Requests\CreateSectionRequest;
use App\Section;

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

    public function show( $surveyId ){

        $survey = $this->findById($surveyId);

        session()->flash('survey', $survey);

        return view('surveys.show', [
            'survey' => $survey
        ]);

    }

    public function createSection(CreateSectionRequest $request){

        $survey = session('survey');

        Section::create([
            
            'name' => $request->input('nameSection'),
            'survey_id' => $survey->id,
            
        ]);


        return redirect('/survey/'.$survey->id);
    }

    public function createQuestion(CreateQuestionRequest $request){

        
    }


    private function findById( $surveyId ){

        
        return $survey = Survey::where('id', $surveyId)->firstOrFail();
 
    }
}
