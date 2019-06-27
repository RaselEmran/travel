<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Auth;
use App\User;
class FacebookController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook($service)
    {
        return Socialite::driver($service)->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback($service)
    {
        try {
            $user = Socialite::driver($service)->user();
            $create['name'] = $user->getName();
            $create['email'] = $user->getEmail();
            $create['facebook_id'] = $user->getId();

            $userModel = User::firstOrCreate($create);
            Auth::loginUsingId($userModel->id);

            return redirect('/dashboard#');

        } catch (Exception $e) {

            return redirect('auth/facebook');

        }
    }
}
