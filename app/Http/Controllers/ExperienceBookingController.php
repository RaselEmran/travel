<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Packege;
use App\Destination;
use App\OneWayPack;
use App\TwoWayPack;
use App\Hotel;
class ExperienceBookingController extends Controller
{
   public function index()
   {
   	
	   $packege =Packege::all();
	   return view('fontend.explore',compact('packege'));
   }
   public function experience_booking($id)
   {
   	$packege =Packege::find($id);
      $latest =Hotel::latest()->take(4)->get();
   	return view('fontend.experience_booking',compact('packege','latest'));
   }
}
