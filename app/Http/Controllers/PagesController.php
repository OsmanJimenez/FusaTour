<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;

use Illuminate\Http\Request;

class PagesController extends Controller
{   //Llamo lo que voy a necesitar mostrar en cada pagina
    public function home()
    {
        $posts = Post::latest('published_at')->get();
        return view('welcome', compact('posts'));
    }

    public function categorias()
    {
        $categories = Category::all();
        return view(' pages.categorias', compact('categories'));
    }

    public function descubrir()
    {
        $posts = Post::latest('point')->get();
        return view(' pages.descubrir', compact('posts'));
    }

    public function actividades()
    {
        $tags = Tag::all();
        return view(' pages.actividades', compact('tags'));
    }

    public function perfil()
    {
        return view(' pages.perfil ');
    }
}
