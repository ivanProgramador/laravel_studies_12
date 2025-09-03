<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MainController extends Controller
{
    public function index():View
    {
        //trazendo os posts e os autores da base 
         
        $posts = Post::with('user')->get();
        return view('home',compact('posts'));
    }

    public function update($id){

        $post= Post::find($id);

        //verificando se o usuario pode editar o post 
        if(Auth::user()->can('update',$post)){

             echo'O usuario pode atualizar o post';
        }else{
             echo'O usuario não pode atualizar o post';
        }
    }

    public function delete($id){

        $post= Post::find($id);
        
        //verificando se o usuario pode deletar o post 
        if(Auth::user()->can('update',$post)){

             echo'O usuario pode deletar o post';
        }else{
             echo'O usuario não pode deletar o post';
        }

    }

    public function create(){

         //verificando se o usuario pode deletar o post 
         //eu tenho que colocar a classe post como segundo parametro 
         //porque eu tenho que avisar que essa politica tambem está ligada aos posts
         //se não ela não vai funcionar como deveria

         // if(Auth::user()->can('create',Post::class)){
         //
        //      echo'O usuario pode criar o post';
       //  }else{
        //      echo'O usuario não pode criar o post';
        // }

        $response = Gate::inspect('create',Post::class);
        if($response->allowed()){
           echo'Usuario pode criar um post';
        }else{

          //fazendo dessa forma ele mostra uma pagina com um visual mais amigavel 
           
           if($response->status()===403){
               abort(403,$response->message());
           }
        }



    }
}
