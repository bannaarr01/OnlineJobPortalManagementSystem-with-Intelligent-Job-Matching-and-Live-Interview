@extends('layouts.main')

@section('content')
    <div class="py-5 mt-5">
        <div class="container">
            <div class="row">
                @include('.profile.seeker-left-menu')
                <div class="col-md-9">
                    @if(Auth::user()->user_type=='seeker')
                        @if(count($jobs)>0)
                            <h5>Your saved job.</h5>

                            @foreach($jobs as $job)
                                <div class="card border-primary">
                                    <div class="card-header border-primary favcard">{{$job->title}}</div>


                                    <div class="card-body">
                                        <small class="badge badge-primary">{{$job->position}}
                                        </small>

                                        <p>{!! html_entity_decode(str_limit($job->description, 220))!!}</p>
                                    </div>
                                    <div class="card-footer favcardfooter">
                                            <span><a id="viewlink"
                                                     href="{{route('jobs.show',[$job->id,$job->slug])}}"><i
                                                        class="fas fa-eye"> View</i></a></span>
                                        <span class="float-right">Application Deadline: {{$job->last_date}}</span>
                                    </div>

                                </div>
                                <br>
                            @endforeach

                        @else
                            <div class="mt-5 p-5">

                                <h5 class="mt-5 p-5"><i class="far fa-heart fa-3x" style="color: #012970"></i>
                                    <br> You have not favourited any job yet. <a id="findlink" href="/">Find
                                        Jobs</a></h5>

                            </div>


                        @endif

                    @else

                        You're logged in


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
@endsection









