<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Admin;
use App\user;
use App\UserPackege;
use App\Destination;
use App\Packege;
use App\HotelBooking;
use App\Hotel;
use Illuminate\Support\Facades\Storage;

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
       $pack =Packege::all();
       $hotel =Hotel::all();
       $bookpack =UserPackege::all();
       $hotbook=HotelBooking::all();
       $user =User::all();
       $destination =Destination::all();
        return view('admin.welcome',compact(
            'pack',
            'hotel',
            'bookpack',
            'hotbook',
            'user',
            'destination'
            ));
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
