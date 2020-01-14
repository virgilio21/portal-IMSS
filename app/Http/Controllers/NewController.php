<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Session;
class NewController extends Controller
{
    //ADMINISTRADOR
    public function showNew(Request $data){
        $data->user()->authorizeRoles('admin');
        $noticias = News::all();
        return view('admin.new',['noticias'=> $noticias]);
    }

    public function create(Request $data){
        $data->user()->authorizeRoles('admin');
        $noticia = new News;
        $noticia -> title = $data -> input ('title');
        $noticia -> link = $data -> input ('link');
        $noticia -> content = $data -> input ('content'); 
        $noticia -> save();   

        Session::flash('mensaje','SE CREO UNA NOTICIA CORRECTAMENTE');
        return redirect('/noticias');
    }



     //Eliminar un registro (ocultar el registro)
     public function eliminarUnRegistro(Request $request ,$id){
        $request->user()->authorizeRoles('admin');
        $noticia = News::find($id);
        $noticia -> delete();
        Session::flash('mensaje','SE ELIMINO UNA NOTICIA CORRECTAMENTE');
        return redirect('/noticias');
    }


    //ir a la vista editar
    public function editarUnRegistro(Request $request,$id){
        $request->user()->authorizeRoles('admin');
        $noticia = News::find(decrypt($id));
        return view('admin.new')->with(['edit' => true, 'noticia' => $noticia]);

    }

    //actualizar un grupo
    public function update(Request $data, $id){
        $data->user()->authorizeRoles('admin');
        $noticia = News::find($id);
        $noticia -> title = $data -> title;
        $noticia -> link = $data -> link;
        $noticia -> content = $data -> content;
        $noticia -> save();
        Session::flash('mensaje','SE ACTUALIZO UNA NOTICIA CORRECTAMENTE');
        return redirect('/noticias');
    }
}
