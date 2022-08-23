@extends('layouts.main')

@section('content')
    <div class="py-5 mt-5">
        <div class="container">
            <div class="container">
                <div class="row">
                    @include('.profile.seeker-left-menu')
                    <div class="col-md-9">
                        @if(count($applications)>0)
                            <h5>Your applied job.</h5>
                            @foreach($applications as $application)

                                @php $job = \App\Models\Job::where('id',$application->job_id)->first();
                                @endphp
                                <div class="card border-primary">
                                    <div class="card-header border-primary favcard">{{$job->title}}</div>


                                    <div class="card-body">
                                        Status:
                                        @if($application->status == 1)
                                            <small class="badge badge-success">Approved</small>
                                        @elseif($application->status == 2)
                                            <small class="badge badge-primary">Scheduled Interview</small>
                                        @elseif($application->status == 3)
                                            <small class="badge badge-danger">Declined</small>
                                        @else
                                            <small class="badge badge-dark">Processing </small>
                                        @endif
                                        <br>

                                        Applied date: {{ date('F d, Y', strtotime($application->created_at)) }}
                                    </div>

                                </div>
                                <br>
                            @endforeach

                        @else
                            <div class="mt-5 p-5">

                                <h5 class="mt-5 p-5"><i class="fas fa-history fa-3x" style="color: #012970"></i>
                                    <br> You have not yet applied for any jobs. <a id="findlink" href="/">Find Jobs</a>
                                </h5>

                            </div>
                        @endif


                    </div>
                    <style>
                        #findlink {
                            color: #03adfc;
                        }

                        #findlink:hover {
                            color: #95c5ed;
                        }

                        .favcard {
                            font-size: 15px;
                            font-weight: bold;
                            background-color: #3803B2;
                            color: #fff;
                        }

                        .favcardfooter {
                            font-size: 12px;
                            font-weight: bold;
                            background-color: #3490dc;
                            color: #fff;
                        }

                        #viewlink:hover {
                            color: #95c5ed;
                        }

                    </style>
                </div>
            </div>
        </div>
@endsection









