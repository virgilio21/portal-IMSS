<?php
namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests\CreateQuestionRequest;
use App\Survey;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
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

        $surveyId = decrypt($surveyId);
        $request->user()->authorizeRoles('admin');
        $survey = $this->findById($surveyId);

        session()->flash('survey', $survey);

        return view('surveys.show', [
            'survey' => $survey
        ]);

    }

    public function createSection( CreateSectionRequest $request ){

        $request->user()->authorizeRoles('admin');
        $survey = session('survey');

        Section::create([
            
            'name' => $request->input('nameSection'),
            'survey_id' => $survey->id,
            
        ]);


        return redirect('/survey/'.encrypt($survey->id));
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
                'visibility' => true,
                'question_id' => $myQuestion->id,
            ]);

            Answer::create([
                'answer' => 'Satisfecho',
                'visibility' => true,
                'question_id' => $myQuestion->id,
            ]);

            Answer::create([
                'answer' => 'Ni satisfecho, ni insatisfecho',
                'visibility' => true,
                'question_id' => $myQuestion->id,
            ]);

            Answer::create([
                'answer' => 'Insatisfecho',
                'visibility' => true,
                'question_id' => $myQuestion->id,
            ]);

            Answer::create([
                'answer' => 'Muy insatisfecho',
                'visibility' => true,
                'question_id' => $myQuestion->id,
            ]);
        }

        if( $myQuestion->typeQuestions == "cerradaMasOtro" ){

            Answer::create([

                'answer' => 'Otro',
                'visibility' => true,
                'question_id' => $myQuestion->id,
            ]);
        }

        if ( $myQuestion->typeQuestions == "abierta"){

            Answer::create([
                'answer' => 'Esta es una pregunta abierta',
                'visibility' => true,
                'question_id' => $myQuestion->id,
            ]);
        }

        return redirect('/survey/'.encrypt($survey->id));

        
    }

    public function createAnswer(createAnswerRequest $request){

        $request->user()->authorizeRoles('admin');
        $survey = session('survey');

        Answer::create([
            'answer' => $request->input('answer'),
            'visibility'=> true,
            'question_id' => $request->input('questionId'),
        ]);

        return redirect('/survey/'.encrypt($survey->id));



    }


    private function findById( $surveyId ){

        
        return $survey = Survey::where('id', $surveyId)->firstOrFail();
 
    }

    public function editSurvey( $surveyId , Request $request ){

        $surveyId = decrypt($surveyId);
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

        return redirect('/survey/edit/'.encrypt($survey->id));


    }

    public function updateSection( CreateSectionRequest $request ){

        $request->user()->authorizeRoles('admin');
        $mySection = Section::where('id', $request->input('sectionId'))->firstOrFail();

        $mySection->name = $request->input('nameSection');

        $mySection->save();

        $survey = session('survey');

        return redirect('/survey/edit/'.encrypt($survey->id));

    }

    public function updateQuestion( UpdateQuestionRequest $request ){

        $request->user()->authorizeRoles('admin');
        $myQuestion = Question::where('id', $request->input('questionId'))->firstOrFail();

        $myQuestion->question = $request->input('question');

        $myQuestion->save();

        $survey = session('survey');

        return redirect('/survey/edit/'.encrypt($survey->id));
    }

    public function updateAnswer ( CreateAnswerRequest $request ){

        $request->user()->authorizeRoles('admin');
        $myAnswer = Answer::where('id', $request->input('answerId'))->firstOrFail();

        $myAnswer->answer = $request->input('answer');

        $myAnswer->save();

        $survey = session('survey');

        return redirect('/survey/edit/'.encrypt($survey->id));

    }

    public function deleteItem( Request $request ){

        $request->user()->authorizeRoles('admin');
        $id = $request->input('itemId');
        $type = $request->input('itemType');
        $survey = session('survey');
        if( $type == 'section' ){

            $deleteItem = Section::where('id', $id)->firstOrFail();
            $deleteItem->delete();
            

            return redirect('/survey/edit/'.encrypt($survey->id));

        }
        elseif( $type == 'question' ){
            $deleteItem = Question::where('id', $id)->firstOrFail();
            $deleteItem->delete();
        }
        else{

            $deleteItem = Answer::where('id', $id)->firstOrFail();
            $deleteItem->delete();
        }



        return redirect('/survey/edit/'.encrypt($survey->id));
    }

    public function showFormUsers( $id, Request $request){

       
        $survey = $this->findById($id);

        session()->flash('survey', $survey);
        
        return view( 'surveys.answersUsers', [
            'survey' => $survey,
        ]);
    }

    public function listSurveys( Request $request ){

        $surveys = Survey::all();

        //dd($surveys);
        $me = $request->user();
        
        $surveysClear = $me->surveys;

      
        $encuestas = array();
        $ids = array();

        foreach( $surveys as $survey ){
            
            foreach( $surveysClear as $surveyClear ){
                 
                if( $survey->id == $surveyClear->id ){

                    $ids[$survey->id] = $survey->id; 
                }
                   
            }
            $encuestas[$survey->id] = $survey;  
        }

        
        
        
        foreach( $ids as $id ){

            unset($encuestas[$id]);
        }

        $misEncuestas = array();


        foreach( $encuestas as $encuesta ){

            if( $me->hasRole('user') and (($encuesta->access == 'alumnos') Or ($encuesta->access == 'ambos'))){

                if( $encuesta->visibility == 1){

                    $misEncuestas[] = $encuesta;
                    continue;
                    
                }

            }elseif( $me->hasRole('teacher') and (($encuesta->access == 'maestros') Or ($encuesta->access == 'ambos'))){

                if( $encuesta->visibility == 1){

                    $misEncuestas[] = $encuesta;
                    continue;

                }

            }

        }

        
        $surveysPaginate = $this->paginate( $misEncuestas, 6, null);
        //dd($surveysPaginate);
        return view('surveys.listSurveys', [

            'surveys' => $surveysPaginate,
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
        $survey = session('survey');
        

//      dd($answers);
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
                    
                  //  dd($answers);
                    $questionId = preg_replace( "/[^0-9]/", "", "$key" );

                   $myAnswer = Answer::create([
                        'answer' => $value,
                        'question_id' => $questionId,
                    ]);

                    $myAnswer->count = $myAnswer->count + 1;
                    $myAnswer->save();

                    $Me->answers()->attach( $myAnswer->id );

                }
                elseif( str_contains( $key, 'Otro' ) != true ){
                    
                        $myAnswer = Answer::where( 'id', $value )->firstOrFail();
                        $myAnswer->count = $myAnswer->count + 1;
                        $myAnswer->save();
                        if( $myAnswer->answer != 'Otro' ){
                            $Me->answers()->attach( $myAnswer->id );
                        }
                }
           }
        }


        $Me->surveys()->attach($survey->id,['status'=>true]);
        


        //Redireccion
        if( $Me->hasRole('admin') ){
            return redirect('/survey');
        }
        else{
            session()->flash('mensaje', "Se ha contestado correctamente la encuesta");
            return redirect('/survey/list');
        }
   
    }

    public function viewResults( $surveyId , Request $request ){
       
        //Solo admin esta autorizado
        $request->user()->authorizeRoles('admin');

        //obtengo la encuesta
        $surveyId = decrypt( $surveyId );
        $survey = $this->findById($surveyId);
        
        //***Inicio obtencion de preguntas
        $questions = array();
        foreach( $survey->sections as $section ){
            foreach( $section->questions as $question ){

                if( $question->typeQuestions != 'abierta' )
                    $questions[] = $question;
            }
        }//***Fin de obtencion de preguntas
        

        session()->flash('survey', $survey);

        return view( 'surveys.resultsSurvey', [
            'surveyName' => $survey->name,
            'surveyId' => $survey->id,
            'questions' => $questions,
        ]);   
    }

    public function listUsers( Request $request ){

        $request->user()->authorizeRoles('admin');

        //obtengo la encuesta
        $survey = session('survey');
        session()->flash('survey', $survey);
         //Usuarios que la contestaron
         $users = User::join( 'survey_user', 'survey_user.user_id', '=', 'users.id' )->where('survey_user.status', '=', true)->where('survey_user.survey_id', '=', $survey->id)->get();

      
         $ordenados = $users->sortBy( 'surnames' )->all();

        $mensaje = session('mensaje');
        return view('users.listUsers', [
            'users' => $ordenados
        ]);


    }

    public function viewAnswersUser( $userId, Request $request ){

        $request->user()->authorizeRoles('admin');
        $userId = decrypt( $userId );
        $survey = session('survey');


        $Me = User::where( 'id', $userId )->firstOrFail();

        $respuestas = $Me->answers;

        $meAnswers = array();
        foreach( $survey->sections as  $section ){

            foreach( $section->questions as $question){

                foreach( $question->answers as $answer){

                    foreach( $respuestas as $respuesta ){

                        if( $answer->id == $respuesta->id ){

                            $meAnswers[] = $respuesta;
                            break;
                        }
                    }
                }
            }
        }

       
        
    




        session()->flash('survey', $survey);
        return view( 'users.viewAnswersSurvey' ,[
            'surveyName' => $survey->name,
            'userName' => $Me->surnames.' '.$Me->name,
            'answers' => $meAnswers,
        ]);
    }



    private function paginate($items, $perPage, $page = null){
        $pageName = 'page';
        $page     = $page ?: (Paginator::resolveCurrentPage($pageName) ?: 1);
        $items    = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator(
            $items->forPage($page, $perPage)->values(),
            $items->count(),
            $perPage,
            $page,
            [
                'path'     => Paginator::resolveCurrentPath(),
                'pageName' => $pageName,
            ]
        );
    }
}

