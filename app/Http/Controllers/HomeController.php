<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Packege;
use App\News;
use App\Pages;
use App\TeamMember;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	// public function __construct()
	// {
	//     $this->middleware('auth');
	// }

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {
		$data['packege'] = Packege::take(8)->latest()->get();
		$data['latestpac'] = Packege::latest()->take(4)->get();
		$data['hotel'] = Hotel::take(8)->latest()->get();
		$data['member']=TeamMember::take(6)->latest()->get();
		return view('fontend.main', compact('data'));
	}

	public function sign_up_option() {
		return view('fontend.sign_up_option');
	}

	public function sign_up() {
		return view('fontend.sign_up');
	}

	public function login() {
		return view('fontend.login');
	}


	public function news()
	{
		$news =News::paginate(5);
		return view('fontend.news',compact('news'));
	}

	public function news_details($slug,$id)
	{
		$details =News::find($id);
		return view('fontend.news_details',compact('details'));
	}

	public function about_us()
	{
		$about = Pages::where('key', 'about')->select('key','value')->first();
		$aboutinfo =null;
		if ($about) {
   	 	$aboutinfo=json_decode($about->value);
   	 	return view('fontend.about_us',compact('aboutinfo'));
   	 }
	}

}
