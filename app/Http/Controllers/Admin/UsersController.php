<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Post;
use Carbon\Carbon;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|min:3 |unique:users']);

        $User = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('admin.users.index', $User)->with('flash', 'Se ha agregado el usuario correctamente');
    }

    public function edit(User $User)
    {
        $categories = User::all();
        $users = User::all();

        return view('admin.users.edit', compact('categories', 'users', 'User'));
    }

    public function update(User $User, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $User->name = $request->get('name');
        $User->email = $request->get('email');
        $User->password = Hash::make($request->get('password'));

        $User->save();

        return redirect()->route('admin.users.index', compact('users'))->with('flash', 'El usuario a sido guardado');
    }

    public function destroy(User $User)
    {
        $User->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('flash', 'El usuario a sido eliminada');
    }
}
