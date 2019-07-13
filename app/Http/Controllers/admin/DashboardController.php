<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Admin;
use App\user;

class DashboardController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        return view('admin.welcome');
    }

    //admin profile
    public function profile()
    {
        $user_id = Auth::user()->id;
        $admin =Admin::find($user_id);
        return view('admin.profile.profile',compact('admin'));
    }

    public function travelar()
    {
        $travelars =User::all();
        return view('admin.travelar',compact('travelars'));
    }
}
