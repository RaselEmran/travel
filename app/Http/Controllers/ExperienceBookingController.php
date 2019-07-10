<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Packege;
use App\Destination;
use App\OneWayPack;
use App\TwoWayPack;
use App\Hotel;
use App\UserPackege;
use App\UserItinary;
use App\Wishlist;
use Validator;
use Auth;
use User;
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

   public function itinaray_up(Request $request)
   {
      // dd($request->all());
      if ($request->one_way !==1) {
         return response()->json(['success' => true, 'status' => 'success', 'message' => 'Packege Book Successfully','goto'=>route('dashboard')]);
      }

      if ($request->one_way) {
          $userpackege =new UserPackege;
          $userpackege->packege_id =$request->packege_id;
          $userpackege->user_id =Auth::user()->id;
          $userpackege->type= 'One Way';
          $userpackege->depart_date =$request->depart_date;
          $userpackege->pack_quantity =$request->pack_quantity;
          $userpackege->price =$request->one_price;
          $userpackege->total =$request->one_price*$request->pack_quantity;
          $userpackege->status =false;
          $userpackege->date =date('Y-m-d');
          $userpackege->save();
          $bookid =$userpackege->id;

          for ($i=0; $i <count($request->time1) ; $i++) { 
             
             $useritinary =new UserItinary;
             $useritinary->user_packege_id =$bookid;
             $useritinary->user_id =Auth::user()->id;
             $useritinary->type='One Way';
             $useritinary->time =$request->time1[$i];
             $useritinary->name=$request->itinary_name1[$i];
             $useritinary->date=date('Y-m-d');
             $useritinary->save();
          }
      }
      else{
          $userpackege =new UserPackege;
          $userpackege->packege_id =$request->packege_id;
          $userpackege->user_id =Auth::user()->id;
          $userpackege->type= 'Two Way';
          $userpackege->depart_date =$request->depart_date2;
          $userpackege->pack_quantity =$request->pack_quantity2;
          $userpackege->price =$request->two_price;
          $userpackege->total =$request->two_price*$request->pack_quantity2;
          $userpackege->status =false;
          $userpackege->date =date('Y-m-d');
          $userpackege->save();
          $bookid =$userpackege->id;

          for ($j=0; $j <count($request->time2) ; $j++) { 
             
             $useritinary =new UserItinary;
             $useritinary->user_packege_id =$bookid;
             $useritinary->user_id =Auth::user()->id;
             $useritinary->type='Two Way';
             $useritinary->time =$request->time2[$j];
             $useritinary->name=$request->itinary_name2[$j];
             $useritinary->date=date('Y-m-d');
             $useritinary->save();
          }
      }
     return response()->json(['success' => true, 'status' => 'success', 'message' => 'Packege Book Successfully.Check Your mail After 24 hours','goto'=>route('dashboard')]);
   }

   public function booking_result(Request $request)
   {
      $user_id =Auth::user()->id;
      $userpackege =UserPackege::where('user_id',$user_id)->get();
      return view('fontend.profile.booking',compact('userpackege'));
   }

   public function wishliststore(Request $request)
   {
     if ($request->ajax()) {

       if (Auth::guest())
       {

          return response()->json(['success' => true, 'status' => 'warning', 'message' => 'Please Login Before']);
        }
        else
        {
          $id =$request->id;
          $user_id =Auth::user()->id;
          $wishlist =new Wishlist;
          $wishlist->packege_id =$id;
          $wishlist->user_id =$user_id;
          $wishlist->date =date('Y-m-d');
          $wishlist->status =false;
          $wishlist->save();
          return response()->json(['success' => true, 'status' => 'success', 'message' => 'packege Store Your Wishlist']);
        }
     }
  
   }

   public function wishlist()
   {
    $user_id =Auth::user()->id;
    $wishlist =Wishlist::where('user_id',$user_id)->get();
    return view('fontend.profile.wishlist',compact('wishlist'));
   }
}
