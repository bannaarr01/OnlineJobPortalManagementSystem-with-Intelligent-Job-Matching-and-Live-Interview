<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        //----Only verified seekers have access to the below.
        $this->middleware(['seeker', 'verified']);
    }

    //---View Profile Page---
    public function index()
    {
        return view('profile.index');
    }

    //---Store current login profile details in db---
    public function store(Request $request)
    {
        //To Validate
        $this->validate($request, [
            'address' => 'required',
            'bio' => 'required|min:20',
            'experience' => 'required|min:20',
            'phone_number' => 'required|min:11|numeric',
            'gender' => 'nullable'
        ]);

        //---Get Current User that Logged in---
        $user_id = auth()->user()->id;

        //---Query To update the current user that logged in---
        Profile::where('user_id', $user_id)->update([
            'address' => request('address'),
            'experience' => request('experience'),
            'bio' => request('bio'),
            'phone_number' => request('phone_number'),
            'gender' => request('gender')
        ]);
        return redirect()->back()->with('message', 'Profile Successfully Updated !');
    }

    //---update Cover letter---
    public function coverletter(Request $request)
    {
        $this->validate($request, [
            'cover_letter' => 'required|mimes:pdf,doc,docx|max:20000'
        ]);
        $user_id = auth()->user()->id;
        $cover = $request->file('cover_letter')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'cover_letter' => $cover
        ]);
        return redirect()->back()->with('message', 'Cover Letter Successfully Updated !');
    }

    //---Update Resume (2mb)---
    public function resume(Request $request)
    {
        $this->validate($request, [
            'resume' => 'required|mimes:pdf,doc,docx|max:20000'
        ]);
        $user_id = auth()->user()->id;
        $resume = $request->file('resume')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'resume' => $resume
        ]);
        return redirect()->back()->with('message', 'Resume Successfully Updated !');
    }

    //---Update Profile Avatar---
    public function avatar(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'required|mimes:png,jpg,jpeg|max:20000'
        ]);
        $user_id = auth()->user()->id;
        if ($request->hasfile('avatar')) {
            $file = $request->file('avatar');
            //Either jpg or png or any
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/avatar/', $filename);
            Profile::where('user_id', $user_id)->update([
                'avatar' => $filename
            ]);
            return redirect()->back()->with('message', 'Profile Picture Successfully Updated !');

        }

    }

    //---User applied jobs---
    public function applications()
    {
        $applications = DB::table('job_user')
            ->where('user_id', '=', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('job.applications', compact('applications'));
    }


}
