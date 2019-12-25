<?php
<<<<<<< HEAD

=======
>>>>>>> landing
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

<<<<<<< HEAD
Route::get('/home', 'HomeController@index')->name('home');
=======
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
    Route::get('/unidades/eliminar/{id}','UnitController@eliminarUnidades');
    Route::get('/editarUnidad/{id}/{name}','UnitController@editarUnidad');
    Route::PATCH('/unidad/update/','UnitController@updateUnidad');

    Route::get('/calificacion/{show}/{show2}','UnitController@subirCalificacion');
    Route::post('/subir','UnitController@actualizar');
    Route::get('/promedio/{id}/{id2}','UnitController@promedioAlumno');


});


>>>>>>> landing
