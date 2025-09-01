<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index():View
    {
        //trazendo os posts e os autores da base 
         
        $posts = Post::with('user')->get();
        return view('home',compact('posts'));
    }
}
