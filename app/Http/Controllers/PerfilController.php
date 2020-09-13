<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function show(User $user)
    {
        return view('pages.perfiluser', compact('user'));
    }
}