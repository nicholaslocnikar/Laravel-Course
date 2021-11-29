<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;

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

Route::get('/create', function (){

    $user = User::findOrFail(1);

    $post = new Post(['title'=>'My fir2ndst post', 'body'=>'Content 2']);

    $user->posts()->save($post);

});

Route::get('/read', function (){

    $user = User::findOrFail(1);

    foreach($user->posts as $post){

        echo $post->title . " " . $post->body . "<br>";

    };

});

Route::get('/update', function(){

    $user = User::find(1);

    $user->posts()->whereId(1)->update(['title'=>'I love laravel', 'body'=>'This is awesome']);

});

Route::get('/delete', function(){

    $user = User::find(1);

    $user->posts()->whereId(1)->delete();

});
