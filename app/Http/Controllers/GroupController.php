<?php

namespace App\Http\Controllers;
use App\User;
use App\Matter;
use App\Group;
use Illuminate\Http\Request;
use Session;
use Excel;

class GroupController extends Controller
{
    //ADMINISTRADOR

    //ver vista grupos 
    public function showGroup(Request $data){
        $data->user()->authorizeRoles('admin');
        $materias = Matter::orderBy('semester','ASC')->get();
        $maestros = User::orderBy('id','ASC')->get();
        $grupos = Group::orderBy('id','ASC')->get();
        $data->session()->forget('alumno');
        return view('Group',['materias' => $materias, 'maestros' => $maestros, 'grupos' => $grupos]);
    }

    //crear un grupo
    public function create(Request $data){
        $data->user()->authorizeRoles('admin');
        $group = new Group;
        $group -> description = $data -> input ('description2');
        $group -> group = $data -> input ('group');
        $group -> matter_id = $data -> input('matter');
        $group -> user_id = $data -> input('teacher');
        $group -> visibility = true;
        $group -> save();
      
        Session::flash('mensaje','Se creo un grupo correctamente');
        return redirect('/grupos');

    }

    //Eliminar un registro (ocultar el registro)
    public function eliminarUnRegistro(Request $request ,$id){
        $request->user()->authorizeRoles('admin');
        $grupo = Group::find($id);
        $grupo -> visibility = false;
        $grupo -> save();
        return redirect('/grupos');
    }


    //ir a la vista editar
    public function editarUnRegistro(Request $request,$id){
        $request->user()->authorizeRoles('admin');
        $group = Group::find($id);
        $maestros = User::orderBy('id','ASC')->get();
        $materias = Matter::all();
        return view('group')->with(['edit' => true, 'gro' => $group, 'maestros' => $maestros, 'materias' => $materias]);

    }

    //actualizar un grupo
    public function update(Request $data, $id){
        $data->user()->authorizeRoles('admin');
        $grupo = Group::find($id);
        $grupo -> matter_id = $data -> matter;
        $grupo -> user_id = $data -> teacher;
        $grupo -> description = $data -> description2;
        $grupo -> group = $data -> group;
        $grupo -> save();
        Session::flash('mensaje','Se actualizo un grupo correctamente');
        return redirect('/grupos');
    }


    //finalizar el semestre
    public function finDelSemestre(Request $data){
        $data->user()->authorizeRoles('admin');
        $cursos = Group::all();
        foreach ($cursos as $key => $value) {
            $value -> visibility = 0;
            $value -> save();
        }

        $alumnos = User::all();
        foreach ($alumnos as $key => $value) {

            if($value->hasRole('user') and $value->semester==8){
                $value -> visibility= 0;
                $value -> semester = null;
                $value -> save();
            }

            if($value->hasRole('user') and $value->visibility==1){
                $value -> semester += 1;
                $value -> save();
            }
        }

        return redirect('/grupos');
    }
    

    //crear excel
    public function crearExcel(){
        Excel::create('clients',function($excel)
        {
            $excel->sheet('clients', function($sheet)
            {
                $sheet->loadView('group');
            });
        })->export('xlsx');
    }


   
}
