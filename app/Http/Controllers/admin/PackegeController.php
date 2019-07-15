<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Packege;
use App\Destination;
use App\OneWayPack;
use App\TwoWayPack;
use Illuminate\Support\Facades\Storage;

class PackegeController extends Controller
{
    public function index()
    {
    	$packege =Packege::all();
    	return view('admin.packege.index',compact('packege'));
    }

  public function create()
   {
   	$destination =Destination::all();
   	return view('admin.packege.create',compact('destination'));
   }

   public function one_way()
   {
   	return view('admin.packege.one_way');
   }

   public function two_way()
   {
   	return view('admin.packege.two_way');
   }

    public function store(Request $request)
   {
    if ($request->ajax()) {
      $validator = Validator::make($request->all(), [
         'name' => 'required|string',
         'duration' => 'required|string',
         'one_way_price' => 'required|numeric',
         'two_way_price' => 'required|numeric',
         'destination_id' => 'required',
         'location' => 'required',
         'photo' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',
         'banner' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',

      ]);

      if ($validator->fails()) {
        return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
      }

      $packege =new Packege;
        if($request->hasFile('photo')) {
              $storagepath = $request->file('photo')->store('public/packege/photo');
              $fileName = basename($storagepath);
              $packege->photo = $fileName;
          }

        if($request->hasFile('banner')) {
              $storagepath = $request->file('banner')->store('public/packege/banner');
              $fileName = basename($storagepath);
              $packege->banner = $fileName;
          }
      $packege->name =$request->name;
      $packege->duration =$request->duration;
      $packege->one_way_price =$request->one_way_price;
      $packege->two_way_price =$request->two_way_price;
      $packege->destination_id =$request->destination_id;
      $packege->location =$request->location;
      $packege->description =$request->description;
      $packege->inclusive_of =$request->inclusive_of;
      $packege->not_inclusive_of =$request->not_inclusive_of;
      $packege->booking_info =$request->booking_info;
      $packege->policy =$request->policy;
      $packege->meta_title =$request->meta_title;
      $packege->meta_keywords =$request->meta_keywords;
      $packege->meta_description =$request->meta_description;
      $packege->save();
      $id =$packege->id;
      for ($i=0; $i <count($request->itinary_name1) ; $i++) { 
        $one_way_pack =new OneWayPack;
        $one_way_pack->packege_id =$id;
        $one_way_pack->time1 =$request->time1[$i];
        $one_way_pack->itinary_name1 =$request->itinary_name1[$i];
        $one_way_pack->save();
      }
      for ($j=0; $j <count($request->itinary_name2) ; $j++) { 
        $two_way_pack =new TwoWayPack;
        $two_way_pack->packege_id =$id;
        $two_way_pack->time2 =$request->time2[$j];
        $two_way_pack->itinary_name2 =$request->itinary_name2[$j];
        $two_way_pack->save();
      }
      return response()->json(['success' => true, 'status' => 'success', 'message' => 'Packege Information Add Successfully.','goto'=>route('admin.packege')]);
    }
  }

  //::::::Edit:::::::::
  public function edit($id)
  {
    $destination =Destination::all();
    $packege=Packege::find($id);
    // dd($packege);
    return view('admin.packege.edit',compact('packege','destination'));
  }

  public function update(Request $request,$id)
  {
     if ($request->ajax()) {
      $validator = Validator::make($request->all(), [
         'name' => 'required|string',
         'duration' => 'required|string',
         'one_way_price' => 'required|numeric',
         'two_way_price' => 'required|numeric',
         'destination_id' => 'required',
         'location' => 'required',
         'photo' => 'mimes:jpeg,bmp,png,jpg|max:2000',
         'banner' => 'mimes:jpeg,bmp,png,jpg|max:2000',

      ]);

      if ($validator->fails()) {
        return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
      }

      $packege = Packege::find($id);

      if ($request->hasFile('photo')) {
        $storagepath = $request->file('photo')->store('public/packege/photo');
        $fileName = basename($storagepath);
        $packege->photo = $fileName;

        //if file chnage then delete old one
        $oldFile = $request->get('oldphoto', '');
        if ($oldFile != '') {
          $file_path = "public/packege/photo" . $oldFile;
          Storage::delete($file_path);
        }
      } else {
        $packege->photo = $request->get('oldphoto', '');
      }

      //
      if ($request->hasFile('banner')) {
        $storagepath = $request->file('banner')->store('public/packege/banner');
        $fileName = basename($storagepath);
        $packege->banner = $fileName;

        //if file chnage then delete old one
        $oldFile = $request->get('oldbanner', '');
        if ($oldFile != '') {
          $file_path = "public/packege/banner" . $oldFile;
          Storage::delete($file_path);
        }
      } else {
        $packege->banner = $request->get('oldbanner', '');
      }

      $packege->name =$request->name;
      $packege->duration =$request->duration;
      $packege->one_way_price =$request->one_way_price;
      $packege->two_way_price =$request->two_way_price;
      $packege->destination_id =$request->destination_id;
      $packege->location =$request->location;
      $packege->description =$request->description;
      $packege->inclusive_of =$request->inclusive_of;
      $packege->not_inclusive_of =$request->not_inclusive_of;
      $packege->booking_info =$request->booking_info;
      $packege->policy =$request->policy;
      $packege->meta_title =$request->meta_title;
      $packege->meta_keywords =$request->meta_keywords;
      $packege->meta_description =$request->meta_description;
      $packege->save();

      //::::::::::
      $one =OneWayPack::where('packege_id',$id);
      $delete1 =$one->delete();

      $two =TwoWayPack::where('packege_id',$id);
      $delete2 =$two->delete();
      if ($delete1 && $delete2) {
      for ($i=0; $i <count($request->itinary_name1) ; $i++) { 
        $one_way_pack =new OneWayPack;
        $one_way_pack->packege_id =$id;
        $one_way_pack->time1 =$request->time1[$i];
        $one_way_pack->itinary_name1 =$request->itinary_name1[$i];
        $one_way_pack->save();
      }
      for ($j=0; $j <count($request->itinary_name2) ; $j++) { 
        $two_way_pack =new TwoWayPack;
        $two_way_pack->packege_id =$id;
        $two_way_pack->time2 =$request->time2[$j];
        $two_way_pack->itinary_name2 =$request->itinary_name2[$j];
        $two_way_pack->save();
      }
      }
    return response()->json(['success' => true, 'status' => 'success', 'message' => 'Packege Information Update Successfully.','goto'=>route('admin.packege')]);
    }
  }

  //::::::view::::::::::-------
  public function view($id)
  {
    $packege= Packege::find($id);
    return view('admin.packege.view',compact('packege'));
  }

  //::::::delete::::::::
  public function delete(Request $request, $id) {
    if ($request->ajax()) {
      $packege = Packege::find($id);
      unlink('storage/packege/photo/'.$packege->photo);
      unlink('storage/packege/banner/'.$packege->banner);
      $packege->delete();
      if ($packege) {
         return response()->json(['success' => true, 'status' => 'success', 'message' => 'Packege Information Delete Successfully.']);
      }
    }
  }
}
