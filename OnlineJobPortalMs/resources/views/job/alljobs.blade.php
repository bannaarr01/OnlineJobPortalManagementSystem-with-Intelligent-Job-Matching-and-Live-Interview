@extends('layouts.main')

@section('content')
    <style>
        #main-header {
            background: url("template/assets/img/hero-bg.jpg");
            background-position: center center;
            background-size: cover;
            position: relative;
        }

        #main-header:before {
            content: "";
            background: rgb(3, 173, 252, 0.8);
            position: absolute;
            bottom: 0;
            top: 0;
            left: 0;
            right: 0;
        }

        .card {
            color: #444444;

        }

        .card:hover {
            border: 3px solid rgb(255, 0, 100, 0.3);
            border-top: 0px;
        }

        .card:before {
            content: "";
            border-top: 1px solid rgb(3, 173, 252, 0.9);
        }

        #cont {
            margin-top: -50px;
        }

    </style>


    <div class="py-4 mt-3">
        <header id="main-header" class="py-4 mt-3 bg text-white">
            <div class="container">
                <div class="d-flex justify-content-start col-xl-12">

                    <form action="{{ route('alljobs') }}" method="GET">
                        <div class="form-inline" id="app">
                            <div class="form-group ml-2">
                                <input type="text" name="position" placeholder="Job title or keywords"
                                       class="form-control ml-2">
                            </div>

                            <div class="form-group ml-2">
                                <input type="text" name="address" placeholder="Area, town or city"
                                       class="form-control ml-2">
                            </div>

                            <div class="form-group ml-2">
                                <select name="type" class="form-control ml-2">
                                    <option value="">All Job Categories</option>
                                    @foreach(App\Models\Category::all() as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>


                            </div>


                            <div class="form-group ml-3">
                                <button type="submit" class="btn btn-secondary">Find jobs</button>

                            </div>

                        </div>
                    </form>
                </div>
            </div>


            <div class="container mt-3">
                <div class="d-flex justify-content-start col-xl-12">
                    <div class="form-inline">
                        <form action="{{route('alljobs')}}" method="GET">
                            <div class="form-group ml-2">
                                <select name="jobLocation" onchange="this.form.submit()"
                                        class="form-control text-white ml-2" style="background-color: #6c757d;">
                                    <option value="">Location</option>
                                    <option value="kuala_lumpur">Kuala Lumpur</option>
                                    <option value="putrajaya">Putrajaya</option>
                                    <option value="negeri_sembilan">Negeri Sembilan</option>
                                    <option value="johor">Johor</option>
                                    <option value="kedah">Kedah</option>
                                    <option value="kelantan">Kelantan</option>
                                    <option value="malacca">Malacca</option>
                                    <option value="pahang">Pahang</option>
                                    <option value="penang">Penang</option>
                                    <option value="perak">Perak</option>
                                    <option value="perlis">Perlis</option>
                                    <option value="sabah">Sabah</option>
                                    <option value="sarawak">Sarawak</option>
                                    <option value="selangor">Selangor</option>
                                    <option value="terengganu">Terengganu</option>
                                    <option value="labuan">Labuan</option>
                                </select>
                            </div>
                        </form>


                        <form action="{{route('alljobs')}}" method="GET">
                            <div class="form-group ml-2">
                                <select name="jobType" class="form-control text-white ml-2"
                                        onchange="this.form.submit()" style="background-color: #6c757d;">
                                    <option value="">Job Type</option>
                                    <option value="fulltime">Full Time</option>
                                    <option value="parttime">Part Time</option>
                                    <option value="contract">Contract</option>
                                    <option value="remote">Remote</option>
                                    <option value="internship">Internship</option>
                                </select>
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </header>

    </div>
    <div>


        {{--Recent Jobs Section --}}
        <div class="container" id="cont">
            <div class="container-fluid">
                <section data-aos="fade-up">
                    @if(count($jobs)>0)
                        <div class="section-title aos-init aos-animate col-12">
                            <p>All Most Recent Jobs</p>
                        </div>
                        @foreach($jobs as $job)
                            <div class="col-xl-12 col-md-12 col-12 mb-4">
                                <a href="{{route('jobs.show', [$job->id,$job->slug])}}">
                                    <div class="card">
                                        <div class="card-body"><span>
            <div class="d-flex">
            @if(!empty($job->company->logo))
                    <div class="border-0">
                  <img src="{{asset('uploads/logo')}}/{{$job->company->logo}}" width="50">
                  </div>
                @else
                    <div class="border-0">
              <img src="{{asset('avatar/company.png')}}" width="50">
                  </div>
                @endif

              <div class="p-2 ml-3">
              <h5>{{$job->title}} </h5>
              <div class="row">
              <h6 class="mb-0 ml-3 text-primary"><span><i class="fas fa-layer-group" style="color: grey;"></i></span> {{$job->company->cname}}</h6>
              <small class="mb-0 ml-4 text-muted"><span><i class="fas fa-map-marker-alt"></i></span>  {{$job->address}}, {{$job->state}}</small>
              </div>
              </div>
              <div>
              @if($job->type=='internship')
                      <small style="width:50; border-radius: 70px; background-color: grey;"
                             class="ml-3 mt-2 p-2 badge text-white">{{$job->type}}</small>

                  @elseif($job->type=='parttime')
                      <small style="width:50; border-radius: 70px; background-color: darkcyan;"
                             class="ml-3 mt-2 p-2 badge text-white">{{$job->type}}</small>

                  @elseif($job->type=='fulltime')
                      <small style="width:50; border-radius: 70px; background-color: #007ee6;"
                             class="ml-3 mt-2 p-2 badge text-white">{{$job->type}}</small>

                  @elseif($job->type=='remote')
                      <small style="width:50; border-radius: 70px; background-color: #e8db5f;"
                             class="ml-3 mt-2 p-2 badge text-white">{{$job->type}}</small>
                  @else
                      <small style="width:50; border-radius: 70px; background-color: #5108F7;"
                             class="ml-3 mt-2 p-2 badge text-white">{{$job->type}}</small>
                  @endif
              </div>
              <div class="ml-auto p-2 text-end">
                <h5>RM {{$job->salary}}</h5>
                <small class="mb-0 float-right">{{$job->created_at->diffForHumans()}}</small>
              </div>
            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <div class="container py-5 mt-n4">
                            <img class="col-md-4 offset-4" src="{{'template/assets/img/search.gif'}}" height="180"
                                 width="100">
                            <h3 class="text-center mt-3">No Job Found</h3>
                            <p class="text-center lead" style="font-weight: bold;">
                                <em>We were unable to find any jobs that matched your criteria.</em></p>
                            <p class="text-center lead" style="font-weight: 500;"><em>
                                    Adjust the filter criteria and check the spelling.</em></p>

                        </div>
                        <style>
                            @media (max-width: 576px) {
                                .offset-4 {
                                    margin-left: 1.333333%;
                                }
                            }
                        </style>
                @endif
                {{ $jobs->appends(Request::except('page'))->links('vendor.pagination.custom') }}
                {{--Not to Loose any searched data on pagination}}--}}
            </div>
            {{--  </section>--}}
        </div>
    </div> {{--End of Recent Jobs Section--}}

    </div>
    </div>

    </div>
    </div>
    <script defer src="{{ ('/js/app.js') }}"></script>
@endsection
