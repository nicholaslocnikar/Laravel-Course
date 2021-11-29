<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('IsAdmin');
    }

    public function index(Request $request)
    {
        // $request->session()->put(['nicholas'=>'student']);

        // session(['nicholas'=>'student']);

        // return $request->session()->all();

        // $request->session()->forget('nicholas');

        // $request->session()->flush();

        // $request->session()->all();

        // $request->session()->flash('message', 'Post has been created');

        // return $request->session()->get('message');

        // $request->session()->reflash();

        // $request->session()->keep('message');

        // return view('home');
    }
}
