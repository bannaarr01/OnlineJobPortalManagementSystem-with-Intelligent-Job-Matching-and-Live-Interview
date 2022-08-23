<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Job;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Applies to verified Log-in
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //---get all d job saved by the current logged-in user
        if (Auth::user()->user_type == 'seeker') {
            $jobs = Auth::user()->favourites;
            return view('home', compact('jobs'));
        }

        //---If the User is Employer, Go to Create a Job
        if (auth::user()->user_type == 'employer') {
            return redirect()->to('/company/create');
        }

        //--If the user is Admin, then go to admin dashboard
        if (Auth::check() && Auth::user()->user_type == 'siteadmin') {
            return redirect('/admindashboard');
        }

    }
}
