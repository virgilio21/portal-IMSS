<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Session;
class NewController extends Controller
{
    //
    public function showNew(){
        
        return view('admin.new');
    }

    public function create(Request $data){
        $data->user()->authorizeRoles('admin');
        $noticia = new News;
        $noticia -> title = $data -> input ('title');
        $noticia -> link = $data -> input ('link');
        $noticia -> content = $data -> input ('content'); 
        $noticia -> save();   

        Session::flash('mensaje','Se creo una noticia correctamente');
        return redirect('/noticias');
    }
}
