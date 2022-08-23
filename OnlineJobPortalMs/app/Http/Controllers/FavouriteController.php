<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

//use Auth;

class FavouriteController extends Controller
{
    //---Save Job, store the event
    public function saveJob($id)
    {
        $jobId = Job::find($id);
        $jobTitle = $jobId->title;

        //---If user has applied, Favorite a Job == Not Allowed
        if (!$jobId->checkApplication()) {
            $jobId->favourites()->attach(auth()->user()->id);
            //Update the Interraction table also to "FAVORITED"
            if (!$jobId->checkFavorited()) {
                $jobId->add_favorites_to_interraction()->attach(auth()->user()->id, ['eventType' => 'FAVOURITED', 'job_title' => $jobTitle]);
            }

        } elseif ($jobId->checkApplication()) {

        } else {
            $jobId->favourites()->attach(auth()->user()->id);
            $jobId->add_favorites_to_interraction()->attach(auth()->user()->id, ['eventType' => 'FAVOURITED', 'job_title' => $jobTitle]);
        }

        return redirect()->back();

    }

    //---Unsave Job
    public function unSaveJob($id)
    {
        $jobId = Job::find($id);
        $jobId->favourites()->detach(auth()->user()->id);
        return redirect()->back();
    }
}
