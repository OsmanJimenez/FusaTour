<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;

class CategorysController extends Controller
{
    public function index()
    {
        $categorys = Category::all();

        return view('admin.categorys.index', compact('categorys'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|min:3 |unique:categories']);

        $Category = Category::create([
            'name' => $request->get('name'),
        ]);

        return redirect()->route('admin.categorys.edit', $Category);
    }

    public function edit(Category $Category)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.categorys.edit', compact('categories', 'tags', 'Category'));
    }

    public function update(Category $Category, Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        if ($request->hasFile('urlimg')) {
            $file = $request->file('urlimg');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $name);
        }

        $Category->name = $request->get('name');
        $Category->urlimg = $name;

        $Category->save();

        return redirect()->route('admin.categorys.index', compact('categorys'))->with('flash', 'Tu publicación a sido guardada');
    }

    public function destroy(Category $Category)
    {
        $Category->delete();

        return redirect()
            ->route('admin.categorys.index')
            ->with('flash', 'Tu publicación a sido eliminada');
    }
}
