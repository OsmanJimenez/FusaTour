<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Post;
use App\Category;
use App\User;
use Carbon\Carbon;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));

    }

/*    public function create()
    {
        $categories = User::all();
        $tags = Tag::all();

        return view('admin.users.create', compact('categories','tags'));

    }
*/



    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|min:3 |unique:categories']);

        $User = User::create([
            'name' => $request->get('name'),      
        ]);

        return redirect()->route('admin.users.edit', $User);
    }

    public function edit(User $User)
    {
        
        $categories = User::all();
        $tags = Tag::all();
    
        return view('admin.users.edit', compact('categories','tags', 'User'));
    }

   
    public function update(User $User ,Request $request)
    {

        $this->validate($request, [
            'name' => 'required'
        ]);
        //return $request->all();
        
        if($request->hasFile('urlimg')){
            $file = $request->file('urlimg');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }

        $User->name = $request->get('name');
        $User->urlimg = $name;

        $User->save();
      
        return redirect()->route('admin.users.index', compact('users'))->with('flash', 'Tu publicación a sido guardada');
    }

    public function destroy(User $User)
    {

        $User->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('flash', 'Este usuario a sido eliminada');
    }



}
