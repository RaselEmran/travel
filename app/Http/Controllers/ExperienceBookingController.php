<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Packege;
use App\Destination;
use App\PackegeItinary;
use App\PackegeOption;
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
   	return view('fontend.experience_booking',compact('packege'));
   }
}
