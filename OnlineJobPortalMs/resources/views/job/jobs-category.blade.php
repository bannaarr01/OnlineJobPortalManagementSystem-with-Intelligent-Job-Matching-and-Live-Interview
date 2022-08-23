@extends('layouts.main')

@section('content')
    <style>

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


    </style>


    <div class="py-3 mt-3">
        <div class="container">

            {{--Recent Jobs Section --}}
            <div class="container" id="cont">
                <div class="container-fluid">
                    <section data-aos="fade-right">
                        <div class="section-title aos-init aos-animate col-12 mt-5">
                            <p>{{$categoryName->name}} Jobs</p>
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

                    {{ $jobs->appends(Request::except('page'))->links('vendor.pagination.custom') }}
                    {{--Not to Loose any searched data on pagination}}--}}
                </div>
                </section>
            </div>
        </div> {{--End of Recent Jobs Section--}}

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <script defer src="{{ ('/js/app.js') }}"></script>
@endsection
