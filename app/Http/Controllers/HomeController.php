<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('fontend.main');
    }

    public function sign_up_option()
    {
        return view('fontend.sign_up_option');
    }

    public function sign_up()
    {
        return view('fontend.sign_up');
    }

    public function login()
    {
        return view('fontend.login');
    }
}
