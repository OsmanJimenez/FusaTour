<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {

        return view('welcome', [
            'title' => "Publicaciones de la categoria $category->name",
            'posts' => $category->posts,
            'urlimg' => $category->urlimg
        ]);
    }
}
