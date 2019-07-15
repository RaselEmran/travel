<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Api;

class settingController extends Controller
{
   public function index()
   {

   	return view('admin.setting.index');
   }

   public function api_store(Request $request)
   {
    if ($request->ajax()) {
    	$this->setting_store($request->all());
    	return response()->json(['success' => true, 'status' => 'success', 'message' => 'Api Set Successfully.', 'goto' => route('admin.api')]);

    }
   }

   protected function setting_store(array $data)
   {
   	if (isset($data)) {
   		foreach ($data as $key => $value) {
   			$check =Api::where('key',$key)->first();
   			if ($check) {
   			$check->key =$key;
   			$check->value=$value;
   			$check->save();
   			}
   			else
   			{
   				$api = Api::create([
   				'key'=>$key,
   				'value'=>$value
   				]);
   			}
   			
   		}
   	}
   }
}
