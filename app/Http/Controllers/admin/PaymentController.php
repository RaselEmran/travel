<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserPackege;
use App\HotelBooking;

class PaymentController extends Controller
{
    public function index()
    {
    	$packege =UserPackege::where('status',true)->get();
    	return view('admin.payment.packege.index',compact('packege'));
    }

    public function hotel()
    {
    	$hotel =HotelBooking::where('status',true)->get();
    	return view('admin.payment.hotel.index',compact('hotel'));
    }
}
