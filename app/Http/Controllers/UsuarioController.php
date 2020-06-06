<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Post;
use Carbon\Carbon;

class UsuarioController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('pages.perfiledit', compact('users'));
    }

    /*    public function create()
    {
        $categories = User::all();
        $users = User::all();

        return view('admin.users.create', compact('categories','users'));

    }
*/


public function update(Request $request)
{
    
    $user = new User;

    $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
    ]);
    //return $request->all();

    $user->user_id = \Auth::user()->id;
    $user->name = $request->get('name');
    $user->email = $request->get('email');
    $user->password = Hash::make($request->get('password'));


    $user->save();

    return redirect()->route('pages.perfil');
}


}
