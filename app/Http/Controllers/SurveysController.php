<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests\CreateQuestionRequest;
use App\Survey;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSurveyRequest;
use App\Http\Requests\CreateSectionRequest;
use App\Http\Requests\CreateAnswerRequest;
use App\Http\Requests\UpdateSurveyRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Question;
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
            'access' => $request->input('access'),
          
            
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

        $survey = session('survey');

       $myQuestion =  Question::create([

            'question' => $request->input('question'),
            'section_id' => $request->input('sectionName'),
            'typeQuestions' => $request->input('typeQuestion'),
            
        ]);

        if( $myQuestion->typeQuestions == 'cerradaDefault' ){
            
            Answer::create([
                'answer' => 'Muy satisfecho',
                'question_id' => $myQuestion->id,
            ]);

            Answer::create([
                'answer' => 'Satisfecho',
                'question_id' => $myQuestion->id,
            ]);

            Answer::create([
                'answer' => 'Ni satisfecho, ni insatisfecho',
                'question_id' => $myQuestion->id,
            ]);

            Answer::create([
                'answer' => 'Insatisfecho',
                'question_id' => $myQuestion->id,
            ]);

            Answer::create([
                'answer' => 'Muy insatisfecho',
                'question_id' => $myQuestion->id,
            ]);
        }

        if( $myQuestion ->typeQuestions == "cerradaMasOtro" ){

            Answer::create([

                'answer' => 'Otro',
                'question_id' => $myQuestion->id,
            ]);
        }

        return redirect('/survey/'.$survey->id);

        
    }

    public function createAnswer(createAnswerRequest $request){

        $survey = session('survey');

        Answer::create([
            'answer' => $request->input('answer'),
            'question_id' => $request->input('questionId'),
        ]);

        return redirect('/survey/'.$survey->id);



    }


    private function findById( $surveyId ){

        
        return $survey = Survey::where('id', $surveyId)->firstOrFail();
 
    }

    public function editSurvey( $surveyId ){

        $survey = $this->findById($surveyId);

        session()->flash('survey', $survey);

        return view('surveys.edit', [
            'survey' => $survey
        ]);

    }


    //Update data

    public function updateSurvey( UpdateSurveyRequest $request){



        $mySurvey = $this->findById( $request->input('surveyId') );

        $mySurvey->name = $request->input('nameSurvey');

        $mySurvey->save();

        $survey = session('survey');

        return redirect('/survey/edit/'.$survey->id);


    }

    public function updateSection( CreateSectionRequest $request ){

        $mySection = Section::where('id', $request->input('sectionId'))->firstOrFail();

        $mySection->name = $request->input('nameSection');

        $mySection->save();

        $survey = session('survey');

        return redirect('/survey/edit/'.$survey->id);

    }

    public function updateQuestion( UpdateQuestionRequest $request ){

        $myQuestion = Question::where('id', $request->input('questionId'))->firstOrFail();

        $myQuestion->question = $request->input('question');

        $myQuestion->save();

        $survey = session('survey');

        return redirect('/survey/edit/'.$survey->id);
    }

    public function updateAnswer ( CreateAnswerRequest $request ){

        $myAnswer = Answer::where('id', $request->input('answerId'))->firstOrFail();

        $myAnswer->answer = $request->input('answer');

        $myAnswer->save();

        $survey = session('survey');

        return redirect('/survey/edit/'.$survey->id);

    }

    public function deleteItem( Request $request ){

        $id = $request->input('itemId');
        $type = $request->input('itemType');
        $survey = session('survey');
        if( $type == 'section' ){

            $deleteItem = Section::where('id', $id)->firstOrFail();
            $deleteItem->delete();
            

            return redirect('/survey/edit/'.$survey->id);

        }
        elseif( $type == 'question' ){
            $deleteItem = Question::where('id', $id)->firstOrFail();
            $deleteItem->delete();
        }
        else{

            $deleteItem = Answer::where('id', $id)->firstOrFail();
            $deleteItem->delete();
        }



        return redirect('/survey/edit/'.$survey->id);
    }

}
