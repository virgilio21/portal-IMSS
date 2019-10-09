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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::group(['middleware' => 'auth'], function(){

    Route::get('/survey/list', 'SurveysController@listSurveys');

});

Route::group(['middleware' => 'auth'], function(){

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

    //response answers users
    
    Route::get('/survey/response/{id}', 'SurveysController@showFormUsers');
    Route::post('/survey/hidden/','SurveysController@hiddenSurvey');
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    

    //Users views
    
    
});



