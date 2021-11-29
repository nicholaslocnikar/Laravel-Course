<?php

use App\Models\Post;
use App\Models\Photo;
use App\Models\Tag;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

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

Route::get('/', function () {

    return view('welcome');
});

// Route::get('/test', function () {
//     return "Welcome to the test page";
// });

// Route::get('/post/{id}/{name}', function($id, $name){

//     return "This is post number ". $id . " " . $name;
// });

// Route::get('admin/posts/example',array('as'=>'admin.home', function(){
//     $url = route('admin.home');
//     return "This url is " . $url;
// }));

// Route::get('/post/{id}', '\App\Http\Controllers\PostsController@index');

// Route::resource('posts', '\App\Http\Controllers\PostsController');

// Route::get('/contact', '\App\Http\Controllers\PostsController@contact');

// Route::get('post/{id}/{name}', 'App\Http\Controllers\PostsController@show_post');

/*
|--------------------------------------------------------------------------
DATABASE Raw SQL Queries
|--------------------------------------------------------------------------
*/

// Route::get('/insert', function(){

//     DB::insert('insert into posts(title, content) values(?, ?)', ['Laravel is awesome', 'PERIOD']);

// });

// Route::get('/read', function(){

//     $results = DB::select('select * from posts where id = ?', [1]);

//     return var_dump($results);

//     // foreach($results as $posts){

//     //     return $posts->title;

//     // }

// });


// Route::get('/update', function(){

//     $updated = DB::update('update posts set title = "Updated title" where id = ?', [1]);

//     return $updated;

// });

// Route::get('/delete', function(){

//     $deleted = DB::delete('delete from posts where id = ?', [1]);

//     return $deleted;

// });

/*
|--------------------------------------------------------------------------
ELOQUENT ORM
|--------------------------------------------------------------------------
*/

// Route::get('/read', function(){

//     $posts = Post::all();

//     foreach($posts as $post) {
//         return $post->title;
//     }

// });


// Route::get('/find', function(){

//     $posts = Post::find(2);

//     return $posts->title;

// });


// Route::get('/findwhere', function(){

//     $posts = Post::where('id', 3)->orderBy('id', 'desc')->take(1)->get();

//     return $posts;

// });

// Route::get('/findmore', function(){

//     // $posts = Post::findOrFail(1);
//     // return $posts;

//     $posts = Post::where('users_count', '<', 50)->firstOrFail();
//     return $posts;

// });

// Route::get('/basicinsert', function(){

//     $post = new Post;

//     $post->title = 'new ORM title';
//     $post->content = 'Eloquent with filler content';

//     $post->save();

// });

// Route::get('/basicinsert2', function(){

//     $post = Post::find(2);

//     $post->title = 'Find and replaced data';
//     $post->content = 'updated content';

//     $post->save();

// });

// Route::get('/create', function(){

//     Post::create(['title'=>'the create method 2', 'content'=>'I am learning 2']);

// });

// Route::get('/update', function(){

//     Post::where('id', 2)->where('is_admin',0)->update(['title'=>"NEW PHP TITLE", 'content'=>"I love my instructor"]);

// });

// Route::get('/delete', function(){

//     $post = Post::find(4);

//     $post->delete();

// });

// Route::get('/delete2', function(){

//     Post::destroy([3]);

//     // Post::where('is_admin', 0)->delete();

// });

// Route::get('/softdelete', function(){

//     Post::find(2)->delete();

// });

// Route::get('/readsoftdelete', function(){

//     // $post = Post::find(1);

//     // return $post;

//     $post = Post::withTrashed()->where('id',1)->get();

//     return $post;

//     // $post = Post::onlyTrashed()->where('is_admin',0)->get();

//     // return $post;

// });

// Route::get('/restore', function(){

//     Post::withTrashed()->where('is_admin',0)->restore();

// });

// Route::get('/forcedelete', function(){

//     Post::onlyTrashed()->where('is_admin',0)->forceDelete();

// });

/*
|--------------------------------------------------------------------------
ELOQUENT Relationships
|--------------------------------------------------------------------------
*/

// One to One relation
// Route::get('/user/{id}/post', function($id){

//     return User::find($id)->post;

// });

// //Inverse relation
// Route::get('/post/{id}/user', function($id){

//     return Post::find($id)->user->name;

// });

// //One to Many relation
// Route::get('/posts', function(){

//     $user = User::find(1);

//     foreach($user->posts as $post) {

//         echo $post->title . '<br>';

//     }

// });

// //Many to Many relation
// Route::get('/user/{id}/role', function($id){

//     $user = User::find($id)->roles()->orderBy('id', 'desc')->get();

//     return $user;

//     // foreach($user->roles as $role){
//     //     return $role->name;
//     // }

// });

// Accessing the intermediate table / pivot

// Route::get('/user/pivot', function(){

//     $user = User::find(1);

//     foreach($user->roles as $role) {

//         return $role->pivot->create_at;

//     }

// });

// Route::get('/user/country', function(){

//     $country = Country::find(3);

//     foreach($country->posts as $post){

//         return $post->title;

//     }

// });

// Polymorphic relation


// Route::get('/user/photos', function(){

//     $user = User::find(1);

//     foreach($user->photos as $photo){

//         return $photo->path;

//     }

// });

// Route::get('/post/{id}/photos', function($id){

//     $post = Post::find($id);

//     foreach($post->photos as $photo){

//         echo $photo->path . "<br>";

//     }

// });

// Route::get('photo/{id}/post', function($id){

//     $photo = Photo::findOrFail($id);

//     return $photo->imageable;

// });

// Polymorphic Many to Many relation

// Route::get('/post/tag', function(){

//     $post = Post::find(1);

//     foreach($post->tags as $tag){

//         echo $tag->name;

//     }

// });

// Route::get('/tag/post', function(){

//     $tag = Tag::find(2);

//     foreach($tag->posts as $post){

//         echo $post->title;

//     }

// });

// Route::get('/dates', function(){

//     $date = new DateTime('+1 week');

//     echo $date->format('m-d-Y');

//     echo '<br>';

//     echo Carbon::now()->addDays(1)->diffForHumans();

//     echo '<br>';

//     echo Carbon::now()->subMonths(5)->diffForHumans();

//     echo '<br>';

//     echo Carbon::now()->yesterday();

// });

// Route::get('/getname', function(){

//     $user = User::find(1);

//     echo $user->name;

// });

// Route::get('/setname', function(){

//     $user = User::find(1);

//     $user->name = "william";

//     $user->save;

// });

/*
|--------------------------------------------------------------------------
CRUD Application
|--------------------------------------------------------------------------
*/

Route::group(['middleware'=>'web'], function(){

    Route::resource('/posts', 'App\Http\Controllers\PostsController');

});
