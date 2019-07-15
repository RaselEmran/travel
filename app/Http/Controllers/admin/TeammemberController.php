<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TeamMember;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class TeammemberController extends Controller
{
   public function index()
   {
   	$member =TeamMember::all();
   	return view('admin.member.index',compact('member'));
   }

   public function create()
   {
   	return view('admin.member.create');
   }

   public function store(Request $request)
   {

   	  if ($request->ajax()) {
      $validator = Validator::make($request->all(), [
         'name' => 'required|string',
         'designation' => 'required|string',
         'photo' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',
         'email'=>'sometimes|nullable|email'

      ]);

      if ($validator->fails()) {
        return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
      }

      $member =new TeamMember;
      if($request->hasFile('photo')) {
              $storagepath = $request->file('photo')->store('public/member');
              $fileName = basename($storagepath);
              $member->photo = $fileName;
          }
       $member->name=$request->name;   
       $member->designation=$request->designation;   
       $member->details=$request->details;   
       $member->phone=$request->phone;   
       $member->mobile=$request->mobile;   
       $member->facebook=$request->facebook;   
       $member->youtube=$request->youtube;   
       $member->twiter=$request->twiter;   
       $member->linkedin=$request->linkedin;   
       $member->google_plus=$request->google_plus;   
       $member->save();

       return response()->json(['success' => true, 'status' => 'success', 'message' => 'Team Member Add Successfully ','goto'=>route('admin.team-member')]);
  	}
   }

   public function edit($id)
   {
   	$member =TeamMember::find($id);
   	return view('admin.member.edit',compact('member'));
   }

   public function upadte(Request $request)
   {
   	   $validator = Validator::make($request->all(), [
         'name' => 'required|string',
         'designation' => 'required|string',
         'photo' => 'mimes:jpeg,bmp,png,jpg|max:2000',
         'email'=>'sometimes|nullable|email'

      ]);

      if ($validator->fails()) {
        return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
      }

      $member =TeamMember::find($request->id);
        if ($request->hasFile('photo')) {
        $storagepath = $request->file('photo')->store('public/member');
        $fileName = basename($storagepath);
        $member->photo = $fileName;

        //if file chnage then delete old one
        $oldFile = $request->get('oldphoto', '');
        if ($oldFile != '') {
          $file_path = "public/member" . $oldFile;
          Storage::delete($file_path);
        }
      } else {
        $member->photo = $request->get('oldphoto', '');
      }

        $member->name=$request->name;   
       $member->designation=$request->designation;   
       $member->details=$request->details;   
       $member->phone=$request->phone;   
       $member->mobile=$request->mobile;   
       $member->facebook=$request->facebook;   
       $member->youtube=$request->youtube;   
       $member->twiter=$request->twiter;   
       $member->linkedin=$request->linkedin;   
       $member->google_plus=$request->google_plus;   
       $member->save();

       return response()->json(['success' => true, 'status' => 'success', 'message' => 'Team Member Update Successfully ','goto'=>route('admin.team-member')]);
   }

   public function delete(Request $request,$id)
   {

   	  $member = TeamMember::find($id);
      unlink('storage/member/'.$member->photo);
      $member->delete();
      if ($member) {
         return response()->json(['success' => true, 'status' => 'success', 'message' => 'Team Member Delete Successfully.']);
      }
   }
}
