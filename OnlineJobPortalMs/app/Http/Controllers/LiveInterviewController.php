<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Traits\ZoomJWT;

//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;


class LiveInterviewController extends Controller
{
    use ZoomJWT;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function __construct()
    {   //---Verified EMPLOYERs Only
        $this->middleware(['employer', 'verified'], ['except' => array('create', 'delete')]);
    }

    //---Page to schedule an interview---
    public function scheduleIndex($id, $uid)
    {
        $user = User::where('id', $uid)->first();
        $job_id = $id;
        return view('job.schedule', compact('user', 'job_id'));
    }

    //---ZOOM API Create Meeting call.
    public function create(Request $request, $id, $uid, $empid)
    {
        $result = [];
        $validator = Validator::make($request->all(), [
            'topic' => 'required|string',
            'date_time' => 'required|date',
            'timing' => 'required',
            'agenda' => 'string|nullable',
        ]);

        if ($validator->fails()) {
            return [
                'success' => false,
                'data' => $validator->errors(),
            ];
        }
        //Validate the data first
        $data = $validator->validated();
        $currentTime = Carbon::now();
        /**Once the Zoom is premium act, put this to allow alt host
         * ONCE PAID  'settings' => [
         * 'alternative_hosts' => 'example@email.com',
         */

        $path = 'users/me/meetings';
        $response = $this->zoomPost($path, [
            'topic' => $data['topic'],
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => $this->toZoomTimeFormat($data['date_time'], $data['timing']),
            'duration' => 30,
            "timezone" => 'Asia/Kuala_Lumpur',
            'agenda' => $data['agenda'],
            'created_at' => '',
            'settings' => [
                'host_video' => false,
                'participant_video' => false,
                'waiting_room' => true,
            ]
        ]);
        $result = [json_decode($response->body(), true),
        ];

        //---Update Job status on success scheduled meeting---
        DB::table('job_user')
            ->where('user_id', '=', $uid)
            ->where('job_id', '=', $id)
            ->update(['status' => 2]);
        $jobdetail = Job::where('id', $id)->first();
        $emp_id = $empid;
        $applicant_id = $uid;
        $dbDateTime = $data['date_time'] . 'T' . $data['timing'] . 'Z';
        $showDate = $data['date_time'];
        $showTime = $data['timing'];

        return view('job.scheduledsuccess', compact('result', 'emp_id', 'currentTime', 'applicant_id', 'dbDateTime', 'showDate', 'showTime', 'jobdetail'));
    }

    //---To get the schedule interview directly from zoom---
    public function getInterview(Request $request, string $id)
    {
        $path = 'meetings/' . $id;
        $response = $this->zoomGet($path);

        $data = json_decode($response->body(), true);
        if ($response->ok()) {
            $data['start_at'] = $this->toUnixTimeStamp($data['start_time'], $data['timezone']);
        }
        return [
            'success' => $response->ok(),
            'data' => $data,
        ];
    }

    //---Show Scheduled Interviews stored in db---
    public function records()
    {
        $user = Auth::user()->id;
        $records = DB::table('job_interview')
            ->select(DB::raw('*'))
            ->where('user_id', '=', $user)
            ->orderBy('created_at', 'DESC')
            ->paginate(8);

        return view('job.interview-records', compact('records'));
    }

    //---Delete Meeting from DB and also from Zoom platform---
    public function delete(Request $request, string $id)
    {
        DB::table('job_interview')
            ->where('meeting_id', '=', $id)
            ->delete();

        $path = 'meetings/' . $id;
        $response = $this->zoomDelete($path);
        /**  return [
         * 'success' => $response->status() === 204,
         * ]; */

        return redirect()->back()->with('message', 'Meeting cancelled successfully!');
    }


}
