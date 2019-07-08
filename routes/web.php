<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Route::get('/admin', function () {
	return redirect('/admin/login');
});

// Auth::routes();
$this->get('/admin/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
$this->post('admin/login', 'AdminAuth\LoginController@login')->name('admin.login');
$this->post('admin/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

// Auth::routes();
$this->get('/admin/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
$this->post('admin/login', 'AdminAuth\LoginController@login')->name('admin.login');
$this->post('admin/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'admin', 'middleware' => ['auth:admin']], function () {
	//profile
	Route::get('/profile', 'DashboardController@profile')->name('profile');
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

	Route::get('/destination', 'DestinationController@index')->name('destination');
	Route::get('/destination/create', 'DestinationController@create')->name('destination.create');
	Route::post('/destination/store', 'DestinationController@store')->name('destination.store');
	Route::get('/destination/edit/{id}', 'DestinationController@edit')->name('destination.edit');
	Route::post('/destination/edit', 'DestinationController@update')->name('destination.update');
	Route::get('/destination/view/{id}', 'DestinationController@view')->name('destination.view');
	Route::get('/destination/delete/{id}', 'DestinationController@delete')->name('destination.delete');
	//packege
	Route::get('/packege', 'PackegeController@index')->name('packege');
	Route::get('/packege/create', 'PackegeController@create')->name('packege.create');
	//.....get
	Route::get('/one-way-itinary','PackegeController@one_way');
	Route::get('/two-way-itinary','PackegeController@two_way');
	Route::post('/packege/store', 'PackegeController@store')->name('packege.store');
	Route::get('/packege/edit/{id}', 'PackegeController@edit')->name('packege.edit');
	Route::post('/packege/edit', 'PackegeController@update')->name('packege.update');
	Route::post('/packege/edit/{id}', 'PackegeController@update')->name('packege.update');
	Route::get('/packege/view/{id}', 'PackegeController@view')->name('packege.view');
	Route::get('/packege/delete/{id}', 'PackegeController@delete')->name('packege.delete');

/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 *:::::::::::::::::::::::::::::::::::::Route From Tariqul Islam ::::::::::::::::::::::::::::::::::::::::::::::
 *::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 */
	Route::get('/amenity', 'AmenityController@index')->name('amenity');
	Route::get('/amenity/create', 'AmenityController@create')->name('amenity.create');
	Route::post('/amenity/store', 'AmenityController@store')->name('amenity.store');
	Route::get('/amenity/edit/{id}', 'AmenityController@edit')->name('amenity.edit');
	Route::post('/amenity/edit', 'AmenityController@update')->name('amenity.update');
	Route::get('/amenity/view/{id}', 'AmenityController@view')->name('amenity.view');
	Route::get('/amenity/delete/{id}', 'AmenityController@delete')->name('amenity.delete');

	Route::view('/icon', 'admin.icon')->name('icon');
	//07-07-19

	Route::get('/hotel', 'HotelController@index')->name('hotel');
	Route::get('/hotel/create', 'HotelController@create')->name('hotel.create');
	Route::post('/hotel/store', 'HotelController@store')->name('hotel.store');
	Route::get('/hotel/edit/{id}', 'HotelController@edit')->name('hotel.edit');
	Route::post('/hotel/edit', 'HotelController@update')->name('hotel.update');
	Route::get('/hotel/view/{id}', 'HotelController@view')->name('hotel.view');
	Route::get('/hotel/delete/{id}', 'HotelController@delete')->name('hotel.delete');

/* ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 * :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 * ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 */
});

// Route::get('/home', 'HomeController@index')->name('home');

$this->post('/login', 'Auth\LoginController@login')->name('login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');
$this->post('register', 'Auth\RegisterController@register')->name('register');

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/sign-up-option', 'HomeController@sign_up_option')->middleware(['guest'])->name('sign-up-option');
Route::get('/sign-up', 'HomeController@sign_up')->middleware(['guest'])->name('sign-up');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::post('/dashboard', 'DashboardController@profile_update')->name('dashboard.store');

Route::post('/change-pass', 'DashboardController@change_pass')->name('change-pass');

Route::get('/login', 'HomeController@login')->middleware(['guest'])->name('login');

Route::get('facebook', function () {
	return view('home');
});
Route::get('auth/{service}', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/{service}/callback', 'Auth\FacebookController@handleFacebookCallback');

//:::::::::::::booking:::::::::::::::
Route::get('/explore','ExperienceBookingController@index')->name('explore');
Route::get('/experience-booking/{id}','ExperienceBookingController@experience_booking')->name('experience-booking');


Route::get('stay/{id}', 'admin\HotelController@view')->name('hotel.show');

