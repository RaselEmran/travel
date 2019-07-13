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
use App\TravelKit;
use App\bookingKit;
use App\ConfirmKit;
use App\Helpars\Kitpaypale;
use Validator;
use Auth;
use User;
class ExperienceBookingController extends Controller
{
   public function index()
   {
   	
	   $packege =Packege::paginate(8);
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
      // if ($request->one_way !==1) {
      //    return response()->json(['success' => true, 'status' => 'success', 'message' => 'Packege Book Successfully','goto'=>route('dashboard')]);
      // }

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
      $userpackege =UserPackege::where('user_id',$user_id)->paginate(6);
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

   public function packege_book_details($id)
   {
    $packege=UserPackege::where('packege_id',$id)->first();
    return view('fontend.profile.booking_details',compact('packege'));
   }

   public function travelkit()
   {
    $phones =TravelKit::where('type','Phone Accessories')->where('status',1)->get();

    $medicals =TravelKit::where('type','Medical')->where('status',1)->get();

    $toiletries =TravelKit::where('type','Toiletries')->where('status',1)->get();

    $others =TravelKit::where('type','Others')->where('status',1)->get();

    return view('fontend.travelkit',compact('phones','medicals','toiletries','others'));
   }
  public function travelkit_book(Request $request)
  {
    
      $this->validate($request, [
        'pick_up_date' => 'required|date',
        'pick_up_time' => 'required',
        'location' => 'required',
        'location_name' => 'required',

      ]);
      $user_id =Auth::user()->id;
 
      $kit =$request->pha;
      if (!isset($kit)) {
        return redirect('/travelkit')->with('msg','Select Atleast One Kit');

      }
      else{
         $confirmkit =new ConfirmKit;
         $confirmkit->user_id =$user_id;
         $confirmkit->pick_up_date =$request->pick_up_date;
         $confirmkit->pick_up_time =$request->pick_up_time;
         $confirmkit->location =$request->location;
         $confirmkit->location_name =$request->location_name;
         $confirmkit->total_amt =$request->total_price;
         $confirmkit->status ='Pendding';
         $confirmkit->save(); 
         $confirm_kit_id =$confirmkit->id;

         for ($i=0; $i <count($kit) ; $i++) { 
          $bookingKit =new bookingKit;
          $bookingKit->confirm_kit_id =$confirm_kit_id;
          $bookingKit->travel_kit_id=$kit[$i];
          $bookingKit->price=$request->price[$i];
          $bookingKit->quantity=$request->quantity[$i];
          $bookingKit->save();
         }

          return redirect('/travelkit')->with('emsg','Your Travelkit Card add Successfully,we will Confirm you within 24 hours');
            // $paypal = new Kitpaypale;

            // $response = $paypal->purchase([
            //     'amount' => $paypal->formatAmount($request->total_price),
            //     'transactionId' => '12345698745',
            //     'currency' => 'USD',
            //     'cancelUrl' => $paypal->getCancelUrl($confirm_kit_id),
            //     'returnUrl' => $paypal->getReturnUrl($confirm_kit_id),
            // ]);
            // dd($response);

        //       if ($response->isSuccessful()) {
        //         dd($response->getTransactionReference());

          
        // }

      }

      
 
  }
}
