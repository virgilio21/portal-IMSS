<?php

namespace App\Http\Controllers;
use App\Group;
use App\StudentGroup;
use App\User;
use App\Matter;
use App\Unit;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{

    //******************************************************************************************
    //                                        ALUMNO
    //******************************************************************************************
    
     //VISTA CURSOS
     public function showCourse(){
  
        $cursos = Group::orderBy('id','ASC')->get();
        return view('courseStudent',['cursos' => $cursos]);
       
    }


    //insertar un regustro al gupo_alumno
    public function create(Request $data){

        $grupo_alumno = new StudentGroup;
        $grupo_alumno -> user_id = $data -> input('id_student');
        $grupo_alumno -> matter_user_id = $data -> input('id_group');
        $grupo_alumno -> final_qualification = 0.0;
        $grupo_alumno -> save();

        return redirect('/cursos');
       
    }

    ///vista materias del alumno
    public function showMatter(){
        $alumnos = User::all();
        return view('matterStudent',['alumno' => $alumnos]);
    }


    
    //vista unidades alumno
    public function showUnit($id_grupo){
       $alumno = auth()->user()->id;
       $grupo = Group::find($id_grupo);
       $unidades = Unit::all();
       $prom = StudentGroup::where(['matter_user_id'=>$id_grupo,'user_id'=>$alumno])->first();
       return view('studentUnit',['grupo' => $grupo,'unidades'=> $unidades,'prom'=>$prom]);
    }









    //****************************************TEACHER */

    public function showList($id){
        $grupo = Group::find($id);
        $alumnosGrupo = StudentGroup::all();
        return view ('studentList',['grupo' => $grupo, 'alumnosGrupo' => $alumnosGrupo]);
    }

}
