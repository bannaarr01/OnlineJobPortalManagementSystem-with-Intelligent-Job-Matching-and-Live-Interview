@extends('layouts.main')

@section('content')

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

    <div class="py-5 mt-5">
        <div class="container">

        @if(!empty($post))
            <!-- ======= Section ======= -->
                <div class="jobdescriptn">
                    <div class="container">
                        @if(Session::has('message'))
                            <div class="alert alert-primary">
                                {{Session::get('message')}}</div>
                        @endif


                        <div id="app" class="row">
                            <div class="col-lg-8" data-aos="fade-right" data-aos-delay="100">
                                <div class="">
                                    <div class="">
                                        <img src="{{asset('storage/'.$post->image)}}" width="100%">
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4" data-aos="fade-left" data-aos-delay="100">
                                <div class="card">
                                    <div class="card-body ">
                                        <h4 class="mb-4 ml-3">Newsletter</h4>
                                        <h6 class="card-title mb-3 ml-3">Be the first to to know about new job
                                            openings.</h6>
                                        <form class="form-group" action="/subscribe" method="post">@csrf
                                            <div class="form-inline">
                                                <input type="email" required
                                                       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                                                       name="subscriberemail" placeholder="Enter your email"
                                                       class="form-control mx-sm-3" required="">
                                            </div>
                                            <div class="form-inline mt-2">
                                                <input type="submit"
                                                       class="btn btn-outline-primary form-control mx-sm-3"
                                                       value="Subscribe"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div><!-- End Job description Section -->


                        <div class="col-lg-12 py-4" data-aos="fade-up">

                            <div class="jobdescriptn-item pb-0">
                                <h4 class="text-capitalize">{{$post->title}}</h4> <small>Created By:
                                    Admin {{$post->created_at->diffForHumans()}}</small>
                                <p>{!! html_entity_decode($post->content)!!}</p>
                            </div>
                        </div>
                    </div>


                </div>
            @else
                <div class="p-5">

                    <h3 class="p-5"><i class="fas fa-blog fa-4x mb-4" style="color: #012970"></i> <br>This blog post
                        does not exist. </h3>

                </div>
            @endif
        </div>
    </div>
    <script defer src="{{ ('/js/app.js') }}"></script>

@endsection
