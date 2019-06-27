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
// Route::get('/', function () {
//     return view('welcome');
// });

     // Auth::routes();
 $this->get('/admin/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
 $this->post('admin/login', 'AdminAuth\LoginController@login')->name('admin.login');
  $this->post('admin/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'admin','middleware' => ['auth:admin']], function () {

 Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

  });		
// Route::get('/home', 'HomeController@index')->name('home');

 $this->post('/login', 'Auth\LoginController@login')->name('login');
 $this->post('logout', 'Auth\LoginController@logout')->name('logout');
 $this->post('register', 'Auth\RegisterController@register')->name('register');

Route::get('/','HomeController@index')->name('home.index');
Route::get('/sign-up-option','HomeController@sign_up_option')->middleware(['guest'])->name('sign-up-option');
Route::get('/sign-up','HomeController@sign_up')->middleware(['guest'])->name('sign-up');
Route::get('/dashboard','DashboardController@index')->name('dashboard');
Route::post('/dashboard','DashboardController@profile_update')->name('dashboard.store');

Route::post('/change-pass','DashboardController@change_pass')->name('change-pass');

Route::get('/login','HomeController@login')->middleware(['guest'])->name('login');

Route::get('facebook', function () {
    return view('home');
});
Route::get('auth/{service}', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/{service}/callback', 'Auth\FacebookController@handleFacebookCallback');