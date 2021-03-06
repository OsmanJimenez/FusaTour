<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Comment;
use App\Post;

class PostsCommentsController extends Controller
{
    public function create(Request $request, $postId)
    {
        if ($request->hasFile('urlimg')) {
            $file = $request->file('urlimg');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $name);
        }

        $this->validate($request, [
            'comment' => 'required'
        ]);


        $comment = new Comment;
        $post = new Post;

        $comments = Comment::all();

        if ($request->has('urlimg')) {
            $comment->img_comment = $name;
        }

        $comment->text = $request->get('comment'); 
        $comment->point = $request->get('point');
        $comment->post_id = $request->get('id_post');
        $comment->user_id = \Auth::user()->id;

        $comment->save();

        DB::update(
            "UPDATE posts
                SET POINT = (
                    SELECT ROUND(AVG(POINT),1)
                    FROM comments
                    WHERE post_id = ?
                )
                WHERE id = ?",
            [
                $comment->post_id, $comment->post_id
            ]
        );

        return redirect()->route('posts.show', ['post' => $postId]);
    }
}
