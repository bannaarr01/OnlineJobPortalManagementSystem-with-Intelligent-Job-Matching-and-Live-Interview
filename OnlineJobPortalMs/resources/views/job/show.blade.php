@extends('layouts.main')

@section('content')
    <div class="py-4 mt-5">
        <div class="container">

            <!-- ======= Jobdescription Section ======= -->
            <div class="jobdescriptn">
                <div class="container">
                    @if(Session::has('message'))
                        <div class="alert alert-primary">
                            {{Session::get('message')}}</div>
                    @endif

                    @if(Session::has('err_message'))
                        <div class="alert alert-danger">
                            {{Session::get('err_message')}}</div>
                    @endif

                    @if(isset($errors)&&count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif

                    <div id="app" class="row">
                        <div class="col-lg-8" data-aos="fade-up">
                            <h3 class="jobdescriptn-title">{{$job->title}}</h3>
                            <div class="jobdescriptn-item pb-0">
                                Posted: <h5>{{$job->created_at->diffForHumans()}}</h5> <br>
                                Expiring on: <h5>{{ date('F d, Y', strtotime($job->last_date)) }}</h5>  <br>
                                Number of Vancancy: <h5>{{$job->number_of_vacancy}}</h5> <br>
                                Salary: <h5>RM {{$job->salary}}</h5> <br>
                            </div>
                            <br>
                            <div class="jobdescriptn-item pb-0">
                                <h4>Job Description</h4>
                                <p><em>{{$job->description}}</em></p>
                            </div>
                            <br>
                            <div class="jobdescriptn-item pb-0">
                                <h4>Roles and Responsibilities </h4>
                                <p><em>{{$job->roles}}</em></p>
                            </div>

                            <br>
                            <div class="jobdescriptn-item pb-0">
                                <h4>Additional Details</h4>
                                <strong>Years of Experience:</strong>  <h5>{{$job->experience}}</h5> <br>
                                <strong>Job Type:</strong>  <h6>{{$job->type}}</h6>
                                <strong>Qalification:</strong>  <h6>{{$job->qualification}}</h6>
                                <strong>Job Category:</strong>  <h6>{{$job->category->name}}</h6>
                            </div>

                            <a href="#" data-toggle="modal" data-target="#reportJobModal"
                               class="btn btn-secondary"><span><i
                                        class="fas fa-flag "></i> Report Job</span></a>

                        </div>


                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="card">
                                <div class="card-body">
                                    @if(!empty($job->company->logo))
                                        <img src="{{asset('uploads/logo')}}/{{$job->company->logo}}" width="100">
                                    @else
                                        <img src="{{asset('avatar/company.png')}}" width="100">
                                    @endif

                                    <h3 class="jobdescriptn-title">{{$job->company->cname}}</h3>
                                    <div class="">
                                        <p><em>{{$job->address}}, {{$job->state}}</em></p>
                                        @if(Auth::check()&&Auth::user()->user_type=='seeker')
                                            @if(!empty($job->company->website))
                                                <p class="btn btn-dark btn-sm"><a
                                                        href="https://{{$job->company->website}}" target="_blank"
                                                        style="text-decoration: none; color: white">Visit Company
                                                        Website </a><span><i
                                                            class="fas fa-external-link-alt"></i></span></p>
                                            @endif
                                        @endif
                                        {{-- If User is Logged in and same time user is SEEKER ONLY den show the apply button --}}
                                        @if(Auth::check()&&Auth::user()->user_type=='seeker')
                                            @if(!$job->checkApplication())

                                                @if(empty(Auth::user()->profile->resume && Auth::user()->profile->cover_letter))
                                                    <hr>

                                                    <i data-toggle="tooltip" data-placement="right"
                                                       title="To upload your resume and cover letter, Goto profile section"
                                                       class="fas fa-exclamation-triangle fa-2x"
                                                       style="color: #ffc107"></i>
                                                    <h4 style="font-size: 16px" class="bg-warning">Upload your Resume
                                                        and Cover letter to Apply for this job ! </h4>
                                                @else
                                                    <hr>
                                                    <h4 style="font-size: 16px">Interested?</h4>
                                                    <apply-component :jobid={{$job->id}}></apply-component>
                                                @endif

                                            @else
                                                <hr>
                                                <button class="btn btn-dark disabled mt-2 " aria-disabled="true"
                                                        style="cursor: not-allowed; width: 100%">You have applied for
                                                    this job
                                                </button>

                                            @endif
                                            <hr>
                                            <h4 style="font-size: 16px">Unsure Yet?</h4>
                                            <favourite-component
                                                :jobid={{$job->id}} :favorited={{$job->checkSaved()?'true':'false'}}></favourite-component>
                                            {{--Calling d checkSaved method from JobModel--}}
                                            <hr>
                                            <h4 style="font-size: 16px">Share this job to your friends</h4>
                                            <a href="#" data-toggle="modal" data-target="#shareJobModal"
                                               class="btn btn-outline-primary col-md-3 offset-md-4"><span><i
                                                        class="far fa-envelope "></i></span></a>
                                        @elseif(Auth::check()&&Auth::user()->user_type=='employer')
                                            <div></div>

                                        @elseif(Auth::check()&&Auth::user()->user_type=='siteadmin')
                                            <div></div>

                                        @else
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Register or Login to apply for this job
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <strong></strong>
                                            </div>

                                            <script>
                                                $("alert").alert();
                                            </script>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h4 style="font-size: 16px">To see More Jobs from this company</h4>
                            <a class="btn btn-outline-secondary btn-sm col-md-3 offset-md-4"
                               href="{{route('company.index',[$job->company->id,$job->company->slug])}}"> View</a>
                            <hr>
                        </div>
                    </div>


                </div>
            </div><!-- End Job description Section -->


            {{-- Jobs Recommendations Section --}}
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-12 mb-4 mt-5">
                            @if(!empty($recommendations))
                                <div class="py-3 mt-n4" data-aos="fade-left" data-aos-delay="100">
                                    <h4 class="text-center">Recommended Jobs</h4>
                                    <hr class="border-warning" width="15%">
                                    <hr class="border-info" width="26%">
                                </div>
                            @endif
                            @foreach($recommendations as $recom)
                                @php $recom['id'] = App\Models\Job::where('id',$recom['id'])->get();
                                @endphp
                                @foreach($recom['id'] as $recommendation)
                                    <a href="{{route('jobs.show', [$recommendation->id,$recommendation->slug])}}">

                                        <div class="card cardEffect mb-4">
                                            <div class="card-body"><span>
                <div class="d-flex">
              @if(!empty($recommendation->company->logo))
                        <div class="border-0">
                  <img src="{{asset('uploads/logo')}}/{{$recommendation->company->logo}}" width="50">
                  </div>
                    @else
                        <div class="border-0">
              <img src="{{asset('avatar/company.png')}}" width="50">
                  </div>
                    @endif

              <div class="p-2 ml-3">
              <h6>{{$recommendation->title}} </h6>
              <div class="row">
              <h6 class="mb-0 ml-3 text-primary" style="font-size: 12px"><span><i class="fas fa-layer-group"
                                                                                  style="color: grey;"></i></span> {{$recommendation->company->cname}}</h6>

              </div>
              </div>
              <div>
              @if($recommendation->type=='internship')
                      <small style="width:50; border-radius: 70px; background-color: grey;"
                             class="ml-3 mt-2 p-2 badge text-white">{{$recommendation->type}}</small>

                  @elseif($recommendation->type=='parttime')
                      <small style="width:50; border-radius: 70px; background-color: darkcyan;"
                             class="ml-3 mt-2 p-2 badge text-white">{{$recommendation->type}}</small>

                  @elseif($recommendation->type=='fulltime')
                      <small style="width:50; border-radius: 70px; background-color: #007ee6;"
                             class="ml-3 mt-2 p-2 badge text-white">{{$recommendation->type}}</small>

                  @elseif($recommendation->type=='remote')
                      <small style="width:50; border-radius: 70px; background-color: #e8db5f;"
                             class="ml-3 mt-2 p-2 badge text-white">{{$recommendation->type}}</small>
                  @else
                      <small style="width:50; border-radius: 70px; background-color: #5108F7;"
                             class="ml-3 mt-2 p-2 badge text-white">{{$recommendation->type}}</small>
                  @endif
              </div>
            </div>
                                            </div>

                                            <div class="card-footer border-info">
                                                <div class="row">
                                                    <h6 class="ml-2 float-left">RM {{$recommendation->salary}}</h6>

                                                    <small class="mb-0 ml-4 text-muted text-center"><span><i
                                                                class="fas fa-map-marker-alt"></i></span> {{$recommendation->address}}
                                                        , {{$recommendation->state}}</small>
                                                    <small
                                                        class="ml-auto p-2 mt-n2">{{$recommendation->created_at->diffForHumans()}}</small>
                                                </div>

                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @endforeach
                        </div> {{--End of Jobs Recommendations Section--}}

                    </div>


                </div>
            </div>
            <script defer src="{{ ('/js/app.js') }}"></script>
            <style>
                .cardEffect {
                    color: #444444;
                }

                .cardEffect:hover {
                    border: 2px solid rgb(255, 0, 100, 0.3);
                    border-top: 0px;
                }

                .cardEffect:before {
                    content: "";
                    border-top: 1px solid rgb(3, 173, 252, 0.9);
                }
            </style>

            {{--  Share Job Modal--}}
            <div class="modal fade" id="shareJobModal">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title"><span><i class="fas fa-share-square"></i></span> Share this Job link
                            </h5>
                            <button class="close" data-dismiss="modal">
                                <span>&CircleTimes;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="job_id" value="{{$job->id}}">
                            <input type="hidden" name="job_slug" value="{{$job->slug}}">
                            <form action="{{route('share.job')}}" method="POST">@csrf
                                <div class="form-group">

                                    <input type="text" name="sender_name" placeholder="your name" class="form-control"
                                           required="">
                                </div>

                                <div class="form-group">

                                    <input type="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                                           name="sender_email" placeholder="your email address" class="form-control">
                                </div>

                                <div class="form-group">

                                    <input type="text" name="recipient_name" placeholder="recipient name"
                                           class="form-control" required="">
                                </div>

                                <div class="form-group">

                                    <input type="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                                           name="recipient_email" placeholder="recipient email address"
                                           class="form-control">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Send <span><i class="fas fa-paper-plane"></i></span>
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div> {{-- End of Share Job Modal --}}





            {{-- Report Job Modal--}}
            <div class="modal fade" id="reportJobModal">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title"><span><i class="fas fa-flag"></i></span> Report Job</h5>
                            <button class="close" data-dismiss="modal">
                                <span>&CircleTimes;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('report.job', [$job->id, $job->company->id])}}" method="POST">@csrf
                                <div class="form-group">
                                    <h6>Give a brief description of the problem below</h6>
                                    <textarea type="text" name="issue"
                                              placeholder="Requesting money, appearing to be a fake job"
                                              class="form-control" required=""></textarea>
                                </div>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Report <span><i
                                        class="fas fa-flag"></i></span></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>


@endsection
