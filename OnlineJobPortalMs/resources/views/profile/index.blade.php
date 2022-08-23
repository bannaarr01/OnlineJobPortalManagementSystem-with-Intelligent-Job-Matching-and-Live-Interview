@extends('layouts.main')

@section('content')
    <div class="py-5 mt-5">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-primary">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="row">

                @include('.profile.seeker-left-menu')

                <div class="col-md-4">
                    <div class="card border-primary">
                        <div class="card-header border-primary profilecard">
                            Update Your Profile
                        </div>

                        {{-- Profile Create Route--}}
                        <form action="{{route('profile.create')}}" method="post">@csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" name="address"
                                           value="{{Auth::user()->profile->address}}">
                                    @if($errors->has('address'))
                                        <div class="error alert alert-danger">{{$errors->first('address')}}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="">Phone number</label>
                                    <input type="text" class="form-control" name="phone_number"
                                           value="{{Auth::user()->profile->phone_number}}">
                                    @if($errors->has('phone_number'))
                                        <div
                                            class="error alert alert-danger">{{$errors->first('phone_number')}}</div>
                                    @endif
                                </div>

                                @if(empty(Auth::user()->profile->gender))
                                    <div class="form-group">
                                        <label for="">Gender</label>
                                        <input type="text" placeholder="male or female" class="form-control"
                                               name="gender">
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="">Experience</label>
                                    <textarea class="form-control" name="experience"
                                              class="form-control">{{Auth::user()->profile->experience}}</textarea>
                                    @if($errors->has('experience'))
                                        <div class="error alert alert-danger">{{$errors->first('experience')}}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="">Bio</label>
                                    <textarea class="form-control" name="bio"
                                              class="form-control">{{Auth::user()->profile->bio}}</textarea>
                                    @if($errors->has('bio'))
                                        <div class="error alert alert-danger">{{$errors->first('bio')}}</div>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <button class="btn btn-primary float-right mb-3" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>


                    <!--Upload Resume-->
                    <div class="mt-3">
                        <form action="{{route('resume')}}" method="post" enctype="multipart/form-data">@csrf
                            <div class="card border-primary">
                                <div class="card-header border-primary profilecard">Update Resume</div>
                                <div class="card-body">
                                    <input type="file" class="form-control" name="resume">
                                    <br>
                                    <button class="btn btn-primary float-right" type="submit">Update</button>
                                    @if($errors->has('resume'))
                                        <div class="error" style="color: red;">{{$errors->first('resume')}}</div>
                                    @endif
                                </div>


                            </div>
                        </form>

                    </div>
                </div>


                <!--About You Section -->
                <div class="col-md-4">
                    <div class="card border-primary">
                        <div class="card-header border-primary profilecard">About you</div>
                        <div class="card-body">
                            <p>Name:<span class="lead text-dark"> {{Auth::user()->name}}</span></p>
                            <p>Email: {{Auth::user()->email}}</p>
                            <p>Address: {{Auth::user()->profile->address}}</p>
                            <p>Phone number: {{Auth::user()->profile->phone_number}}</p>
                            @if(!empty(Auth::user()->profile->gender))
                                <p>Gender: {{Auth::user()->profile->gender}}</p>
                            @endif
                            <p>Experience: {{Auth::user()->profile->experience}}</p>
                            <p>Bio: {{Auth::user()->profile->bio}}</p>
                            <p>Member since: {{date('F d Y',strtotime(Auth::user()->created_at))}}</p>

                            <!-- If User have cover letter or not -->
                            @if(!empty(Auth::user()->profile->cover_letter))
                                <p><a id="covletlink" href="{{Storage::url(Auth::user()->profile->cover_letter)}}">
                                        <i class="fas fa-eye  btn btn-outline-primary btn-sm"> View Cover letter</i></a>
                                </p>
                            @else
                                <p style="color:red">Upload your cover letter !</p>
                            @endif

                        <!--Go to Storage to fetch the resume -->
                            @if(!empty(Auth::user()->profile->resume))
                                <p><a id="reslink" href="{{Storage::url(Auth::user()->profile->resume)}}"><i
                                            class="fas fa-eye  btn btn-outline-primary btn-sm"> View Resume</i></a></p>

                            @else
                                <p style="color:red">Upload your resume !</p>
                            @endif


                        </div>
                    </div>


                    {{-- csrf -- Form won't submit if this ommitted for security reasons cos unique token will b generated on submission --}}
                    <div class="mt-3">
                        <form action="{{route('cover.letter')}}" method="post" enctype="multipart/form-data">@csrf
                            <div class="card border-primary">
                                <div class="card-header border-primary profilecard">Update Cover Letter</div>
                                <div class="card-body">
                                    <input type="file" class="form-control" name="cover_letter"><br>
                                    <button class="btn btn-primary float-right" type="submit">Update</button>
                                    @if($errors->has('cover_letter'))
                                        <div class="error" style="color: red;">{{$errors->first('cover_letter')}}</div>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

                <style>
                    #reslink, #covletlink {
                        color: #03adfc
                    }

                    .profilecard {
                        font-size: 15px;
                        font-weight: bold;
                        background-color: #3803B2;
                        color: #fff;
                    }
                </style>
            </div>
        </div>
    </div>


@endsection
