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
    public function showUnitTeacher($grupo){
        //$al = User::find($alumno);
        $gr = Group::find($grupo);
        $unidades = Unit::where('matter_user_id',$grupo)->distinct()->get(['name_unit','matter_user_id']);
        //$unidades = Unit::all();
        //dd($unidades);
        return view('unit',['grupo' => $gr, 'unidades'=>$unidades]);
    }

    //agregar unidad a todos los alumnos
    public function create(Request $data){
        $grupo =  $data -> input('id_grupo');
        //$alumno = $data -> input('id_alumno');
       
        $alumnos = StudentGroup::all();
        $gr = Group::find($grupo);
        foreach ($alumnos as $key) {
            if($gr -> id == $key -> matter_user_id){
                $unidad = new Unit();
                $unidad -> name_unit = $data -> input('name_unit');
                $unidad -> qualification = 0.0;
                $unidad -> matter_user_id = $data -> input('id_grupo');
                $unidad -> user_id = $key -> user_id;//$data -> input('id_alumno');
                $unidad -> visibility = true;
                $unidad -> save();

                Session::flash('mensaje','Se creo una unidad correctamente');
                
            }
            
        }
        
        return redirect('unidad/'.$grupo);
    }


    //ir a la vista editar unidades
    public function editarUnidad(Request $request, $id, $name){
       
        $grupo = Group::find($id);
       
       return view('unit')->with(['edit' => true, 'grupo'=>$grupo,'name_unit'=>$name,'unidad','id'=>$id]);//, 'unidad'=>$unidad]);
    }


     //editar unidades
     public function updateUnidad(Request $data){
         $name_anterior = $data -> input('unit');
         $id_grupo = $data -> input('id_grupo');
         $name_nuevo = $data -> input('name_unit');

         $unidad = Unit::where('matter_user_id',$id_grupo)->get();

     
         foreach ($unidad as $key) {
            if ($key->name_unit == $name_anterior) {
                
                $actualizar = Unit::find($key->id);
                $actualizar -> name_unit = $name_nuevo;
                $actualizar -> save();
            }
         }  
         return redirect('/unidad'.'/'.$id_grupo);
     }


    //eliminar todas las unidades
    public function eliminarUnidades($id){
        $unidades = Unit::where('matter_user_id',$id)->get();
        
        foreach ($unidades as $key => $value) {
            # code...
            $value->delete();
        }

        return redirect('/unidad'.'/'.$id);
    }



    //subir calificacion
    public function subirCalificacion($g,$a){
        $alumno = User::find($a);
        $grupo = Group::find($g);
        $unidades = Unit::all();
        $alumnos = StudentGroup::all();
        foreach ($alumnos as $key) {
            if($grupo -> id == $key -> matter_user_id and $alumno->id==$key->user_id){
                $calificacion = $key -> final_qualification;
            }
        }

        return view('StudentQualification',['alumno'=>$alumno,'grupo'=>$grupo,'unidades'=>$unidades,'promedio'=>$calificacion]);
    }


    //actualizar calificacion
    public function actualizar(Request $data){
        $id_unidad = $data -> input('id_unidad');
        $unidad = Unit::find($id_unidad);
        $unidad -> qualification = $data -> input('calification');
        $unidad -> save();
        Session::flash('mensaje','Se inserto una calificación correctamente ');
        return redirect('calificacion/'.$unidad->matter_user_id.'/'.$unidad->user_id);
    }


    //sacar promedio final
    public function promedioAlumno($al, $gr){
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
        return redirect('calificacion/'.$gr.'/'.$al);
    }





     //*******************************************************alumno


     
   
}
