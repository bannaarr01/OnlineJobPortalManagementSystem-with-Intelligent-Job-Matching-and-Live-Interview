<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendJob;
use App\Events\UserSubscribed;
use App\Listeners\EmailSubscriber;
use App\Mail\UserSubscribeMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

class EmailController extends Controller
{
    //---Share Job Link to Friend, colleague or family
    public function send(Request $request)
    {
        //---Validate Form Fields
        $this->validate($request, [
            'sender_name' => 'required|string',
            'sender_email' => 'required|email',
            'recipient_name' => 'required|string',
            'recipient_email' => 'required|email'
        ]);

        //---Creating Link of the current visited Job
        $homeUrl = url('/');
        $jobId = $request->get('job_id');//from the hidden
        $jobSlug = $request->get('job_slug');//from the hidden

        //---To ConCat url with the id and slug for absolute view access for recipient
        $jobUrl = $homeUrl . '/' . 'jobs/' . $jobId . '/' . $jobSlug;

        //---To be used in the markdown for sending the email
        $data = array(
            'sender_name' => $request->get('sender_name'),
            'sender_email' => $request->get('sender_email'),
            'recipient_name' => $request->get('recipient_name'),
            'jobUrl' => $jobUrl
        );
        $emailTo = $request->get('recipient_email');

        //---Instantiating the SendJob Mailer Class and passing the data array
        try {
            Mail::to($emailTo)->send(new SendJob($data));
            //Instantiatin d sendJob Class
            return redirect()->back()->with('message', 'Job Link Successfully Sent to ' . $emailTo);
        } catch (\Exception $e) {
            return redirect()->back()->with('err_message', 'Sorry, Something went wrong. Please try again later');

        }
    }

    //---Store Newsletter Subscribers and send them welcome email
    public function subscribe(Request $request)
    {
        $currentTime = Carbon::now();
        $this->validate($request, [
            'subscriberemail' => 'required'
        ]);
        //---Store to db Query
        DB::table('newsletter')->insert([
            'email' => $request->get('subscriberemail'),
            'created_at' => $currentTime->toDateTimeString(),
            'updated_at' => $currentTime->toDateTimeString()
        ]);
        //---Send the welcome email
        Mail::to($request->get('subscriberemail'))->send(new UserSubscribeMessage());
        return redirect()->back()->with('message', 'Subscribed Successfully!');

    }

}
