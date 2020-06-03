<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class ActividadesController extends Controller
{
    public function show(Tag $tag)
    {

        return view('welcome', [
            'title' => "Actividades relacionadas con:  $tag->name",
            'phrase' => "Que quieres practicar hoy",
            'posts' => $tag->posts,
            'urlimg' => $tag->urlimg
        ]);    }
}
