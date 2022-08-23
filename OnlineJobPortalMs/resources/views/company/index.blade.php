@extends('layouts.main')

@section('content')
    <div class="py-4 mt-5" id="app">
        <div class="container">

            @if(!empty($company->cover_photo))

                <img src="{{asset('uploads/coverphoto')}}/{{$company->cover_photo}}" style="width: 100%;">
            @endif
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-7 p-4 mb-8 bg-white">
                        <div class="company-desc">
                            @if(empty($company->logo))
                                <img width="80" src="{{asset('avatar/company.png')}}">
                            @else
                                <img width="80" src="{{asset('uploads/logo')}}/{{$company->logo}}">
                            @endif

                            @if(!empty($company->description))
                                <p>{{$company->description}}</p>
                            @endif
                            <h2>{{$company->cname}}</h2>

                            @if(!empty($company->slogan))
                                <p><strong class="text-primary">Motto:</strong> {{$company->slogan}}</p>
                            @endif
                            @if(!empty($company->address))
                                <p><i class="fas fa-map-marker-alt" style="color: #3490dc;"></i> {{$company->address}}
                                    @endif
                                    &nbsp;
                                    @if(!empty($company->website))
                                        <a class="btn btn-primary btn-sm"
                                           style="text-decoration: none; color: white; border-radius: 50px"
                                           href="https://{{$company->website}}">Our website <span><i
                                                    class="fas fa-external-link-alt"></i></a></span></p>
                            @endif

                        </div>
                    </div>

                    @if(Auth::check()&&Auth::user()->user_type=='seeker')
                        @if(!$company->checkRated())
                            {{-- Rating Component VueJs --}}
                            <rating-component
                                :companyid={{$company->id}} :rated={{$company->checkRated()?'true':'false'}}></rating-component>
                        @endif
                    @endif

                    @if($data->count() > 0)
                        @php $sum=0; $avg=0; //$max=5; $ratingPercentage=0;
                   foreach($data as $rating){
                        $sum += $rating['rating'];
                    }
                   $avg = $sum / count($data);
                   $sum = number_format($sum, 1);
                   $avg = number_format($avg, 1);
                   $total = count($data);
                        @endphp
                        <div class="col-lg-5 p-4 mb-8 bg-white mt-3">
                            <h6 class="ml-5"> {{$company->cname}} Overrall Ratings</h6>
                            <hr class="ml-5" style="width: 50%">

                            <div class="ml-5">
                                <div class="">
                                    <h3 class="lead mb-n3" style="font-size: 0.8rem">Average Total ratings </h3>
                                    <div class="review-title">{{ $avg }}</div>  <!-- 3.5-->
                                    <div class="review-star">
                                        <star-rating :inline="true" :read-only="true" :show-rating="false"
                                                     v-model="{{$avg}}" :increment="0.1" :star-size="23"
                                                     active-color="#d4af37"></star-rating>
                                    </div>
                                    @if($total>1)
                                        <div class=""><i class="fa fa-user fawe"></i> {{$total}} ratings in total</div>
                                    @else
                                        <div class=""><i class="fa fa-user fawe"></i> {{$total}} rating in total</div>
                                    @endif
                                </div>

                            </div>
                        </div>

                </div>
            </div>
            @endif     {{--  END OF RATING--}}


            {{--The Company's Jobs--}}
            <div class="container" id="cont">
                <div class="container-fluid">
                    <section data-aos="fade-left">
                        <div class="section-title aos-init aos-animate col-12">
                            @if(!empty($company->jobs))
                                <h2>{{$company->cname}}</h2>
                                <p>Posted Jobs</p>
                            @endif
                        </div>
                        @foreach($company->jobs as $job)
                            <div class="col-xl-12 col-md-12 col-12 mb-4">
                                <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                                    <div class="card design">
                                        <div class="card-body"><span>
            <div class="d-flex">
            @if(!empty($company->logo))
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
              <small class="mb-0 ml-4 text-muted"><span><i
                          class="fas fa-map-marker-alt"></i></span> {{$job->state}}</small>
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
                    </section>
                </div>
            </div> {{--End of the Company's Jobs--}}


            <script defer src="{{ ('/js/app.js') }}"></script>

        </div>
    </div>

@endsection
