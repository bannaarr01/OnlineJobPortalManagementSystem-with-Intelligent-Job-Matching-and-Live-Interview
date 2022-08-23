<?php

namespace App\Http\Controllers;

use App\Mail\Approved;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Company;
use App\Models\Category;
use App\Http\Requests\JobPostRequest;
use Auth;
use App\Models\Post;
use App\Models\Testimonial;
use App\ContentBasedRec;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Session\Session;

// use App\CollaborativeFiltering;


class JobController extends Controller
{
    public function __construct()
    {   //verified employers middleware protect all the below routes except this specified array
        $this->middleware(['employer', 'verified'], ['except' => array('index', 'show', 'apply', 'allJobs', 'searchJobs', 'reportJob')]);
    }

    //---Index page with latest jobs---//---With Live Blog Posts
    //---List of Job Categories--- //-- With Testimonial--//---with companies
    public function index()
    {
        $jobs = Job::latest()->limit(5)->where('status', 1)->get();
        $categories = Category::whereHas('jobs')->with('jobs')->limit(6)->get();
        $posts = Post::where('status', 1)->get();
        $testimonials = Testimonial::all();
        $companies = Company::latest()->limit(8)->get();

        return view('welcome', compact('jobs', 'companies', 'categories', 'posts', 'testimonials'));
    }

    //----Show All Recommended Jobs------
    public function show($id, Job $job)
    {
        $jobId = Job::find($id);
        $argTitle = $job->title;
        //---Set the job title global to be used as arg(Search term) for the recommender sys
        config()->set('argTitle', $argTitle);
        //---Store the view from logged-in user and check if already stored to avoid duplicate
        if (Auth::check() && Auth::user()->user_type == 'seeker') {
            if (!$jobId->checkViewed()) {
                $jobId->job_user_action()->attach(Auth::user()->id);
                $jobId->add_favorites_to_interraction()->attach(auth()->user()->id, ['eventType' => 'VIEW', 'job_title' => $argTitle]);
            }
        }
        //----Run and Get the result of the recommendation
        $jobRecommendations = ContentBasedRec::getRecommendations();
        $recommendations = json_decode($jobRecommendations, true);

        return view('job.show', compact('job', 'recommendations'));

    }

    //----Create Job by employer----
    public function create()
    {
        return view('job.create');
    }

