<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Role;

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

Route::get('/create', function(){

    $user = User::find(1);

    $role = new Role(['name'=>'Administrator']);

    $user->roles()->save($role);

});

Route::get('/read', function(){

    $user = User::findOrFail(1);

    foreach($user->roles as $role){

        echo $role->name;
        
    };

});

Route::get('/update', function(){

    $user = User::findOrFail(1);

    if($user->has('roles')){

        foreach($user->roles as $role){

            if($role->name == 'Administrator'){

                $role->name = "admin";

                $role->save();

            }
        }

    }
    
});

Route::get('/delete', function(){

    $user = User::findOrFail(1);

    foreach($user->roles as $role){

        $role->whereId(1)->delete();

    }

});

Route::get('/attach', function(){

    $user = User::findOrFail(1);

    $user->roles()->attach(2);

});

Route::get('/detach', function(){

    $user = User::findOrFail(1);

    $user->roles()->detach(2);

});

Route::get('/sync', function(){

    $user = User::findOrFail(1);

    $user->roles()->sync([5,6]);

});