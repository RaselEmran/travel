<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Packege;
use App\Destination;
use App\OneWayPack;
use App\TwoWayPack;
use App\Hotel;
use App\UserPackege;
use App\UserItinary;
use App\Wishlist;

class BookingController extends Controller
{
    public function index(){
    	$userpackege =UserPackege::all();
    	return view('admin.booking.packege.index',compact('userpackege'));
    }

    public function packege_details($booking,$packege)
    {
    	$userpackege =UserPackege::find($booking);
    	$packegeinfo= Packege::find($packege);
    	return view('admin.booking.packege.details',compact('userpackege','packegeinfo'));
    }
    /*::::wishlist:::::*/
    public function pack_wishlist()
    {
        $wishlist =Wishlist::all();
        return view('admin.wishlist.packege.index',compact('wishlist'));
    }
}
