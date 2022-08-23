<?php

namespace App\Http\Controllers;


use App\Mail\Newsletter;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminDashboardController extends Controller
{
    public function __construct()
    {   //Admin middleware protect all the below except this specified array
        $this->middleware('admin', ['except' => array('show')]);

    }

    //---Capture the result of all this query and show on the admin dashboard
    public function index()
    {
        $users = User::where('user_type', 'seeker')->get();
        $employers = User::where('user_type', 'employer')->get();
        $latestUser = User::latest()->first();
        $jobs = Job::where('status', 1)->get();
        $approvals = DB::table('job_user')->where('status', '=', 1)->get();
        $declined = DB::table('job_user')->where('status', '=', 3)->get();
        $reportedJobs = DB::table('reported_jobs')->select(DB::raw('*'))->groupBy(['job_id'])->orderBy('job_id')->get();
        $jobCategories = Category::all();
        $subscriber = DB::table('newsletter')->get();
        $posts = Post::where('status', '=', 1)->get();

        return view('admin.index', compact('users', 'employers', 'latestUser', 'jobs', 'approvals', 'declined', 'reportedJobs', 'jobCategories', 'subscriber', 'posts'));
    }

    //---Get Blog Post arder by latest and display
    public function getPosts()
    {
        $posts = Post::latest()->paginate(10);

        return view('admin.posts', compact('posts'));
    }

    //---Admin Create Blog Post
    public function create()
    {
        return view('admin.create');
    }

    //---Validate and Store Blog Post to DB---
    //---Send the Post to all Newsletter Subscribers through email once the post is created
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'content' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads/blog', 'public');
            $post = Post::create([
                'title' => $title = $request->get('title'),
                'slug' => str_slug($title),
                'content' => $request->get('content'),
                'image' => $path,
                'status' => $request->get('status')
            ]);
            $lastinsertedId = $post->id;
            $lastinsertedSlug = $post->slug;
        }

        //--Get all subscribers
        $subscribers = DB::table('newsletter')
            ->select(DB::raw('email'))->get();

        //---Create Link for post that's been created and concat it for absolute access
        $homeUrl = url('/');
        $jobId = $request->get('job_id');//from the hidden
        $jobSlug = $request->get('job_slug');//from the hidden

        $postUrl = $homeUrl . '/' . 'posts/' . $lastinsertedId . '/' . $lastinsertedSlug;

        //---Send only the details in this array to the markdown
        $newsletterData = array(
            'title' => $title = $request->get('title'),
            'content' => $request->get('content'),
            'postUrl' => $postUrl
        );

        //--- Loop through all the subscriber and send them the blog post created with the link to visit it
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber)->send(new Newsletter($newsletterData));
        }

        return redirect('/admindashboard')->with('message', 'Post created successfully!');
    }


    //---Edit the Post created
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.edit', compact('post'));
    }

    //--Update the Edited Post and handle dual events, with image or without image update
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'content' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads/blog', 'public');
            Post::where('id', $id)->update([
                'title' => $title = $request->get('title'),
                'content' => $request->get('content'),
                'image' => $path,
                'status' => $request->get('status')
            ]);
        }

        $this->updateAllExceptImage($request, $id);
        return redirect()->back()->with('message', 'Post updated successfully!');
    }

    //--Update Event where not needed to change the Image---
    public function updateAllExceptImage(Request $request, $id)
    {
        return Post::where('id', $id)->update([
            'title' => $title = $request->get('title'),
            'content' => $request->get('content'),
            'status' => $request->get('status')
        ]);
    }


    //--Softdelete the post, Deleted but remains in db as deleted---
    public function destroy(Request $request)
    {
        $id = $request->get('id'); //from d form hidden type
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('message', 'Post deleted successfully!');
    }

    //---Get the deleted Posts in trash---
    public function trash()
    {
        $posts = Post::onlyTrashed()->paginate(10);
        return view('admin.trash', compact('posts'));
    }

    //---Restore the deleted post back---
    public function restore($id)
    {
        Post::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Post restored successfully!');
    }

    //---Delete of post from the db Entirely
    public function removeTrash($id)
    {
        $post = Post::where('id', $id)->forcedelete();
        return redirect()->back()->with('message', 'Trashed Post deleted successfully!');
    }

    //--Toggle Post status to Live if Draft, and Vice versa
    public function toggle($id)
    {
        $post = Post::find($id);
        $post->status = !$post->status;
        $post->save();
        return redirect()->back()->with('message', 'Post status updated successfully!');
    }

    //---Read Selected Blog Post
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.read-blog', compact('post'));

    }

    //---Get all the Jobs in the db order by recent jobs
    public function getAllJobs()
    {
        $jobs = Job::latest()->paginate(10);
        return view('admin.jobs', compact('jobs'));
    }

    //---Get Reported Jobs from db, Remove duplicate, used count in the view instead of showing duplicate
    public function getReportedJobs()
    {
        $jobs = DB::table('reported_jobs')
            ->select(DB::raw('*'))
            ->groupBy(['job_id'])
            ->orderBy('job_id')
            ->paginate(10);

        return view('admin.reported-jobs', compact('jobs'));

    }

    //---Admin Update the Job status if found guilty of the report
    public function toggleReportedJob($id)
    {
        $job = Job::find($id);
        $job->status = !$job->status;
        $job->save();

        return redirect()->back()->with('message', 'Job status updated successfully!');
    }

    //---Admin Delete the Job from DB if the job is made live again
    public function deleteJob(Request $request)
    {
        $id = $request->get('id'); //from d form hidden type
        $job = Job::find($id);
        $job->delete();

        DB::table('reported_jobs')
            ->where('job_id', '=', $id)
            ->delete();

        return redirect()->back()->with('message', 'Job deleted successfully !');
    }


    //---Get all the users from db except the admin---
    public function getAllUsers()
    {
        $users = User::where('user_type', '!=', 'siteadmin')->latest()->paginate(11);

        return view('admin.allusers', compact('users'));
    }


    //---Deativate user, not allowing the user to Re-Register with same login details
    public function destroyUser(Request $request)
    {
        $id = $request->get('id'); //from d form hidden type
        $user = User::find($id);
        $user->delete();

        return redirect('/admindashboard/all/users')->with('message', 'User deactivated successfully!');
    }

    //---Show the deactivated Users
    public function deactivatedUsers()
    {
        $users = User::onlyTrashed()->paginate(10);
        return view('admin.deactivatedusers', compact('users'));
    }

    //---Reactivate the deactivated Users
    public function restoreUser($id)
    {
        User::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Account restored successfully!');
    }

    //---Search Users, send response to SearchUser VueJs as Json
    public function searchUsers(Request $request)
    {
        $keyword = $request->get('keyword');
        $user = User::where('email', 'LIKE', '%' . $keyword . '%')->where('user_type', '<>', 'siteadmin')->limit(5)->get();
        return response()->json($user);
    }

    //--Admin Search User
    public function getUser($id)
    {
        $userdetails = User::where('id', $id)->get();
        return view('admin.singleuser', compact('userdetails'));
    }

}
