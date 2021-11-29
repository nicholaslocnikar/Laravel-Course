<?php

use Illuminate\Support\Facades\Route;
use App\Models\Staff;
use App\Models\Photo;

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

Route::get('/insert', function() {

    $staff = Staff::find(1);

    $staff->photos()->create(['path'=>'example2.jpg']);

});

Route::get('/read', function(){

    $staff = Staff::findOrFail(1);

    foreach($staff->photos as $photo){

        return $photo->path;

    }

});

Route::get('/update', function(){

    $staff = Staff::findOrFail(1);

    $photo = $staff->photos()->whereId(1)->first();

    $photo->path = "Update example.jpg";

    $photo->save();

});

Route::get('/delete', function(){

    $staff = Staff::findOrFail(1);

    $staff->photos()->whereId(1)->delete();

});

Route::get('/assigned', function(){

    $staff = Staff::findOrFail(1);

    $photo = Photo::findOrFail(4);

    $staff->photos()->save($photo);
    
});

Route::get('/unassign', function(){

    $staff = Staff::findOrFail(1);

    $staff->photos()->whereId(3)->update(['imageable_id'=>'0', 'imageable_type'=>'']);

});