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
    

    public function home( Request $request ){

        $request->user()->authorizeRoles('admin');
        $surveys = Survey::latest()->paginate(4);


        return view('surveys.dashboard', [

            'surveys' => $surveys,
        ]);
    }

    public function create( CreateSurveyRequest $request ){

        $request->user()->authorizeRoles('admin');
        Survey::create([
            
            'name' => $request->input('nameSurvey'),
            'access' => $request->input('access'),
          
            
        ]);
 
        return redirect('/survey');
    }

    public function show( $surveyId, Request $request ){

        $request->user()->authorizeRoles('admin');
        $survey = $this->findById($surveyId);

        session()->flash('survey', $survey);

        return view('surveys.show', [
            'survey' => $survey
        ]);

    }

    public function createSection(CreateSectionRequest $request){

        $request->user()->authorizeRoles('admin');
        $survey = session('survey');

        Section::create([
            
            'name' => $request->input('nameSection'),
            'survey_id' => $survey->id,
            
        ]);


        return redirect('/survey/'.$survey->id);
    }

    public function createQuestion(CreateQuestionRequest $request){

        $request->user()->authorizeRoles('admin');

        $survey = session('survey');

       $myQuestion =  Question::create([

            'question' => $request->input('question'),
            'section_id' => $request->input('sectionName'),
            'typeQuestions' => $request->input('typeQuestion'),
            
        ]);

        if( $myQuestion->typeQuestions == 'cerradaDefault' ){
            
            $request->user()->authorizeRoles('admin');

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

        if( $myQuestion->typeQuestions == "cerradaMasOtro" ){

            Answer::create([

                'answer' => 'Otro',
                'question_id' => $myQuestion->id,
            ]);
        }

        if ( $myQuestion->typeQuestions == "abierta"){

            Answer::create([
                'answer' => 'Esta es una pregunta abierta',
                'question_id' => $myQuestion->id,
            ]);
        }

        return redirect('/survey/'.$survey->id);

        
    }

    public function createAnswer(createAnswerRequest $request){

        $request->user()->authorizeRoles('admin');
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

    public function editSurvey( $surveyId , Request $request ){

        $request->user()->authorizeRoles('admin');
        $survey = $this->findById($surveyId);

        session()->flash('survey', $survey);

        return view('surveys.edit', [
            'survey' => $survey
        ]);

    }


    //Update data

    public function updateSurvey( UpdateSurveyRequest $request){


        $request->user()->authorizeRoles('admin');
        $mySurvey = $this->findById( $request->input('surveyId') );

        $mySurvey->name = $request->input('nameSurvey');

        $mySurvey->save();

        $survey = session('survey');

        return redirect('/survey/edit/'.$survey->id);


    }

    public function updateSection( CreateSectionRequest $request ){

        $request->user()->authorizeRoles('admin');
        $mySection = Section::where('id', $request->input('sectionId'))->firstOrFail();

        $mySection->name = $request->input('nameSection');

        $mySection->save();

        $survey = session('survey');

        return redirect('/survey/edit/'.$survey->id);

    }

    public function updateQuestion( UpdateQuestionRequest $request ){

        $request->user()->authorizeRoles('admin');
        $myQuestion = Question::where('id', $request->input('questionId'))->firstOrFail();

        $myQuestion->question = $request->input('question');

        $myQuestion->save();

        $survey = session('survey');

        return redirect('/survey/edit/'.$survey->id);
    }

    public function updateAnswer ( CreateAnswerRequest $request ){

        $request->user()->authorizeRoles('admin');
        $myAnswer = Answer::where('id', $request->input('answerId'))->firstOrFail();

        $myAnswer->answer = $request->input('answer');

        $myAnswer->save();

        $survey = session('survey');

        return redirect('/survey/edit/'.$survey->id);

    }

    public function deleteItem( Request $request ){

        $request->user()->authorizeRoles('admin');
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

    public function showFormUsers( $id, Request $request){

       
        $survey = $this->findById($id);

        session()->flash('survey', $survey);
        
        return view( 'surveys.answersUsers', [
            'survey' => $survey,
        ]);
    }

    public function listSurveys(){

        $surveys = Survey::latest()->paginate(4);


        return view('surveys.listSurveysUsers', [

            'surveys' => $surveys,
        ]);
    }


    public function hiddenSurvey( Request $request ){

        $request->user()->authorizeRoles('admin');
        $survey = $this->findById($request->input('surveyId'));

        $survey->visibility = !($survey->visibility);

        $survey->save();
        

        return redirect('/survey/');
    }

    public function sendAnswers( Request $request ){

        $answers = $request->all();
        $Me = $request->user();
                    

//        dd($Me);
        foreach( $answers as $key => $value ){
            
           if( $key != '_token' ){

                if( str_contains( $key, 'abierta') ){

                    $questionId = preg_replace( "/[^0-9]/", "", "$key" );

                   $myAnswer =  Answer::create([
                        'answer' => $value,
                        'question_id' => $questionId,
                    ]);

                    $Me->answers()->attach( $myAnswer->id );
                    
                }
                elseif( ( str_contains( $key, 'Otro' ) ) And  ( isset( $value ) ) ){
                    
                    $questionId = preg_replace( "/[^0-9]/", "", "$key" );

                   $myAnswer = Answer::create([
                        'answer' => $value,
                        'question_id' => $questionId,
                    ]);

                    $Me->answers()->attach( $myAnswer->id );




                }
                else{
                    if( isset( $value ) ){
                        $myAnswer = Answer::where( 'id', $value )->firstOrFail();
                        $Me->answers()->attach( $myAnswer->id );
                    
                    }
                    

                }
           }
        }


        return redirect('/survey');

       
    }

}
