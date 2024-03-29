<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function homeuser()
    {
        return view('layouts.homeuser');
    }
    public function homelte()
    {
        return view('homelte');
    }
    public function keluar()
    {
        Auth::logout();
        return redirect('/');
;
    }



}
