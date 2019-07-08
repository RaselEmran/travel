<?php

namespace App\Http\Controllers\admin;

use App\Amenity;
use App\AmenityHotel;
use App\Hotel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller {

	public function index() {
		$hotel = Hotel::all();
		return view('admin.hotel.index', compact('hotel'));
	}

	public function create() {
		$amenities = Amenity::where('status', 1)->get();
		return view('admin.hotel.create', compact('amenities'));
	}

	public function store(Request $request) {
		// dd($request->all());
		if ($request->ajax()) {
			$validator = Validator::make($request->all(), [
				'name' => 'required|string|max: 190',
				'entire_place' => 'required|string|max: 190',
				'price' => 'required|numeric',
				'status' => 'required|integer',
				'amenity.*' => 'required|integer',
				'photo' => 'required|mimes:jpeg,bmp,png|max:2000',
				'banner' => 'required|mimes:jpeg,bmp,png|max:2000',
			]);

			if ($validator->fails()) {
				return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
			}
			$hotel = new Hotel;
			if ($request->hasFile('photo')) {
				$storagepath = $request->file('photo')->store('public/hotel/photo');
				$fileName = basename($storagepath);
				$hotel->photo = $fileName;
			}

			if ($request->hasFile('banner')) {
				$storagepath = $request->file('banner')->store('public/hotel/banner');
				$fileName = basename($storagepath);
				$hotel->banner = $fileName;
			}
			$hotel->name = $request->name;
			$hotel->entire_place = $request->entire_place;
			$hotel->price = $request->price;
			$hotel->status = $request->status;
			$hotel->room_details = $request->room_details;
			$hotel->allow = $request->allow;
			$hotel->policy = $request->policy;
			$hotel->map = $request->map;
			$hotel->meta_title = $request->meta_title;
			$hotel->meta_keywords = $request->meta_keywords;
			$hotel->meta_description = $request->meta_description;
			$hotel->save();
			$hotel_id = $hotel->id;
			foreach ($request->amenity as $amenity) {
				$amenity_hotels = new AmenityHotel;
				$amenity_hotels->amenity_id = $amenity;
				$amenity_hotels->hotel_id = $hotel_id;
				$amenity_hotels->save();
			}

			return response()->json(['success' => true, 'status' => 'success', 'message' => 'Hotel Information Add Successfully.', 'goto' => route('admin.hotel')]);
		}
	}

	public function edit($id) {
		$hotel = Hotel::findOrFail($id);
		// dd($hotel);
		$amenities = Amenity::where('status', 1)->get();
		return view('admin.hotel.edit', compact('hotel', 'amenities'));
	}

	public function update(Request $request) {
		if ($request->ajax()) {
			$validator = Validator::make($request->all(), [
				'name' => 'required|string|max: 190',
				'entire_place' => 'required|string|max: 190',
				'price' => 'required|numeric',
				'status' => 'required|integer',
				'amenity.*' => 'required|integer',
				'photo' => 'sometimes|nullable|mimes:jpeg,bmp,png|max:2000',
				'banner' => 'sometimes|nullable|mimes:jpeg,bmp,png|max:2000',
			]);

			if ($validator->fails()) {
				return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
			}
			$hotel = Hotel::find($request->id);
			if ($request->hasFile('photo')) {
				$storagepath = $request->file('photo')->store('public/hotel/photo');
				$fileName = basename($storagepath);
				unlink('storage/hotel/photo/' . $hotel->photo);
				$hotel->photo = $fileName;
			}

			if ($request->hasFile('banner')) {
				$storagepath = $request->file('banner')->store('public/hotel/banner');
				$fileName = basename($storagepath);
				unlink('storage/hotel/banner/' . $hotel->banner);
				$hotel->banner = $fileName;
			}
			$hotel->name = $request->name;
			$hotel->entire_place = $request->entire_place;
			$hotel->price = $request->price;
			$hotel->status = $request->status;
			$hotel->room_details = $request->room_details;
			$hotel->allow = $request->allow;
			$hotel->policy = $request->policy;
			$hotel->map = $request->map;
			$hotel->meta_title = $request->meta_title;
			$hotel->meta_keywords = $request->meta_keywords;
			$hotel->meta_description = $request->meta_description;
			$hotel->save();
			$hotel_id = $hotel->id;
			$amenity_hotels = AmenityHotel::where('hotel_id', $hotel_id)->delete();
			foreach ($request->amenity as $amenity) {
				$amenity_hotels = new AmenityHotel;
				$amenity_hotels->amenity_id = $amenity;
				$amenity_hotels->hotel_id = $hotel_id;
				$amenity_hotels->save();
			}

			return response()->json(['success' => true, 'status' => 'success', 'message' => 'Hotel Information Update Successfully.', 'goto' => route('admin.hotel')]);

		}

	}

	public function view(Request $request, $id) {
		if ($request->ajax()) {
			$hotel = Hotel::find($id);
			return view('admin.hotel.view', compact('hotel'));
		} else {
			$hotel = Hotel::findOrFail($id);
			$latest = Hotel::take(4)->latest()->get();
			return view('fontend.stay', compact('hotel', 'latest'));
		}
	}

	public function delete(Request $request, $id) {
		if ($request->ajax()) {
			$hotel = Hotel::find($id);
			$hotel->delete();
			if ($hotel) {
				return response()->json(['success' => true, 'status' => 'success', 'message' => 'Hotel Information Deleted Successfully.', 'goto' => route('admin.hotel')]);
			}
		}
	}
}
