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

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|min:3 |unique:users']);

        $User = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('admin.users.edit', $User);
    }

    public function edit(User $User)
    {
        $categories = User::all();
        $users = User::all();

        return view('admin.users.edit', compact('categories', 'users', 'User'));
    }


    public function editarperfil(User $User, Request $request)
    {
        if ($request->hasFile('urlimg')) {
            $file = $request->file('urlimg');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $name);
        }

        $User->id = \Auth::user()->id;
        $User->avatar = $name;
        $User->name = $request->get('name');
        $User->email = $request->get('email');
        $User->password = Hash::make($request->get('password'));
        $User->description = $request->get('description');

        $User->save();

        return redirect()
            ->route('pages.perfil')
            ->with('flash', 'Tu publicación a sido guardada');
    }

    public function destroy(User $User)
    {
        $User->delete();

        return redirect()
            ->route('pages.perfil')
            ->with('flash', 'Tu publicación a sido eliminada');
    }
}
