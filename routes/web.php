<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'], function(){

    Route::get('/survey/list', 'SurveysController@listSurveys');
    

});


Route::get('/', 'IndexController@welcome');
Route::get('/index/profesores', 'IndexController@profesores');
Route::get('/noticia/show/{id}','IndexController@noticia');
Route::get('/noticias/all','IndexController@noticias');
Route::post('/formulario','IndexController@formulario');

Auth::routes();

Route::group(['middleware'=>'auth'],function(){

    //administrador
    Route::get('/home', 'HomeController@index');
    Route::get('/student','StudentController@student');
    Route::get('/usuarios','UserController@showUser');
    Route::post('/usuario/create','UserController@create');
    Route::get('/usuario/{show}/edit','UserController@showUpdateUser');
    Route::PATCH('/user/update/{show}','UserController@update');
    Route::get('/usuario/baja/{id}','UserController@baja');
    Route::get('/usuario/alta/{id}','UserController@alta');


    Route::get('/matters','MatterController@showMatter');
    Route::post('/matter/create','MatterController@create');
    Route::get('/matter/eliminar/{show}','MatterController@eliminarUnRegistro');
    Route::get('/matter/{show}/edit','MatterController@editarUnRegistro');
    Route::PATCH('/matter/update/{show}','MatterController@update');


    Route::get('/grupos', 'GroupController@showGroup');
    Route::post('/group/create','GroupController@create');
    Route::get('/group/eliminar/{show}','GroupController@eliminarUnRegistro');
    Route::get('/group/{show}/edit','GroupController@editarUnRegistro');
    Route::PATCH('/group/update/{show}','GroupController@update');
    Route::post('/fin','GroupController@finDelSemestre');
    Route::get('/crearExcel', 'GroupController@crearExcel');


    Route::get('/alumnos','UserController@showStudents');
    Route::post('alumno','UserController@buscar');
    Route::get('/alumno/cursos/{show}','UserController@showCursosAlumno');
    Route::post('/desmatricular','UserController@desmatricular');
    Route::post('/bajaUsuario','UserController@baja');
    Route::post('/altaUsuario','UserController@alta');
    

    Route::get('/noticias','NewController@showNew');
    Route::post('/noticia/create','NewController@create');
    Route::get('/noticia/eliminar/{show}','NewController@eliminarUnRegistro');
    Route::get('/noticia/{show}/edit','NewController@editarUnRegistro');
    Route::PATCH('/noticia/update/{id}','NewController@update');

    Route::get('/descargar','UserController@descargar');

    //para los 3 rolese
    Route::get('/perfil','UserController@perfil'); //encrypt(Auth::user()->id)
    Route::post('/update/information','UserController@updateInformation');


    //alumnos
    Route::get('/cursos','StudentGroupController@showCourse');
    Route::post('/curso/create','StudentGroupController@create');
    Route::get('/historial','UserController@showRecord');

    
    Route::get('/materias','StudentGroupController@showMatter');
    Route::get('/unidades/{show}','StudentGroupController@showUnit');


    //maestros
    Route::get('/asignaturas','MatterController@showMatterTeacher');
    Route::get('/lista/{show}','StudentGroupController@showList');
   

    Route::get('/unidad/{show}/','UnitController@showUnitTeacher');
    Route::post('/unidad/create','UnitController@create');
    Route::post('/unidades/eliminar/{id}','UnitController@eliminarUnidades');
    Route::get('/editarUnidad/{id}/{name}','UnitController@editarUnidad');
    Route::PATCH('/unidad/update/','UnitController@updateUnidad');

    Route::get('/calificacion/{show}/{show2}','UnitController@subirCalificacion');
    Route::post('/subir','UnitController@actualizar');
    Route::post('/promedio/{id}/{id2}','UnitController@promedioAlumno');




    //VIRGILIO RUTAS
    Route::get('/survey', 'SurveysController@home');
    Route::post('/survey/create', 'SurveysController@create');
    
    Route::get('/survey/{show}', 'SurveysController@show');
    Route::post('/survey/section/create', 'SurveysController@createSection');
    Route::post('/survey/question/create', 'SurveysController@createQuestion');
    Route::post('/survey/answer/create', 'SurveysController@createAnswer');
    Route::get('/survey/edit/{id}', 'SurveysController@editSurvey');


    //Update survey
   
    Route::post('/survey/update/survey', 'SurveysController@updateSurvey');
    Route::post('/survey/update/section', 'SurveysController@updateSection');
    Route::post('/survey/update/question', 'SurveysController@updateQuestion');
    Route::post('/survey/update/answer', 'SurveysController@updateAnswer');

    //remove
    
    Route::post('/survey/remove/item', 'SurveysController@deleteItem');
    Route::post('survey/delete/all', 'SurveysController@deleteSurvey');

    //response answers users
    
    Route::get('/survey/response/{id}', 'SurveysController@showFormUsers');
    Route::post('/survey/hidden/','SurveysController@hiddenSurvey');


    //Logs
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    

    //Capture Answers
    Route::post('/survey/send/answers', 'SurveysController@sendAnswers');


    //View Results
    Route::get('/survey/results/{id}', 'SurveysController@viewResults');

    //Ver alumnos
    Route::get('/users/list', 'SurveysController@listUsers');

    Route::get('/answers/user/{id}', 'SurveysController@viewAnswersUser');
    


});


