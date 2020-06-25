<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /*    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories','tags'));

    }
*/



    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required|min:3 |unique:posts']);

        $post = Post::create([
            'title' => $request->get('title'),
            'url' => str_slug($request->get('title')),
        ]);

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {

        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('categories', 'tags', 'post'));
    }


    public function update(Post $post, Request $request)
    {

        $this->validate($request, [
            'title' => 'required'
        ]);
        //return $request->all();

        if ($request->hasFile('urlimg')) {
            $file = $request->file('urlimg');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $name);
        }
        if ($request->filled('vrimg_1')) {
            if ($request->hasFile('vrimg_1')) {
                $file = $request->file('vrimg_1');
                $name_1 = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/', $name_1);
                $post->vrimg_1 = $name_1;
            }
        }
        if ($request->filled('vrimg_2')) {
            if ($request->hasFile('vrimg_2')) {
                $file = $request->file('vrimg_2');
                $name_2 = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/', $name_2);
                $post->vrimg_2 = $name_2;
            }
        }
        if ($request->filled('vrimg_3')) {
            if ($request->hasFile('vrimg_3')) {
                $file = $request->file('vrimg_3');
                $name_3 = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/', $name_3);
                $post->vrimg_3 = $name_3;
            }
        }

        if ($request->filled('vrimg_4')) {
            if ($request->hasFile('vrimg_4')) {
                $file = $request->file('vrimg_4');
                $name_4 = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/', $name_4);
                $post->vrimg_4 = $name_4;
            }
        }

        if ($request->filled('vrimg_5')) {
            if ($request->hasFile('vrimg_5')) {
                $file = $request->file('vrimg_5');
                $name_5 = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/', $name_5);
                $post->vrimg_5 = $name_5;
            }
        }

        $post->title = $request->get('title');
        $post->url = str_slug($request->get('title'));
        $post->body = $request->get('body');
        $post->urlimg = $name;
        $post->published_at = Carbon::parse($request->get('published_at'));
        $post->category_id = $request->get('category');
        $post->excerpt = $request->get('excerpt');


        $post->ubicacion = $request->get('ubicacion');
        $post->save();

        $post->tags()->sync($request->get('tags'));
        return redirect()->route('admin.posts.index', compact('posts'))->with('flash', 'Tu publicación a sido guardada');
    }

    public function destroy(Post $post)
    {

        $post->tags()->detach();

        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->with('flash', 'Tu publicación a sido eliminada');
    }
}
