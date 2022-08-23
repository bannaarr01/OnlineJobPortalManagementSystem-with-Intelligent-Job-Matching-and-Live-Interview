<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Profile;
use Auth;
use Exception;

class SocialLoginController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    //---Login user if already used fb or create account---
    public function loginWithFacebook()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
            $user = User::where('fb_id', $facebookUser->id)->first();
            if ($user) {
                Auth::login($user);
                return redirect('/home');
            } else {
                $createUser = User::create([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'fb_id' => $facebookUser->id,
                    'user_type' => 'seeker'
                ]);
                Profile::create([
                    'user_id' => $createUser->id,
                ]);

                Auth::login($createUser);
                return redirect('/');
            }

        } catch (Exception $exception) {
            return redirect()->back()->with('err_message', 'Sorry, Something went wrong. Please try again later');
        }

    }

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    //---Login user if already used gmail or create account---
    public function loginWithGoogle()
    {
        try {

            $googleUser = Socialite::driver('google')->user();
            $user = User::where('google_id', $googleUser->id)->first();
            if ($user) {
                Auth::login($user);
                return redirect('/home');
            } else {
                $createUser = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'user_type' => 'seeker'
                ]);
                Profile::create([
                    'user_id' => $createUser->id,
                ]);

                Auth::login($createUser);
                return redirect('/');
            }

        } catch (Exception $exception) {
            //    dd($exception->getMessage());
            return redirect()->back()->with('err_message', 'Sorry, Something went wrong. Please try again later');
        }

    }


}
