@extends('layouts.main')

@section('content')
    <div class="py-5 mt-5">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-primary">
                    {{Session::get('message')}}</div>
            @endif
            <div class="row">
                <div class="col-md-9">
                    <a href="{{route('applicants')}}" class="btn btn-outline-primary mt-2 float-left"><i
                            class="fas fa-arrow-circle-left"></i> Back to Applicants</a>
                    <br>
                    <div class="card border-primary">
                        <div class="mt-3 card-form ml-4" style="font-weight: bold">
                            <h5>{{ __('Interview Meeting Details') }}</h5>
                        </div>
                        <hr class="border-primary"/>
                        <div class="card-body">
                            @foreach($result as $res)
                                <p>Purpose: {{$res['agenda']}}</p>
                                <p>Interview Meeting ID: {{$res['id']}}</p>
                                <p id="meetingurl">Join Interview URL: <a
                                        href="{{$res['join_url']}}">{{$res['join_url']}}</a></p>
                                <p>Interview Meeting Password: {{$res['password']}}</p>
                                <p>Time Scheduled: {{ date('F d, Y h:i:s A', strtotime($showDate.$showTime)) }}</p>
                                <p>Duration: {{$res['duration']}} mininutes</p>
                                <p></p>
                                <a class="btn btn-primary" href="{{$res['join_url']}}" target="_blank">Launch <i
                                        class="fas fa-rocket"></i></a></p>


                                @php     //Insert into the Job Interview table
                                           DB::table('job_interview')->insert([
                                               'user_id' => $emp_id,
                                               'applicant_id' => $applicant_id,
                                               'meeting_id' => $res['id'],
                                               'join_meeting_url' => $res['join_url'],
                                               'meeting_password' => $res['password'],
                                               'scheduled_time' => $dbDateTime,
                                               'created_at' => $currentTime->toDateTimeString(),
                                               'updated_at' => $currentTime->toDateTimeString()
                                           ]);

                                           $sender = App\Models\User::where('id',$emp_id)->first();
                                            $applicantdetail = App\Models\User::where('id',$applicant_id)->first();

                                            //Data used in notify user of the interview markdown
                                             $inviteData = array(
                                             'meeting_id' => $res['id'],
                                             'meeting_password' => $res['password'],
                                             'join_meeting_url' => $res['join_url'],
                                              'scheduled_time' => date('F d, Y h:i:s A', strtotime($showDate.$showTime)),
                                              'sender_name'=> $sender->company->cname,
                                              'sender_email' => $sender->email,
                                              'recipient_name'=> $applicantdetail->name,
                                               'recipient_email'=> $applicantdetail->email,
                                               'job_position'=> $jobdetail->position,
                                                 'job_title'=> $jobdetail->title,
                                          );
                                                //Send email to the user with the interview details
                                              \Illuminate\Support\Facades\Mail::to($applicantdetail->email)->send(new \App\Mail\InterviewInvite($inviteData));
                                @endphp


                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-5">
                    <img src="{{ asset('template/assets/img/rocket.gif ') }}" class="img-fluid mt-5">

                </div>
            </div>
        </div>
    </div>

    <style>
        #meetingurl:hover {
            color: #000000;
        }
    </style>
@endsection
