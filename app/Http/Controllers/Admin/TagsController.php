<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Post;
use Carbon\Carbon;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('admin.tags.index', compact('tags'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|min:3 |unique:tags']);

        $Tag = Tag::create([
            'name' => $request->get('name'),
        ]);

        return redirect()->route('admin.tags.edit', $Tag);
    }

    public function edit(Tag $Tag)
    {
        $categories = Tag::all();
        $tags = Tag::all();

        return view('admin.tags.edit', compact('categories', 'tags', 'Tag'));
    }

    public function update(Tag $Tag, Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        if ($request->hasFile('urlimg')) {
            $file = $request->file('urlimg');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $name);
        }

        $Tag->name = $request->get('name');
        $Tag->urlimg = $name;

        $Tag->save();

        return redirect()->route('admin.tags.index', compact('tags'))->with('flash', 'La actividad a sido guardada');
    }

    public function destroy(Tag $Tag)
    {
        $Tag->delete();

        return redirect()
            ->route('admin.tags.index')
            ->with('flash', 'La actividad a sido eliminada');
    }
}
