<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\User;
use App\Comment;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        $categories = User::all();
        $users = User::all();
        $tags = Tag::all();
        $comments = Comment::all();

        $ene = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?',['2020-01-01', '2020-01-31']);
        $feb = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?',['2020-02-01', '2020-02-29']);
        $mar = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?',['2020-03-01', '2020-03-31']);
        $abr = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?',['2020-04-01', '2020-04-30']);
        $may = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?',['2020-05-01', '2020-05-31']);
        $jun = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?',['2020-06-01', '2020-06-30']);
        $jul = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?',['2020-07-01', '2020-07-31']);
        $ago = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?',['2020-08-01', '2020-08-31']);
        $sep = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?',['2020-09-01', '2020-09-30']);
        $oct = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?',['2020-10-01', '2020-10-31']);
        $nov = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?',['2020-11-01', '2020-11-30']);
        $dic = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?',['2020-12-01', '2020-12-31']);

        return view('admin.dashboard', compact('posts', 'categories', 'users', 'tags', 'comments', 'ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'));
    }
}
