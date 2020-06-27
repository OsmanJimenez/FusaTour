<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@home' )->name('pages.inicio');
Route::get('categorias', 'PagesController@categorias' )->name('pages.categorias');
Route::get('descubrir', 'PagesController@descubrir' )->name('pages.descubrir');
Route::get('actividades', 'PagesController@actividades' )->name('pages.actividades');
Route::get('perfil', 'PagesController@perfil' )->name('pages.perfil')->middleware('auth');


Route::get('blog/{post}', 'PostsController@show')->name('posts.show');
Route::get('categorias/{category}', 'CategoriesController@show')->name('categories.show');
Route::get('actividades/{tag}', 'ActividadesController@show')->name('actividades.show');



Auth::routes();


Route::name('create_comment')->post('blog/{post}', 'PostsCommentsController@create');

Route::get('perfiledit', 'PagesController@perfiledit' )->name('pages.perfiledit');
Route::get('escaner', 'PagesController@escaner' )->name('pages.escaner');

Route::put('perfiledit/{user}', 'UsuarioController@editarperfil' )->name('profile.update');


Route::auth();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/offline', function (){
    return view('modules/laravelpwa/offline');
});



Route::group([
    'prefix' => 'admin', 
    'namespace' => 'Admin', 
    'middleware' => 'role:Admin'], 

function(){
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('posts', 'PostsController@index' )->name('admin.posts.index');
    Route::get('posts/create', 'PostsController@create' )->name('admin.posts.create');
    Route::post('posts', 'PostsController@store' )->name('admin.posts.store');
    Route::get('posts/{post}', 'PostsController@edit' )->name('admin.posts.edit');
    Route::put('posts/{post}', 'PostsController@update' )->name('admin.posts.update');
    Route::delete('posts/{post}', 'PostsController@destroy' )->name('admin.posts.destroy'); 
    Route::post('posts/{post}/photos', 'PhotosController@store' )->name('admin.posts.photos.store');
    Route::delete('comments/{comment}', 'AdminController@destroy' )->name('admin.admin.destroy');

});

Route::group([
    'prefix' => 'admin', 
    'namespace' => 'Admin', 
    'middleware' => 'role:Admin'], 
function(){
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('categorys', 'CategorysController@index' )->name('admin.categorys.index');
    Route::get('categorys/create', 'CategorysController@create' )->name('admin.categorys.create');
    Route::post('categorys', 'CategorysController@store' )->name('admin.categorys.store');
    Route::get('categorys/{category}', 'CategorysController@edit' )->name('admin.categorys.edit');
    Route::put('categorys/{category}', 'CategorysController@update' )->name('admin.categorys.update');
    Route::delete('categorys/{category}', 'CategorysController@destroy' )->name('admin.categorys.destroy');

});

Route::get('/logout', 'Auth\LoginController@logout');


Route::group([
    'prefix' => 'admin', 
    'namespace' => 'Admin', 
    'middleware' => 'role:Admin'], 
function(){
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('tags', 'TagsController@index' )->name('admin.tags.index');
    Route::get('tags/create', 'TagsController@create' )->name('admin.tags.create');
    Route::post('tags', 'TagsController@store' )->name('admin.tags.store');
    Route::get('tags/{tag}', 'TagsController@edit' )->name('admin.tags.edit');
    Route::put('tags/{tag}', 'TagsController@update' )->name('admin.tags.update');
    Route::delete('tags/{tag}', 'TagsController@destroy' )->name('admin.tags.destroy');

});

Route::group([
    'prefix' => 'admin', 
    'namespace' => 'Admin', 
    'middleware' => 'role:Admin'], 
function(){
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('users', 'UsersController@index' )->name('admin.users.index');
    Route::get('users/create', 'UsersController@create' )->name('admin.users.create');
    Route::post('users', 'UsersController@store' )->name('admin.users.store');
    Route::get('users/{user}', 'UsersController@edit' )->name('admin.users.edit');
    Route::put('users/{user}', 'UsersController@update' )->name('admin.users.update');
    Route::delete('users/{user}', 'UsersController@destroy' )->name('admin.users.destroy');


});
