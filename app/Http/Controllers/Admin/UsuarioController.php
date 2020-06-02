<?php

namespace App\Http\Controllers\Admin;

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

        return view('admin.users.index', compact('users'));
    }

    /*    public function create()
    {
        $categories = User::all();
        $users = User::all();

        return view('admin.users.create', compact('categories','users'));

    }
*/



    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|min:3 |unique:users']);

        $User = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('pages.perfil', $User);
    }

    public function edit(User $User)
    {

        $categories = User::all();
        $users = User::all();

        return view('pages.perfil', compact('categories', 'users', 'User'));
    }


    public function update(User $User, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        //return $request->all();


        $User->name = $request->get('name');
        $User->email = $request->get('email');
        $User->password = Hash::make($request->get('password'));

        $User->save();

        return redirect()->route('pages.perfil', compact('users'))->with('flash', 'Tu perfil a sido actualizado');
    }

    public function destroy(User $User)
    {


        $User->delete();

        return redirect()
            ->route('pages.perfil')
            ->with('flash', 'Tu publicación a sido eliminada');
    }
}
