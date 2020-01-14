<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\StudentGroup;
use App\Group;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Exports\GroupsExport;
use Redirect;

class UserController extends Controller
{
    //*******************************************ADMINISTADROR */


    //insertar un usuario
    protected function create(Request $data)
    {
        $data -> user()->authorizeRoles('admin');
        $rol = $data['rol'];
        $email = User::where('email','=',$data -> input ('email'))->get();
        $matricula = User::where('enrollment','=',$data -> input ('enrollment'))->get();
      
        
                    $user = new User;
                    $user -> name= $data -> input ('name');
                    $user -> email = $data -> input ('email');
                    $user -> password = Hash::make($data -> input('enrollment'));
                    $user -> surnames = $data -> input('surname');
                    $user -> enrollment = $data -> input('enrollment');
                    $user -> address = "";
                    $user -> phone = "";
                        if ($rol=='user') {
                            $user -> semester = 1;
                        }
                    $user -> visibility = true;
                    $user -> save();
                    $user -> Roles() -> attach(Role::where('name',$rol)->first());
                    Session::flash('mensaje','SE INSERTO UN USUARIO CORRECTAMENTE');
                    return redirect('/usuarios');
                    

    }

    //ver vista User
    public function showUser(Request $data){
        $data -> user()->authorizeRoles('admin');
        $users = User::all();
        $data->session()->forget('alumno');
        return view ('admin.user',['users'=>$users]);
    }

    //ver vista actualizar USer
    public function showUpdateUser(Request $data, $id){
        $data -> user()->authorizeRoles('admin');
        $user = User::find( decrypt($id));
        return view('admin.user')->with(['edit' => true, 'user' => $user]);
    }

    //actualizar USer
    public function update(Request $data, $id){
        $data -> user()->authorizeRoles('admin');

        $rol = $data['rol'];

        $email = User::where('email','=',$data -> input ('email'))->get();
        $matricula = User::where('enrollment','=',$data -> input ('enrollment'))->get();
      
        if (count($email) and count($matricula)) {
            # code...
            Session::flash('error','LA MATRICULA Y EL EMAIL YA SON EXISTENTES A ALGUN USUARIO REGISTRADO.');
            return redirect('/usuarios');


        }else{

            if (count($email)) {
                # code...
                Session::flash('error','EL EMAIL YA EXISTE A ALGUN USUARIO REGISTRADO.');
                return redirect('/usuarios');
    
            }else{
                if (count($matricula)) {
                    # code...
                    Session::flash('error','LA MATRICULA YA EXISTE A ALGUN USUARIO REGISTRADO.');
                    return redirect('/usuarios');

                }else{

                    $user = User::find($id);
                    $user -> name = $data -> name;
                    $user -> surnames = $data -> surname;
                    $user -> enrollment = $data -> enrollment;
                    $user -> email = $data -> email;
                    $user -> password = Hash::make($data -> enrollment);

                    if ($rol=='user') {
                        $user -> semester = 1;
                    }
                    if ($rol=='teacher' or $rol=='admin') {
                        $user -> semester = null;
                    }

                    $user -> save();
                    $user->Roles()->detach();
                    $user -> Roles() -> attach(Role::where('name',$rol)->first());
                    Session::flash('mensaje','SE ACTUALIZO UN USUARIO CORRECTAMENTE');
                    return redirect('/usuarios');

                }
            }
        }
        

    }





    //ver vista alumnos
    public function showStudents(Request $data){
        $data -> user()->authorizeRoles('admin');
        $alumnito = $data->session()->get('alumno');
        return view ('admin.student',['alumno'=>$alumnito]);
    }

    //buscar alumno
    public function buscar(Request $data){
        $data -> user()->authorizeRoles('admin');
        $buscar = $data -> matricula;
        $alumno = User::where('enrollment','=',$buscar)->first();
        $alumnito = session(['alumno' => $alumno]);
        return redirect('/alumnos');
        //return view ('student',['alumno'=> $alumno]);
    }

    //ver curso alumnos
    public function showCursosAlumno(Request $data, $id_alumno){
        $data -> user()->authorizeRoles('admin');
        $alumno = User::find($id_alumno);
        $cursos = [];
        foreach ($alumno -> groups as $curso) {
            # code...
            if ($curso->visibility == 1) {
                # code...
                $cursos[] = $curso;
            }
        }


        return view ('admin.groupStudent',['alumno'=>$alumno, 'cursos' => $cursos]);
    }

    //desmatricular de algun curso
    public function desmatricular(Request $data){
        $data -> user()->authorizeRoles('admin');
        $grupo = $data['id_group'];
        $alumno = $data['id_student'];
        $g = Group::find($grupo);
        $a = User::find($alumno);
        $a -> groups() -> detach($g);
        //dd($grupo, $alumno);
   
        return redirect ('alumno/cursos/'.$alumno);
    }

    //baja usuario
    public function baja(Request $data){
        $data -> user()->authorizeRoles('admin');
        $id = $data -> baja2;
        $user = User::find($id);
        $user -> visibility = 0;
        if ($user -> hasRole('user')){
            foreach ($user -> groups as $key => $value){
                if ($value->visibility==1) {
                    $user -> groups() ->detach($value);
                }
            }
            
        }

        if ($user -> hasRole('teacher')){
            $grupo = Group::where('user_id',$user -> id)->get();
            foreach ($grupo as $key => $value){    
                # code...
                if ($value->visibility==1) {
                    $value -> delete();
                }
            }
        }

        $user -> save();
        $data->session()->forget('alumno');
        Session::flash('mensaje','EL USUARIO HA SIDO DADO DE BAJA TEMPORAL');
        return redirect('/alumnos');
    }

    //alta usuario
    public function alta(Request $data){
        $data -> user()->authorizeRoles('admin');
        $id = $data -> alta2;
        $user = User::find($id);
        $user -> visibility = 1; 
        $user -> save();
        $data->session()->forget('alumno');
        Session::flash('mensaje','EL USUARIO HA SIDO DADO DE ALTA');
        return redirect('/alumnos');
    }











    //******************************* para los 3 roles ***************//

    //ver perfil
    public function perfil(){
        //$alumno = decrypt($id);
        return view ('personalInformation');
    }

    //actualizar informacion
    public function updateInformation(Request $data){
        $user = Auth::user();
        $user -> email = $data -> email;
        $user -> address = $data -> address;
        $user -> phone = $data -> phone;
        $user -> save();
        Session::flash('mensaje','SE ACTUALIZO TUS DATOS CORRECTAMENTE');
        return redirect('/perfil');
    }










    //********************************************Alumno***************************//
    public function showRecord(Request $data){
        $data -> user()->authorizeRoles('user');
        $grupoAlumno = StudentGroup::all();
        return view('user.academicRecord',['grupoAlumno'=>$grupoAlumno]);
    }

    public function descargar(){
       
        $item= User::all();
        $a = [];
        
        return (new GroupsExport($item))->download('products.xlsx', \Maatwebsite\Excel\Excel::XLSX);

    }


}
