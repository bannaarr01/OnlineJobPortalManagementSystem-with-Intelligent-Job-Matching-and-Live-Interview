@extends('layouts.main')

@section('content')
    <div class="py-5 mt-5">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-primary">{{Session::get('message')}}</div>
            @endif
            <br>
            @if(Session::has('err_message'))
                <div class="alert alert-danger">
                    {{Session::get('err_message')}}</div>
            @endif
            <div class="row ">

                @include('company.emp-left-menu')

                <div class="col-md-9">
                    {{--                <div class="container"></div>--}}
                    @if(count($applicants)>0)
                        <table class="table table-striped">
                            <thead style="background-color: #3803B2; color: #fff">
                            <th>Logo</th>
                            <th>Details</th>
                            <th>Addresss</th>
                            <th>Action</th>
                            <th>Resume</th>
                            </thead>
                            <tbody>
                            @foreach($applicants as $applicant)
                                <a id="titlelink"
                                   href="{{route('jobs.show',[$applicant->id,$applicant->slug])}}"> {{$applicant->title}}</a>
                                @foreach($applicant->users as $user)
                                    <tr>
                                        <td>
                                            @if($user->profile->avatar)
                                                <img src="{{asset('uploads/avatar')}}/{{$user->profile->avatar}}"
                                                     width="80">
                                            @else
                                                <img src="{{asset('uploads/avatar/avatar.png')}}" width="80">
                                            @endif

                                        </td>
                                        <td>Name: {{$user->name}} <br> Email: {{$user->email}}
                                            <br><em>Applied on:</em>
                                            <br>{{ date('F d, Y', strtotime($applicant->created_at)) }}
                                        </td>
                                        <td>Phone:{{$user->profile->phone_number}} <br>
                                            Address:{{$user->profile->address}} <br>
                                            Gender:{{$user->profile->gender}} <br>
                                        </td>
                                        <td>
                                            @php
                                                $status = DB::table('job_user')
                                                    ->select(DB::raw('status'))
                                                    ->where('user_id', '=', $user->id)
                                                    ->where('job_id', '=', $applicant->id)
                                                    ->get();
                                                    $status = json_decode($status, true);

                                            @endphp

                                            @if(in_array(1, $status['0'], true ))
                                                <h6 class="badge badge-success">Approved</h6>
                                            @elseif(in_array(2, $status['0'], true ))
                                                <h6 class="badge badge-primary">Scheduled Interview</h6>
                                            @elseif(in_array(3, $status['0'], true ))
                                                <h6 class="badge badge-danger">Declined</h6>
                                            @else
                                                <h6 class="badge badge-dark">Received</h6>
                                            @endif

                                            <div class="btn-group open">
                                                <button class="btn btn-xs btn-default dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="true">Action
                                                    <span class=""></span></button>
                                                <ul class="dropdown-menu animated zoomIn">

                                                    <li class="drop">

                                                        <a class="btn btn-outline-info btn-sm"
                                                           href="{{route('schedule.index', [$applicant->id, $user->id])}}">Schedule
                                                            Interview</a>
                                                    </li>


                                                    <hr>
                                                    <li class="drop">
                                                        <form
                                                            action="{{route('post.approveJob', [$applicant->id, $user->id])}}"
                                                            method="post">@csrf
                                                            <button type="submit" class="btn btn-outline-primary btn-sm"
                                                                    style="width: 140px">Approved
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <hr>
                                                    <li class="drop">
                                                        <form
                                                            action="{{route('post.declineJob', [$applicant->id, $user->id])}}"
                                                            method="post">@csrf
                                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                                    style="width: 140px">Declined
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                            <form
                                                action="{{route('post.deleteAppliedJob', [$applicant->id, $user->id])}}"
                                                method="post">@csrf
                                                <button type="submit" class="badge badge-danger"><i
                                                        class="fas fa-trash-alt"> delete</i>
                                                </button>

                                            </form>

                                        </td>
                                        <td><a id="resumelink"
                                               href="{{Storage::url($user->profile->resume)}}">Resume </a>
                                            <hr>
                                            <a id="coverletterlink"
                                               href="{{Storage::url($user->profile->cover_letter)}}">Cover
                                                letter</a>
                                        </td>

                                    </tr>

                            </tbody>
                            @endforeach

                            @endforeach
                        </table>



                        <div>
                            {{ $applicants->appends(Request::except('page'))->links('vendor.pagination.custom') }}
                        </div>

                    @else
                        <div class="mt-5 p-5">

                            <h5 class="mt-5 p-5"><i class="fas fa-user-tie fa-3x" style="color: #012970"></i> <br>You
                                have no Applicant yet. </h5>

                        </div>
                    @endif
                </div>
            </div>

        </div>
        @endsection


        <style>

            .drop {
                /*padding: 6px;*/
                padding-left: 10px;
                /*padding-right: 10px;*/
                /*background-color: #343a40;*/
            }

            /*.drop a{*/
            /*    width: 100%;*/
            /*}*/
            #coverletterlink, #resumelink {
                color: #03adfc;
            }

            #coverletterlink:hover, #resumelink:hover {
                color: #000000;
            }

            /*.drop a:hover {*/
            /*    color: #343a40;*/
            /*    border-bottom: #1a202c 3px solid !important;*/
            /*    border-bottom-style: inset;*/

            /*}*/

            #titlelink {
                font-size: large;
                font-weight: bolder;
                color: #fff;
                background-color: #3803B2;
                /*style="font-size:15px; font-weight: bold; background-color: #3803B2; color: #fff"*/
            }

            #titlelink:hover {
                color: #03adfc;
                border-bottom: #03adfc 4px solid !important;
            }

            .dheader, .modal-header {
                background-color: #012970;
            }
        </style>


