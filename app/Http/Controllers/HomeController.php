<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Packege;

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

}
