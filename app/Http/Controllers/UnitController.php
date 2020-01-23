<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matter;
use App\Unit;
use App\User;
use App\Group;
use App\StudentGroup;
use Session;

class UnitController extends Controller
{

    //*******************************************************Teacher

    //ver pagina unidad
    public function showUnitTeacher(Request $data, $grupo){
        //$al = User::find($alumno);
        $data -> user()->authorizeRoles('teacher');
        $gr = Group::find(decrypt($grupo));
        $unidades = Unit::where('matter_user_id',decrypt($grupo))->distinct()->get(['name_unit','matter_user_id']);
        //$unidades = Unit::all();
        //dd($unidades);
        return view('teacher.unit',['grupo' => $gr, 'unidades'=>$unidades]);
    }

    //agregar unidad a todos los alumnos
    public function create(Request $data){
        $data -> user()->authorizeRoles('teacher');
        $grupo =  $data -> input('id_grupo');
        //$alumno = $data -> input('id_alumno');
       
        $alumnos = StudentGroup::all();
        $gr = Group::find($grupo);
        foreach ($alumnos as $key) {
            if($gr -> id == $key -> matter_user_id){
                $unidad = new Unit();
                $unidad -> name_unit = $data -> input('name_unit');
                $unidad -> qualification = null;
                $unidad -> matter_user_id = $data -> input('id_grupo');
                $unidad -> user_id = $key -> user_id;//$data -> input('id_alumno');
                $unidad -> visibility = true;
                $unidad -> save();

                Session::flash('mensaje','SE CREO UNA UNIDAD CORRECTAMENTE');
                
            }else{
                Session::flash('error','NO TIENES NINGÚN ALUMNO REGISTRADO AL GRUPO');
            }
            
        }
        
        return redirect('unidad/'.encrypt($grupo));
    }


    //ir a la vista editar unidades
    public function editarUnidad(Request $data, $id, $name){
        $data -> user()->authorizeRoles('teacher');
        $idN = decrypt($id);
        $nameN = decrypt($name);
        $grupo = Group::find($idN);
        
       return view('teacher.unit')->with(['edit' => true, 'grupo'=>$grupo,'name_unit'=>$nameN,'unidad','id'=>$idN]);//, 'unidad'=>$unidad]);
    }


     //editar unidades
     public function updateUnidad(Request $data){
         $data -> user()->authorizeRoles('teacher');
         $name_anterior = $data -> input('unit');
         $id_grupo = $data -> input('id_grupo');
         $name_nuevo = $data -> input('name_unit');

         $unidad = Unit::where('matter_user_id',$id_grupo)->get();

     
         foreach ($unidad as $key) {
            if ($key->name_unit == $name_anterior) {
                
                $actualizar = Unit::find($key->id);
                $actualizar -> name_unit = $name_nuevo;
                $actualizar -> save();
                Session::flash('mensaje','SE ACTUALIZO UNA UNIDAD CORRECTAMENTE');
            }
         }  
         return redirect('/unidad'.'/'.encrypt($id_grupo));
     }


    //eliminar todas las unidades
    public function eliminarUnidades(Request $data, $id){
        $data -> user()->authorizeRoles('teacher');
        $unidades = Unit::where('matter_user_id',$id)->get();
        
        foreach ($unidades as $key => $value) {
            # code...
            $value->delete();
        }
        Session::flash('mensaje','SE ELIMINO TODAS LAS UNIDADES');
        return redirect('/unidad'.'/'.encrypt($id));
    }



    //vista para subir calificacion al alumno
    public function subirCalificacion(Request $data, $g,$a){
        $data -> user()->authorizeRoles('teacher');
        $alumno = User::find(decrypt($a));
        $grupo = Group::find(decrypt($g));
        $unidades = Unit::all();
        $alumnos = StudentGroup::all();
        foreach ($alumnos as $key) {
            if($grupo -> id == $key -> matter_user_id and $alumno->id==$key->user_id){
                $calificacion = $key -> final_qualification;
            }
        }

        return view('teacher.StudentQualification',['alumno'=>$alumno,'grupo'=>$grupo,'unidades'=>$unidades,'promedio'=>$calificacion]);
    }


    //actualizar calificacion
    public function actualizar(Request $data){
        $data -> user()->authorizeRoles('teacher');
        $id_unidad = $data -> input('id_unidad');
        $unidad = Unit::find($id_unidad);
        $unidad -> qualification = $data -> input('calification');
        $unidad -> save();
        Session::flash('mensaje','SE INSERTO UNA CALIFICACIÓN CORRECTAMENTE');
        return redirect('calificacion/'.encrypt($unidad->matter_user_id).'/'.encrypt($unidad->user_id));
    }


    //sacar promedio final
    public function promedioAlumno(Request $data, $al, $gr){
        $data -> user()->authorizeRoles('teacher');
        $unidades = Unit::all();
        $promedio = 0;
        $suma = 0;
        $cuantos = 0;
        foreach ($unidades as $key => $value) {
            if($value->matter_user_id==$gr and $value->user_id==$al){
                $cuantos += count([$value->qualification]);
                $suma += $value->qualification;
                $promedio = $suma / $cuantos;
                
            }
        }
        
        $subir = StudentGroup::where(['matter_user_id'=>$gr,'user_id'=>$al])->update(['final_qualification'=>round($promedio,2)]);
        return redirect('calificacion/'.encrypt($gr).'/'.encrypt($al));
    }





     //*******************************************************alumno


     
   
}
