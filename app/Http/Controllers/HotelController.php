<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\HotelBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HotelController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$this->middleware(['auth']);

		$hotels = Hotel::paginate(8);
		return view('fontend.stays', compact('hotels'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function booking(Request $request, $id) {
		$user_id = auth()->user()->id;
		$booking = new HotelBooking;
		$booking->user_id = $user_id;
		$booking->hotel_id = $request->hotel_id;
		$booking->check_in = $request->check_in;
		$booking->check_out = $request->check_out;
		$booking->guest = $request->guest;
		$booking->price = $request->price;
		$booking->save();
		Session::flash('message', 'Packege Book Successfully.Check Your mail After 24 hours!');
		return redirect()->route('hotel.booking_list');

		// return response()->json(['success' => true, 'status' => 'success', 'message' => 'Packege Book Successfully.Check Your mail After 24 hours', 'goto' => route('dashboard')]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function list(Request $request, $id) {
		$user_id = auth()->user()->id;
		$userhotel = HotelBooking::where('user_id', $user_id)->get();
		return view('fontend.profile.hotel_booking', compact('userhotel'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$hotel = Hotel::findOrFail($id);
		$latest = Hotel::take(4)->latest()->get();
		return view('fontend.single_stay', compact('hotel', 'latest'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}

	public function booking_list() {
		$user_id = auth()->user()->id;
		$hotels = HotelBooking::where('user_id', $user_id)->paginate(6);
		return view('fontend.profile.hotel_booking', compact('hotels'));
	}
	public function book_details($id) {
		$user_id = auth()->user()->id;
		$hotel_booking = HotelBooking::where('id', $id)->where('user_id', $user_id)->firstOrFail();
		return view('fontend.profile.hotel_booking_details', compact('hotel_booking'));
	}
}
