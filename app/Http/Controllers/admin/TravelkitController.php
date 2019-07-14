<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\TravelKit;
use App\ConfirmKit;
class TravelkitController extends Controller
{
  public function index(){

  	$kits =TravelKit::all();
  	return view('admin.travelkit.index',compact('kits'));
  }

  public function create()
  {
  	return view('admin.travelkit.create');
  }

  public function store(Request $request)
  {
  	  if ($request->ajax()) {
       $validator = Validator::make($request->all(), [
         'name' => 'required|string',
         'type' => 'required|string',
         'quantity' => 'required|numeric',
         'price' => 'required|numeric',

      ]);

      if ($validator->fails()) {
        return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
      }

      $kits = new TravelKit;
      $kits->type =$request->type;
      $kits->name =$request->name;
      $kits->quantity =$request->quantity;
      $kits->price =$request->price;
      $kits->status =$request->status;
      $kits->save();
      return response()->json(['success' => true, 'status' => 'success', 'message' => 'Travel Kit Add Successfully.','goto'=>route('admin.travelkit')]);
  }
}

	public function edit($id)
	{
		$kit=TravelKit::find($id);
		return view('admin.travelkit.edit',compact('kit'));
	}

	public function update(Request $request)
	{
	 if ($request->ajax()) {
       $validator = Validator::make($request->all(), [
         'name' => 'required|string',
         'type' => 'required|string',
         'quantity' => 'required|numeric',
         'price' => 'required|numeric',

      ]);

      if ($validator->fails()) {
        return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
      }

      $kits = TravelKit::find($request->id);
      $kits->type =$request->type;
      $kits->name =$request->name;
      $kits->quantity =$request->quantity;
      $kits->price =$request->price;
      $kits->status =$request->status;
      $kits->save();
      return response()->json(['success' => true, 'status' => 'success', 'message' => 'Travel Kit Update Successfully.','goto'=>route('admin.travelkit')]);
	  }
		
	}

	public function delete(Request $request,$id)
	{
		if ($request->ajax()) {
			$kit =TravelKit::find($id);
			$kit->delete();

		if ($kit) {
         return response()->json(['success' => true, 'status' => 'success', 'message' => 'Travel Kit Delete Successfully.']);
      		}

		}
	}

  //booking kit::::
  public function order_kit()
  {
    $kits =ConfirmKit::all();
    return view('admin.travelkit.booking',compact('kits'));
  }

  public function order_details($id)
  {
    $kit =ConfirmKit::find($id);
    return view('admin.travelkit.order_details',compact('kit'));
  }
}
