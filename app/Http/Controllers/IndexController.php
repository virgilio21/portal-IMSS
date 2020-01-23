<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class IndexController extends Controller
{
    //
    public function welcome(){
        $noticias = News::latest()->paginate(3);
        return view('welcome',['noticias'=>$noticias]);
    }

    public function profesores(){
        return view('profesores');
    }

    public function noticia($id){
        $noticia = News::find($id);
        $resultado = htmlentities($noticia->content);
        //dd($resultado);
        return view('showNew',['noticia'=>$noticia,'resultado'=>$resultado]);
    }

    public function noticias(){
        $noticias = News::latest()->paginate(3);
        return view('allNews',['noticias'=>$noticias]);
    }

    public function formulario(Request $data){
        $destino="Myrna.gamboa@imss.gob.mx";
        $name = $data -> input('fullName');
        $email = $data -> input('email');
        $help = $data -> input('help');
        $contenido="Nombre: ".$name."\nCorreo: ".$email."\nMensaje: ".$help;
        mail($destino,"Contacto", $contenido);

        return redirect('/');
    }

}
