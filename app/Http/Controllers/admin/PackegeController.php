<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Packege;
use App\Destination;
use App\PackegeItinary;
use App\PackegeOption;

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

   public function get_packege_option(Request $request)
   {
   	$row_index =$request->row_index;
   	return view('admin.packege.get_packege_option',compact('row_index'));
   }

   public function get_variation_value_row(Request $request)
   {
   	$variation_id =$request->variation_id;
   	$row =$request->row;
   	return view('admin.packege.get_variation_value_row',compact('variation_id','row'));
   }

    public function store(Request $request)
   {
    if ($request->ajax()) {
      $validator = Validator::make($request->all(), [
         'name' => 'required|string',
         'duration' => 'required|string',
         'per_persion_price' => 'required|numeric',
         'destination_id' => 'required',
         'location' => 'required',
         // 'option_name' => 'required',
         // 'start_date' => 'required',
         // 'end_date' => 'required',
         // 'option_price' => 'required',
         // 'itinary_date' => 'required',
         // 'itinary_name' => 'required',
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
      $packege->per_persion_price =$request->per_persion_price;
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
      $variable =$request->get('packege_variation');
      for ($i=0; $i <count($variable) ; $i++) { 
        $packegeoption =new PackegeOption;
        $packegeoption->packege_id =$id;
        $packegeoption->option_name =$variable[$i]['option_name'];
        $packegeoption->start_date =$variable[$i]['start_date'];
        $packegeoption->end_date =$variable[$i]['end_date'];
        $packegeoption->option_price =$variable[$i]['option_price'];
        $packegeoption->save();
        $option_id =$packegeoption->id;
        for ($j=0; $j <count($variable[$i]['variation']) ; $j++) { 
          $packegeitinary =new PackegeItinary;
          $packegeitinary->packege_option_id =$option_id;
          $packegeitinary->itinary_date =$variable[$i]['variation'][$j]['itinary_date'];
          $packegeitinary->itinary_name =$variable[$i]['variation'][$j]['itinary_name'];
          $packegeitinary->save();
        }
      }
      return response()->json(['success' => true, 'status' => 'success', 'message' => 'Packege Information Add Successfully.','goto'=>route('admin.packege.index')]);
    }
  }
}
