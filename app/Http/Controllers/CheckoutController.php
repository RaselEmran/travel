<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserPackege;
use Auth;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use App\User;
use App\HotelBooking;
use Session;

class CheckoutController extends Controller
{
   public function index(Request $request)
   {
   	$secret =$request->secret;
   	$check =UserPackege::where('secret',$secret)->firstOrFail();
   	return view('fontend.packege_checkout',compact('check'));
   }

   public function post_pack_checkout(Request $request)
   {
   	       $user =User::find($request->user_id);
   	       $user->first_name =$request->first_name;
   	       $user->last_name =$request->last_name;
   	       $user->enb_email =$request->enb_email;
   	       $user->phn_number =$request->phn_number;
   	       $user->save();
   			$apiContext = new ApiContext(
				new OAuthTokenCredential(
					env('PAYPAL_CLIENT_ID',config('settings.paypale_client_id')),
					env('PAYPAL_SECRET',config('settings.paypale_client_secret'))
				)
			);
			$check =UserPackege::where('secret',$request->secret)->first();
			if ($check->pack_quantity !=$request->guest || $check->total!=$request->total) {
				Session::put('msg','You are Type Worng Input');
				return redirect()->route('packege-chackeout',['secret'=>$request->secret]);
			}
			else{
			$invoice_no =rand();
			$payer = new Payer();
			$payer->setPaymentMethod("paypal");
			$details = new Details();
			$details ->setSubtotal($request->total);

			$amount = new Amount();
			$amount->setCurrency("USD")
			    ->setTotal($request->total)
			    ->setDetails($details);

		    $transaction = new Transaction();
			$transaction->setAmount($amount)
				->setDescription("Payment description")
				->setInvoiceNumber($invoice_no);  

			$redirectUrls = new RedirectUrls();
			$redirectUrls->setReturnUrl(route('booking-result', ['secret' => $request->secret]))
				->setCancelUrl(route('booking-result', ['secret' => $request->secret])); 

			$payment = new Payment();
			$payment->setIntent("sale")
				->setPayer($payer)
				->setRedirectUrls($redirectUrls)
				->setTransactions(array($transaction));

			$request = clone $payment;
			$payment->create($apiContext);
			$approvalUrl = $payment->getApprovalLink();
			return redirect($approvalUrl);
		}
   }

   public function hotel(Request $request)
   {
   	$check =HotelBooking::where('secret',$request->secret)->firstOrFail();
   	return view('fontend.hotel_checkout',compact('check'));
   }


    public function post_hotel_checkout(Request $request)
   {
   	       $user =User::find($request->user_id);
   	       $user->first_name =$request->first_name;
   	       $user->last_name =$request->last_name;
   	       $user->enb_email =$request->enb_email;
   	       $user->phn_number =$request->phn_number;
   	       $user->save();
   			$apiContext = new ApiContext(
				new OAuthTokenCredential(
					env('PAYPAL_CLIENT_ID',config('settings.paypale_client_id')),
					env('PAYPAL_SECRET',config('settings.paypale_client_secret'))
				)
			);
			$check =HotelBooking::where('secret',$request->secret)->first();
			if ($check->guest !=$request->guest || $check->price!=$request->price) {
				Session::put('msg','You are Type Worng Input');
				return redirect()->route('packege-chackeout',['secret'=>$request->secret]);
			}
			else{
			$invoice_no =rand();
			$payer = new Payer();
			$payer->setPaymentMethod("paypal");
			$details = new Details();
			$details ->setSubtotal($request->price);

			$amount = new Amount();
			$amount->setCurrency("USD")
			    ->setTotal($request->price)
			    ->setDetails($details);

		    $transaction = new Transaction();
			$transaction->setAmount($amount)
				->setDescription("Payment description")
				->setInvoiceNumber($invoice_no);  

			$redirectUrls = new RedirectUrls();
			$redirectUrls->setReturnUrl(route('hotel.booking_list', ['secret' => $request->secret]))
				->setCancelUrl(route('hotel.booking_list', ['secret' => $request->secret])); 

			$payment = new Payment();
			$payment->setIntent("sale")
				->setPayer($payer)
				->setRedirectUrls($redirectUrls)
				->setTransactions(array($transaction));

			$request = clone $payment;
			$payment->create($apiContext);
			$approvalUrl = $payment->getApprovalLink();
			return redirect($approvalUrl);
		}
   }
}
