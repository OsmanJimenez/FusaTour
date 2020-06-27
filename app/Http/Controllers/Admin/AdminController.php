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
        $posts = Post::latest('point')->get();
        $categories = User::all();
        $users = User::all();
        $tags = Tag::all();
        $comments = Comment::latest('updated_at')->get();

        /*====================================================||
        || Variables of graph of number of comments per month ||
        ||====================================================*/

        $ene = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?', ['2020-01-01', '2020-01-31']);
        $feb = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?', ['2020-02-01', '2020-02-29']);
        $mar = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?', ['2020-03-01', '2020-03-31']);
        $abr = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?', ['2020-04-01', '2020-04-30']);
        $may = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?', ['2020-05-01', '2020-05-31']);
        $jun = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?', ['2020-06-01', '2020-06-30']);
        $jul = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?', ['2020-07-01', '2020-07-31']);
        $ago = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?', ['2020-08-01', '2020-08-31']);
        $sep = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?', ['2020-09-01', '2020-09-30']);
        $oct = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?', ['2020-10-01', '2020-10-31']);
        $nov = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?', ['2020-11-01', '2020-11-30']);
        $dic = DB::select('SELECT count(*) AS cantidad FROM comments WHERE created_at >= ? AND created_at < ?', ['2020-12-01', '2020-12-31']);
        /*Fin de variables de grafica de cantidad de comentarios por mes */

        /*Variables de grafica de cantidad de usuarios registrados por mes */
        $ene_2 = DB::select('SELECT count(*) AS cantidad FROM users WHERE created_at >= ? AND created_at < ?', ['2020-01-01', '2020-01-31']);
        $feb_2 = DB::select('SELECT count(*) AS cantidad FROM users WHERE created_at >= ? AND created_at < ?', ['2020-02-01', '2020-02-29']);
        $mar_2 = DB::select('SELECT count(*) AS cantidad FROM users WHERE created_at >= ? AND created_at < ?', ['2020-03-01', '2020-03-31']);
        $abr_2 = DB::select('SELECT count(*) AS cantidad FROM users WHERE created_at >= ? AND created_at < ?', ['2020-04-01', '2020-04-30']);
        $may_2 = DB::select('SELECT count(*) AS cantidad FROM users WHERE created_at >= ? AND created_at < ?', ['2020-05-01', '2020-05-31']);
        $jun_2 = DB::select('SELECT count(*) AS cantidad FROM users WHERE created_at >= ? AND created_at < ?', ['2020-06-01', '2020-06-30']);
        $jul_2 = DB::select('SELECT count(*) AS cantidad FROM users WHERE created_at >= ? AND created_at < ?', ['2020-07-01', '2020-07-31']);
        $ago_2 = DB::select('SELECT count(*) AS cantidad FROM users WHERE created_at >= ? AND created_at < ?', ['2020-08-01', '2020-08-31']);
        $sep_2 = DB::select('SELECT count(*) AS cantidad FROM users WHERE created_at >= ? AND created_at < ?', ['2020-09-01', '2020-09-30']);
        $oct_2 = DB::select('SELECT count(*) AS cantidad FROM users WHERE created_at >= ? AND created_at < ?', ['2020-10-01', '2020-10-31']);
        $nov_2 = DB::select('SELECT count(*) AS cantidad FROM users WHERE created_at >= ? AND created_at < ?', ['2020-11-01', '2020-11-30']);
        $dic_2 = DB::select('SELECT count(*) AS cantidad FROM users WHERE created_at >= ? AND created_at < ?', ['2020-12-01', '2020-12-31']);
        /*Fin de variables de grafica de cantidad de usuarios registrados por mes */

        return view('admin.dashboard', compact(
            'posts',
            'categories',
            'users',
            'tags',
            'comments',
            'ene',
            'feb',
            'mar',
            'abr',
            'may',
            'jun',
            'jul',
            'ago',
            'sep',
            'oct',
            'nov',
            'dic',
            'ene_2',
            'feb_2',
            'mar_2',
            'abr_2',
            'may_2',
            'jun_2',
            'jul_2',
            'ago_2',
            'sep_2',
            'oct_2',
            'nov_2',
            'dic_2'
        ));
    }

    public function destroy(Comment $Comment)
    {
        
        $Comment->delete();

        DB::update(
            "UPDATE posts
                SET POINT = (
                    SELECT ROUND(AVG(POINT),1)
                    FROM comments
                    WHERE post_id = ?
                )
                WHERE id = ?",
            [
                $Comment->post_id, $Comment->post_id
            ]
        );

        return redirect()
            ->route('dashboard')
            ->with('flash', 'Comentario Eliminado');
    }
}
