<?php

namespace App\Http\Controllers;
use App\Matter;
use App\User;
use App\Group;
use App\Http\Requests\CreateRequestMatter;
use Illuminate\Http\Request;
use Session;

class MatterController extends Controller
{

    //******************************************************************************************
     //                                        ADMINISTRADOR
     //******************************************************************************************
    

    //retornar vista materia
    public function showMatter(Request $request){

        $request->user()->authorizeRoles('admin');
        $materias = Matter::orderBy('semester','ASC')->get();
        $users = User::orderBy('id','ASC')->get();
        $request->session()->forget('alumno');
        return view('matter')->with(['materias' => $materias,'users' => $users]);
    }

    //INSERTAR MATERIA
    public function create(Request $data){
        $data->user()->authorizeRoles('admin');
        $materia = new Matter;
        $materia -> name_matter = $data -> input ('name_matter');
        $materia -> key_matter = $data -> input ('key_matter');
        $materia -> number_hours = $data -> input('number_hours');
        $materia -> number_credits = $data -> input('number_credits');
        $materia -> semester = $data -> input('semester');
        $materia -> visibility = true;
        $materia -> save();
        Session::flash('mensaje','Se creo una materia correctamente');
        return redirect('/matters');

    }

    //Eliminar un registro (ocultar el registro)
    public function eliminarUnRegistro(Request $request ,$id){
        $request->user()->authorizeRoles('admin');
        $materia = Matter::find($id);
        $materia -> visibility = false;
        $materia -> save();
        return redirect('/matters');
    }


    //ir a la vista editar
    public function editarUnRegistro(Request $request,$id){
        $request->user()->authorizeRoles('admin');
        $materia = Matter::find($id);
        return view('matter')->with(['edit' => true, 'mate' => $materia]);

    }

    //actualizar el registro
    public function update(Request $data, $id){
        $data->user()->authorizeRoles('admin');
        $mater = Matter::find($id);
        $mater -> name_matter = $data -> name_matter;
        $mater -> key_matter = $data -> key_matter;
        $mater -> number_hours = $data -> number_hours;
        $mater -> number_credits = $data -> number_credits;
        $mater -> semester = $data -> semester;
        $mater -> save();
        Session::flash('mensaje','Se actualizo una materia correctamente');
        return redirect('/matters');
     }






    
     ///********************************************************TEACHER */

     public function showMatterTeacher(Request $data){
        $data -> user()->authorizeRoles('teacher');
        $grupos = Group::all();
        return view('matterTeacher',['grupos' => $grupos]);
       
     }
    
}