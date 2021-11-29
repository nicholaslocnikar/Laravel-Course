<?php

use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    // return 'Home';

    $data = [
        'title'=> 'Hi there',
        'content' => 'General Kanobi'
    ];

    Mail::send('emails.test', $data, function($message){

        $message->to('nicholaslocnikar@gmail.com', 'Nicholas')->subject('From Laravel Project');

    });
});
