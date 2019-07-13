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
use App\User;
use App\Wishlist;
use App\Notifications\CheckoutNotification;

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

    public function send_packege_mail(Request $request)
    {
     $user_id =$request->user_id;
     $packege =$request->user_packege;
     $userpackege =UserPackege::find($packege);
     $user =User::find($user_id);
     $messege =$request->messege;
     if ($user->email) {
        $user->notify(new CheckoutNotification($userpackege,$user,$messege));
     }


    }
}
