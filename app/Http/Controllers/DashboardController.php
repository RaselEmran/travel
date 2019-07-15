<?php

namespace App\Http\Controllers;

use App\ConfirmKit;
use App\Hotel;
use App\Packege;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class DashboardController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$user_id = Auth::user()->id;
		$info = User::find($user_id);
		return view('fontend.profile.dashboard', compact('info'));
	}

	public function profile_update(Request $request) {
		if ($request->ajax()) {
			$validator = Validator::make($request->all(), [
				'enb_email' => 'sometimes|nullable|email',

			]);

			if ($validator->fails()) {
				return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
			}
			$user_id = Auth::user()->id;
			$user = User::find($user_id);
			$user->first_name = $request->first_name;
			$user->last_name = $request->last_name;
			$user->gender = $request->gender;
			$user->country = $request->country;
			$user->state = $request->state;
			$user->country_code = $request->country_code;
			$user->phn_number = $request->phn_number;
			$user->enb_email = $request->enb_email;
			$user->save();

			if ($user) {
				return response()->json(['success' => true, 'status' => 'success', 'message' => 'Profile Update Successfully.']);
			}

		}

	}

	public function change_pass(Request $request) {
		if ($request->ajax()) {
			$validator = Validator::make($request->all(), [
				'new_pass' => 'required|confirmed|min:6',
				// 'confirm_pass' => 'required|min:6'

			]);

			if ($validator->fails()) {
				return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
			}

			$user_id = Auth::user()->id;
			$user = User::find($user_id);
			$user->new_pass = Hash::make($request->new_pass);

			if ($user) {
				return response()->json(['success' => true, 'status' => 'success', 'message' => 'Password Change Successfully.']);
			}
		}
	}

	public function user_kit(Request $request) {
		//
		$secret = $request->secret;
		$token = $request->token;
		$paymentId = $request->paymentId;
		$PayerID = $request->PayerID;

		if (isset($paymentId) && isset($token) && isset($PayerID) && $secret) {
			$confirmKit = ConfirmKit::where('token', '=', $secret)->first();
			$confirmKit->status = 'Paid';
			$confirmKit->transaction_id = $paymentId;
			$confirmKit->token = $token;
			$confirmKit->payment_date = date('Y-m-d');
			$confirmKit->save();
			$message = 'Your Order Payment Done Successfull';
			return redirect('/user-travel-kit')->with('message', $message);
		} elseif (!isset($paymentId) && isset($token) && !isset($PayerID) && $secret) {
			$confirmKit = ConfirmKit::where('token', '=', $secret)->first()->delete();
			$message = 'Your Order Cancel Successfull';
			return redirect('/user-travel-kit')->with('message', $message);
		}
		$user_id = Auth::user()->id;
		$confirmKit = ConfirmKit::where('user_id', $user_id)->get();
		return view('fontend.profile.user_kit', compact('confirmKit'));
	}

	public function user_kit_details($id) {
		$user_id = Auth::user()->id;
		$confirmKit = ConfirmKit::where('id', $id)->where('user_id', $user_id)->first();
		return view('fontend.profile.user_kit_details', compact('confirmKit'));
	}

	public function search(Request $request) {
		$query = $request->q;
		if ($query) {
			$hotels = Hotel::search($query, null, true)->get();
			$packages = Packege::search($query, null, true)->get();
			return view('fontend.search', compact('hotels', 'packages', 'query'));
		} else {
			return redirect('/');
		}
	}

}
