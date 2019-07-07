<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Packege;
use App\Destination;
use App\PackegeItinary;
use App\PackegeOption;

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
        $packege =Packege::take(8)->get();
        $latestpac =Packege::latest()->take(4)->get();
        return view('fontend.main',compact('packege','latestpac'));
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
