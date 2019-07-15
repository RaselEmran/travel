<?php

namespace App\Http\Controllers;

use App\PackageReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PackageReviewController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		if ($request->ajax()) {
			$validator = Validator::make($request->all(), [
				'review' => 'required|string',
				'pakcage_id' => 'required',
			]);

			if ($validator->fails()) {
				return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
			}
			$user_id = auth()->user()->id;
			$hotel_review = new PackageReview();
			$hotel_review->user_id = $user_id;
			$hotel_review->pakcage_id = $request->pakcage_id;
			$hotel_review->rate = $request->rate;
			$hotel_review->review = $request->review;
			$hotel_review->status = 'approved';
			$hotel_review->save();
			return response()->json(['success' => true, 'status' => 'success', 'message' => 'Review Done Successfull']);

		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
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
}
