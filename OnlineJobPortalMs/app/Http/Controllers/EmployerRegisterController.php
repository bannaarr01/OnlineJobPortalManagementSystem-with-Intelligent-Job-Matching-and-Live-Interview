<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Company;
use App\Models\User;

class EmployerRegisterController extends Controller
{

    //---Register Employer as user type employer and put in company's db table
    public function employerRegister(Request $request)
    {
        $this->validate($request, [
            'cname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type')
        ]);

        Company::create([
            'user_id' => $user->id,
            'cname' => request('cname'),
            'slug' => str_slug(request('cname'))
        ]);

        //Send email verification link, Verify to complete signup
        $user->sendEmailVerificationNotification();

        return redirect()->back()->with('message', 'Please verify your email by clicking the link sent to your email address');
    }
}
