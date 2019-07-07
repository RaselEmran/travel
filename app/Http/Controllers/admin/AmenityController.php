<?php

namespace App\Http\Controllers\admin;

use App\Amenity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AmenityController extends Controller {
	public function index() {
		$amenity = Amenity::all();
		return view('admin.amenity.index', compact('amenity'));
	}

	public function create() {
		return view('admin.amenity.create');
	}

	public function store(Request $request) {
		if ($request->ajax()) {
			$validator = Validator::make($request->all(), [
				'name' => 'required|string',
				'icon' => 'required|string',
			]);

			if ($validator->fails()) {
				return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
			}
			$amenity = new Amenity;
			$amenity->name = $request->name;
			$amenity->icon = $request->icon;
			$amenity->status = $request->status;
			$amenity->save();

			return response()->json(['success' => true, 'status' => 'success', 'message' => 'Amenity Information Add Successfully.', 'goto' => route('admin.amenity')]);
		}
	}

	public function edit($id) {
		$amenity = Amenity::find($id);
		return view('admin.amenity.edit', compact('amenity'));
	}

	public function update(Request $request) {
		if ($request->ajax()) {
			$validator = Validator::make($request->all(), [
				'name' => 'required|string',
				'icon' => 'required|string',
			]);

			if ($validator->fails()) {
				return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
			}
			$amenity = Amenity::find($request->id);

			$amenity->name = $request->name;
			$amenity->icon = $request->icon;
			$amenity->status = $request->status;
			$amenity->save();

			return response()->json(['success' => true, 'status' => 'success', 'message' => 'Amenity Information Update Successfully.', 'goto' => route('admin.amenity')]);

		}

	}

	public function view(Request $request, $id) {
		if ($request->ajax()) {
			$amenity = Amenity::find($id);
			return view('admin.amenity.view', compact('amenity'));
		}
	}

	public function delete(Request $request, $id) {
		if ($request->ajax()) {
			$amenity = Amenity::find($id);
			$amenity->delete();
			if ($amenity) {
				return response()->json(['success' => true, 'status' => 'success', 'message' => 'Amenity Information Deleted Successfully.', 'goto' => route('admin.amenity')]);
			}
		}
	}
}
