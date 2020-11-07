<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;

class ConfiguracionController extends Controller
{
    public function index()
    {
        return view('admin.configuracion.index');
    }

}
