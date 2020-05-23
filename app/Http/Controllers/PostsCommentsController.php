<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class PostsCommentsController extends Controller
{
    public function create(Request $request, $postId)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);
        
       $comment = new Comment;

        $comment->text = $request->get('comment');
        $comment->point =$request->get('point');
        $comment->post_id = $request->get('id_post');
        $comment->user_id = \Auth::user()->id;
        

        $comment->save(); 

        return redirect()->route('posts.show', ['post' => $postId] );
    }

    

}
