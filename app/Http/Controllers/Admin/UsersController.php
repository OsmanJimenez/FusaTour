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

        return redirect()->route('admin.users.edit', $User);
    }

    public function edit(User $User)
    {
        
        $categories = User::all();
        $users = User::all();
    
        return view('admin.users.edit', compact('categories','users', 'User'));
    }

   
    public function update(User $User ,Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($User->id)],
        ];

        if ($request->filled('password'))
        {
            $rules['password'] = ['min:6'];
        }

        $data = $request->validate($rules);
    
        $User->update($data);
        return back()->withFlash('Usuario Actualizado');
       
    }

    public function destroy(User $User)
    {


        $User->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('flash', 'Tu publicación a sido eliminada');
    }

}
