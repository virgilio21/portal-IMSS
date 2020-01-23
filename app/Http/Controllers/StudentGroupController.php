<?php

namespace App\Http\Controllers;
use App\Group;
use App\StudentGroup;
use App\User;
use App\Matter;
use App\Unit;
use Illuminate\Http\Request;
use Session;

class StudentGroupController extends Controller
{

    //******************************************************************************************
    //                                        ALUMNO
    //******************************************************************************************
    
     //VISTA CURSOS
     public function showCourse(Request $data){
        $data->user()->authorizeRoles('user');
        $cursos = Group::where('visibility','=','1')->get();
        return view('user.courseStudent',['cursos' => $cursos]);
       
    }


    //insertar un regustro al gupo_alumno
    public function create(Request $data){

        $data->user()->authorizeRoles('user');


        $alumno = auth()->user();
        $visibles = [];
        foreach ($alumno -> groups as $grupo) {
            # code...
            if ($grupo -> visibility == 1) {
                # code...
                $visibles[] = $grupo;
            }
        }
        
        if (count($visibles)) {
            # code...
            foreach ($visibles as $item) {
                # code...
                if ($item->matter->name_matter == $data -> input('materia')) {
                    # code...
                    Session::flash('error','ERROR, YA TIENES CARGADA ESA MATERIA');
                }
            }

        }else{

            $grupo_alumno = new StudentGroup;
            $grupo_alumno -> user_id = $data -> input('id_student');
            $grupo_alumno -> matter_user_id = $data -> input('id_group');
            $grupo_alumno -> final_qualification = null;
            $grupo_alumno -> save();
            Session::flash('mensaje','CARGASTE UN GRUPO CORRECTAMENTE');
        }
        
        
        return redirect('/cursos');
       
    }

    ///vista materias del alumno
    public function showMatter(Request $data){
        $data->user()->authorizeRoles('user');
        $alumno = auth()->user();
        $visibles = [];
        foreach ($alumno -> groups as $grupo) {
            # code...
            if ($grupo -> visibility == 1) {
                # code...
                $visibles[] = $grupo;
            }
        }

        return view('user.matterStudent', ['grupo'=>$visibles]);
    }


    
    //vista unidades alumno
    public function showUnit(Request $data, $id_grupo){
    
       $data->user()->authorizeRoles('user');
       $alumno = auth()->user()->id;
       $grupo = Group::find($id_grupo);
       //$item -> user_id == Auth::user() -> id and $item->matter_user_id == $grupo -> id
       $unidades = Unit::all();
       $unidadesAlumno = [];
       foreach ($unidades as $item) {
           # code...
           if ($item -> user_id == auth()->user()-> id and $item->matter_user_id == $grupo -> id) {
               # code...
                $unidadesAlumno[] = $item;
           }
       }

       $prom = StudentGroup::where(['matter_user_id'=>$id_grupo,'user_id'=>$alumno])->first();
       return view('user.studentUnit',['grupo' => $grupo,'unidades'=> $unidadesAlumno,'prom'=>$prom]);
    }









    //****************************************TEACHER */

    public function showList(Request $data ,$id){
        $data->user()->authorizeRoles('teacher');
        $grupo = Group::find(decrypt($id));
        $alumnosGrupo = StudentGroup::all();
        return view ('teacher.studentList',['grupo' => $grupo, 'alumnosGrupo' => $alumnosGrupo]);
    }

}
