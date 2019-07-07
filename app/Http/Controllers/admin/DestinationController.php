<?php

namespace App\Http\Controllers\admin;

use App\Destination;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Validator;

class DestinationController extends Controller {
	public function index() {
		$destination = Destination::all();
		return view('admin.destination.index', compact('destination'));
	}

	public function create() {
		return view('admin.destination.create');
	}

	public function store(Request $request) {
		if ($request->ajax()) {
			$validator = Validator::make($request->all(), [
				'name' => 'required|string',
				'heading' => 'required|string',
				'photo' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',
				'banner' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',

			]);

			if ($validator->fails()) {
				return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
			}
			$destination = new Destination;
			if ($request->hasFile('photo')) {
				$storagepath = $request->file('photo')->store('public/destination/photo');
				$fileName = basename($storagepath);
				$destination->photo = $fileName;
			}

			if ($request->hasFile('banner')) {
				$storagepath = $request->file('banner')->store('public/destination/banner');
				$fileName = basename($storagepath);
				$destination->banner = $fileName;
			}
			$destination->name = $request->name;
			$destination->heading = $request->heading;
			$destination->slug = str_slug($request->heading);
			$destination->pkg_heading = $request->pkg_heading;
			$destination->pkg_subheading = $request->pkg_subheading;
			$destination->pkg_detailsheading = $request->pkg_detailsheading;
			$destination->pkg_details_subheading = $request->pkg_details_subheading;
			$destination->short_description = $request->short_description;
			$destination->introduction = $request->introduction;
			$destination->experience = $request->experience;
			$destination->hotel = $request->hotel;
			$destination->transportation = $request->transportation;
			$destination->culture = $request->culture;
			$destination->meta_title = $request->meta_title;
			$destination->meta_keywords = $request->meta_keywords;
			$destination->meta_description = $request->meta_description;
			$destination->save();

			return response()->json(['success' => true, 'status' => 'success', 'message' => 'Destination Information Add Successfully.', 'goto' => route('admin.destination')]);
		}
	}

	public function edit($id) {
		$destination = Destination::find($id);
		return view('admin.destination.edit', compact('destination'));
	}

	public function update(Request $request) {
		if ($request->ajax()) {
			$validator = Validator::make($request->all(), [
				'name' => 'required|string',
				'heading' => 'required|string',
				'photo' => 'mimes:jpeg,bmp,png,jpg|max:2000',
				'banner' => 'mimes:jpeg,bmp,png,jpg|max:2000',

			]);

			if ($validator->fails()) {
				return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
			}
			$destination = Destination::find($request->id);
			if ($request->hasFile('photo')) {
				$storagepath = $request->file('photo')->store('public/destination/photo');
				$fileName = basename($storagepath);
				$destination->photo = $fileName;

				//if file chnage then delete old one
				$oldFile = $request->get('oldphoto', '');
				if ($oldFile != '') {
					$file_path = "public/destination/photo" . $oldFile;
					Storage::delete($file_path);
				}
			} else {
				$destination->photo = $request->get('oldphoto', '');
			}

			//
			if ($request->hasFile('banner')) {
				$storagepath = $request->file('banner')->store('public/destination/banner');
				$fileName = basename($storagepath);
				$destination->banner = $fileName;

				//if file chnage then delete old one
				$oldFile = $request->get('oldbanner', '');
				if ($oldFile != '') {
					$file_path = "public/destination/banner" . $oldFile;
					Storage::delete($file_path);
				}
			} else {
				$destination->banner = $request->get('oldbanner', '');
			}

			$destination->name = $request->name;
			$destination->heading = $request->heading;
			$destination->slug = str_slug($request->heading);
			$destination->pkg_heading = $request->pkg_heading;
			$destination->pkg_subheading = $request->pkg_subheading;
			$destination->pkg_detailsheading = $request->pkg_detailsheading;
			$destination->pkg_details_subheading = $request->pkg_details_subheading;
			$destination->short_description = $request->short_description;
			$destination->introduction = $request->introduction;
			$destination->experience = $request->experience;
			$destination->hotel = $request->hotel;
			$destination->transportation = $request->transportation;
			$destination->culture = $request->culture;
			$destination->meta_title = $request->meta_title;
			$destination->meta_keywords = $request->meta_keywords;
			$destination->meta_description = $request->meta_description;
			$destination->save();

			return response()->json(['success' => true, 'status' => 'success', 'message' => 'Destination Information Update Successfully.', 'goto' => route('admin.destination')]);

		}

	}

	public function view(Request $request, $id) {
		if ($request->ajax()) {
			$destination = Destination::find($id);
			return view('admin.destination.view', compact('destination'));
		}
	}

	public function delete(Request $request, $id) {
		if ($request->ajax()) {
			$destination = Destination::find($id);
			$destination->delete();
			if ($destination) {
				return true;
			}
		}
	}
}
