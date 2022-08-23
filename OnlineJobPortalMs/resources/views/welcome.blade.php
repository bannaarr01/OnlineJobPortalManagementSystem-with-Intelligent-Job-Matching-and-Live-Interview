<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

@include('partials.head')

<!-- ========================================================================================================
  * Project Name: Online Job Portal Management System with Intelligent Job Matching and Live Interview - FYP
  * Project Local Dev URL: http://jobsvizor.local/
  * Author: Adedigba B. Joshua
  * License: INTI International University, Nilai, Negeri Sembilan, 71800, Malaysia & COVENTRY UNIVERSITY UK.
  * Contact: joshboluwaji6@gmail.com
  ============================================================================================================= -->
</head>

<body>

@include('partials.nav')

@include('partials.hero')


@include('partials.category')

<style>
    .cardEffect {
        color: #444444;
    }

    .cardEffect:hover {
        border: 3px solid rgb(255, 0, 100, 0.3);
        border-top: 0px;
    }

    .cardEffect:before {
        content: "";
        border-top: 1px solid rgb(3, 173, 252, 0.9);
    }
</style>

{{--Recent Jobs Section --}}
<div class="container">
    <div class="container-fluid">
        <section data-aos="fade-up">
            <div class="section-title aos-init aos-animate col-12">
                <h2>Most</h2>
                <p>Recent Jobs</p>
            </div>
            @foreach($jobs as $job)
                <div class="col-xl-12 col-md-12 col-12 mb-4">
                    <a href="{{route('jobs.show', [$job->id,$job->slug])}}">
                        <div class="card cardEffect">
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
              <small class="mb-0 ml-4 text-muted"><span><i class="fas fa-map-marker-alt"></i></span> {{$job->address}}, {{$job->state}}</small>
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
            <div class="col-md-6 offset-md-4">
                <a href="{{route('alljobs')}}" class="btn btn-outline-primary">Browse More Jobs <span><i
                            class="fas fa-angle-double-right"></i></span> </a>
            </div>
        </section>
    </div>
</div> {{--End of Recent Jobs Section--}}

<main id="main">

    @include('partials.topemployer')

    @include('partials.blog')

    @include('partials.steps')

    @include('partials.counts')

    @include('partials.testimonial')

    @include('partials.ready')

</main><!-- End #main -->


@include('partials.footer')

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<div id="preloader"></div>

@include('partials.bottom')

</body>

</html>


