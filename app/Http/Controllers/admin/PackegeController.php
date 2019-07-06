<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Packege;
use App\Destination;

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
}