    //-----Store Job to db------
    //-----Validate form fields using JobPostRequest (\App\Http\Requests\JobPostRequest)
    public function store(JobPostRequest $request)
    {
        $user_id = auth()->user()->id;
        $company = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;
        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'description' => request('description'),
            'roles' => request('roles'),
            'category_id' => request('category_id'),
            'position' => request('position'),
            'address' => request('address'),
            'state' => request('state'),
            'type' => request('type'),
            'experience' => request('experience'),
            'qualification' => request('qualification'),
            'number_of_vacancy' => request('number_of_vacancy'),
            'salary' => request('salary'),
            'status' => request('status'),
            'last_date' => request('last_date')
        ]);
        return redirect()->back()->with('message', 'Job Posted Successfully !');
    }

    //----view posted job----
    public function myJob()
    {
        $jobs = Job::where('user_id', auth()->user()->id)->paginate(8);
        return view('job.myjob', compact('jobs'));
    }

    //------Edit Posted Job----
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('job.edit', compact('job'));
    }

    //------Delete Posted Job-------
    public function deleteMyJob($id)
    {
        $job = Job::find($id);
        $job->delete();
        return redirect()->back()->with('message', 'Job Successfully Deleted !');
    }

    //-------Update Edited posted job----------
    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        //request all the form fields at once n update
        $job->update($request->all());
        return redirect()->back()->with('message', 'Job Successfully Updated !');
    }

    //-------Apply for Job and Save the Event "APPLIED"-----
    public function apply(Request $Request, $id)
    {
        $jobId = Job::find($id);
        $jobTitle = $jobId->title;
        $jobId->users()->attach(Auth::user()->id);
        //---Save the Event
        $jobId->add_favorites_to_interraction()->attach(auth()->user()->id, ['eventType' => 'APPLIED', 'job_title' => $jobTitle]);

        //--if job has been saved and you applied, then remove from saved list
        if ($jobId->checkSaved()) {
            $jobId->favourites()->detach(auth()->user()->id);
        }
        return redirect()->back()->with('message', 'Application Sent Successfully !');
    }

    //---List of applicants---
    public function applicant()
    {
        $applicants = Job::has('users')->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(1);

        return view('job.applicants', compact('applicants'));
    }

    //---Approved Job---
    public function approveAppliedJob($id, $uid)
    {
        DB::table('job_user')
            ->where('user_id', '=', $uid)
            ->where('job_id', '=', $id)
            ->update(['status' => 1]);

        $sender = User::where('id', auth()->user()->id)->first();
        $applicantdetail = User::where('id', $uid)->first();
        $jobdetail = Job::where('id', $id)->first();

        //---Data used in the markdown to send email to the user
        $approvedData = array(
            'sender_name' => $sender->company->cname,
            'sender_email' => $sender->email,
            'recipient_name' => $applicantdetail->name,
            'recipient_email' => $applicantdetail->email,
            'job_position' => $jobdetail->position,
            'job_title' => $jobdetail->title,
        );

        //---Send email to the user to be aware of the approval---
        try {
            //  Mail::to($applicantdetail->email)->send(new Approved($approvedData));
            \Illuminate\Support\Facades\Mail::to($applicantdetail->email)->send(new \App\Mail\Approved($approvedData));
        } catch (\Exception $e) {
            return redirect()->back()->with('err_message', 'Sorry, Applicant could not be notified with an email for this Approved status update');

        }

        return redirect()->back()->with('message', 'Application approved updated successfully!');
    }


    //---Declined Job---
    public function declineAppliedJob($id, $uid)
    {
        DB::table('job_user')
            ->where('user_id', '=', $uid)
            ->where('job_id', '=', $id)
            ->update(['status' => 3]);

        $sender = User::where('id', auth()->user()->id)->first();
        $applicantdetail = User::where('id', $uid)->first();
        $jobdetail = Job::where('id', $id)->first();

        //---Data used in the markdown to send email to the user
        $declinedData = array(
            'sender_name' => $sender->company->cname,
            'sender_email' => $sender->email,
            'recipient_name' => $applicantdetail->name,
            'recipient_email' => $applicantdetail->email,
            'job_position' => $jobdetail->position,
            'job_title' => $jobdetail->title,
        );

        //---Send email to the user to be aware of the rejected application---
        try {
            \Illuminate\Support\Facades\Mail::to($applicantdetail->email)->send(new \App\Mail\Declined($declinedData));
        } catch (\Exception $e) {
            return redirect()->back()->with('err_message', 'Sorry, Applicant could not be notified with an email for this Declined status update');

        }

        return redirect()->back()->with('message', 'Application declined updated successfully!');
    }

    //---Delete Job Application---
    public function deleteAppliedJob($id, $uid)
    {
        DB::table('job_user')
            ->where('user_id', '=', $uid)
            ->where('job_id', '=', $id)
            ->delete();
        return redirect()->back()->with('message', 'Application deleted successfully!');
    }

    //---AllSearch Preference----
    public function allJobs(Request $request)
    {
        $search = $request->get('search');
        $location = $request->get('location');

        //HOMEPAGE Search QUERY
        if ($search && $location) {
            $jobs = Job::where('position', 'LIKE', '%' . $search . '%')
                ->orWhere('title', 'LIKE', '%' . $search . '%')
                ->orWhere('type', $search)
                ->orWhere('address', 'LIKE', '%' . $location . '%')
                ->orWhere('state', 'LIKE', '%' . $location . '%')
                ->where('status', 1)
                ->paginate(5);
            return view('job.alljobs', compact('jobs'));
        }


        //---Job Location DROPDOWN Search Query---
        $jobLocation = $request->get('jobLocation');
        if ($jobLocation) {
            $jobs = Job::where('state', 'LIKE', '%' . $jobLocation . '%')
                ->where('status', 1)
                ->paginate(5);
            return view('job.alljobs', compact('jobs'));
        }

        //---Job Type DROPDOWN Search Query---
        $jobType = $request->get('jobType');
        if ($jobType) {
            $jobs = Job::where('type', 'LIKE', '%' . $jobType . '%')
                ->where('status', 1)
                ->paginate(5);
            return view('job.alljobs', compact('jobs'));
        }


        //--All Jobs Search Query
        $keyword = $request->get('position');
        $category = $request->get('category_id');
        $address = $request->get('address');

        if ($jobs = Job::query()) {
            if ($keyword) {
                $jobs = $jobs->where('position', 'LIKE', '%' . $keyword . '%')->orWhere('title', 'LIKE', '%' . $keyword . '%')->where('status', 1);
            } elseif ($category) {
                $jobs = $jobs->where('category_id', $category)->where('status', 1);
            } elseif ($address) {
                $jobs = $jobs->where('address', $address)->where('status', 1);
            }
            $jobs = $jobs->latest()->paginate(5);

            return view('job.alljobs', compact('jobs'));

        } else {
            $jobs = Job::latest()->paginate(6);
            return view('job.alljobs', compact('jobs'));
        }
    }//end of all jobs query

    //---Report Job and Save to DB as Reported---
    public function reportJob(Request $request, $jobid, $companyid)
    {
        $currentTime = Carbon::now();
        $issue = $request->get('issue');
        DB::table('reported_jobs')->insert([
            'job_id' => $jobid,
            'company_id' => $companyid,
            'issue' => $issue,
            'created_at' => $currentTime->toDateTimeString(),
            'updated_at' => $currentTime->toDateTimeString()
        ]);

        return redirect()->back()->with('message', 'Job Reported Successfully, We will address the problem.');
    }


}

