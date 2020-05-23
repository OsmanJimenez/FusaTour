<?php

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Post::truncate();
        Category::truncate();
        Tag::truncate();

        $category = new Category;
        $category->name = "Escenarios";
        $category->save();

        $category = new Category;
        $category->name = "Monumentos";
        $category->save();

        $post = new Post;
        $post->title = "Mi primer post";
        $post->url = str_slug("Mi primer post");
        $post->urlimg = "assets/images/blog-115.jpg";
        $post->excerpt = "Contenido de prueba para esta imagen";
        $post->body = "<p>Este es el body </p>";
        $post->published_at = Carbon::now();
        $post->category_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'etiqueta 1']));

        $post = new Post;
        $post->title = "Mi segundo post";
        $post->url = str_slug("Mi segundo post");
        $post->urlimg = "assets/images/blog-116.jpg";
        $post->excerpt = "Contenido de prueba para esta imagen";
        $post->body = "<p>Este es el body </p>";
        $post->published_at = Carbon::now()->subDays(4);
        $post->category_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'etiqueta 2']));


        $post = new Post;
        $post->title = "Mi tercer post";
        $post->url = str_slug("Mi tercer post");
        $post->urlimg = "assets/images/blog-118.jpg";
        $post->excerpt = "Contenido de prueba para esta imagen";
        $post->body = "<p>Este es el body </p>";
        $post->published_at = Carbon::now();
        $post->category_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'etiqueta 3']));


        $post = new Post;
        $post->title = "Mi cuarto post";
        $post->url = str_slug("Mi cuarto post");
        $post->urlimg = "assets/images/blog-117.jpg";
        $post->excerpt = "Contenido de prueba para esta imagen";
        $post->body = "<p>Este es el body </p>";
        $post->published_at = Carbon::now();
        $post->category_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'etiqueta 4']));
    }
}
