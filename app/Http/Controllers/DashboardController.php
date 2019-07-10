<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use Validator;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$user_id = Auth::user()->id;
        $info =User::find($user_id);
    	return view('fontend.profile.dashboard',compact('info'));
    }

    public function profile_update(Request $request)
    {
     if ($request->ajax()) {
      $validator = Validator::make($request->all(), [
        'enb_email' => 'sometimes|nullable|email',

      ]);

      if ($validator->fails()) {
        return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
      }
      $user_id = Auth::user()->id;
      $user =User::find($user_id);
      $user->first_name=$request->first_name;
      $user->last_name=$request->last_name;
      $user->gender=$request->gender;
      $user->country=$request->country;
      $user->state=$request->state;
      $user->country_code=$request->country_code;
      $user->phn_number=$request->phn_number;
      $user->enb_email=$request->enb_email;
      $user->save();

       if ($user) {
        return response()->json(['success' => true, 'status' => 'success', 'message' => 'Profile Update Successfully.']);
      }

    }

    }

    public function change_pass(Request $request)
    {
     if ($request->ajax()) {
       $validator = Validator::make($request->all(), [
        'new_pass' => 'required|confirmed|min:6',
        // 'confirm_pass' => 'required|min:6'

      ]);

      if ($validator->fails()) {
        return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
      }

      $user_id = Auth::user()->id;
      $user =User::find($user_id);
      $user->new_pass=Hash::make($request->new_pass);

     if ($user) {
        return response()->json(['success' => true, 'status' => 'success', 'message' => 'Password Change Successfully.']);
      }
    }
}

}
