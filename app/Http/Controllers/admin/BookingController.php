<?php

namespace App\Http\Controllers\admin;

use App\Hotel;
use App\HotelBooking;
use App\Http\Controllers\Controller;
use App\Packege;
use App\UserPackege;

use App\UserItinary;
use App\User;

use App\Wishlist;
use App\Notifications\PackegeConfirm;
use Illuminate\Http\Request;

class BookingController extends Controller {
	public function index() {
		$userpackege = UserPackege::all();
		return view('admin.booking.packege.index', compact('userpackege'));
	}

	public function packege_details($booking, $packege) {
		$userpackege = UserPackege::find($booking);
		$packegeinfo = Packege::find($packege);
		return view('admin.booking.packege.details', compact('userpackege', 'packegeinfo'));
	}
	/*::::wishlist:::::*/
	public function pack_wishlist() {
		$wishlist = Wishlist::all();
		return view('admin.wishlist.packege.index', compact('wishlist'));
	}

	public function hotel() {
		$hotel_bookings = HotelBooking::all();
		return view('admin.booking.hotel.index', compact('hotel_bookings'));
	}



    public function send_packege_mail(Request $request)
    {
     $user_id =$request->user_id;
     $packege =$request->user_packege;
     $userpackege =UserPackege::find($packege);
     $userpackege->total =$request->edit_amt;
     $userpackege->save();
     $user =User::find($user_id);
     $messege =$request->messege;
     if ($user->email) {
        $user->notify(new PackegeConfirm($userpackege,$user,$messege));
     }


    }

	public function hotel_details($hotel_booking) {
		$booking = HotelBooking::findOrFail($hotel_booking);
		return view('admin.booking.hotel.details', compact('booking'));
	}

}
