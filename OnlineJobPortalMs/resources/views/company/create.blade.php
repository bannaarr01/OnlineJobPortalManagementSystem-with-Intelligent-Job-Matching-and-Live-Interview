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

            @include('company.emp-left-menu')

            <!--Update Company Information-->
                <div class="col-md-5">
                    <div class="card border-primary">
                        <div class="card-header border-primary"
                             style="font-size:15px; font-weight: bold; background-color: #3803B2; color: #fff">
                            Update Your Company Information
                        </div>
                        <form action="{{route('company.store')}}" method="post">@csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" name="address"
                                           value="{{Auth::user()->company->address}}">
                                    @if($errors->has('address'))
                                        <div class="error" style="color: red;">{{$errors->first('address')}}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" name="phone"
                                           value="{{Auth::user()->company->phone}}">
                                    @if($errors->has('phone'))
                                        <div class="error" style="color: red;">{{$errors->first('phone')}}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="">Website</label>
                                    <input type="text" class="form-control" placeholder="yourwebsite.com" name="website"
                                           value="{{Auth::user()->company->website}}">
                                </div>

                                <div class="form-group">
                                    <label for="">Slogan</label>
                                    <input type="text" class="form-control" name="slogan"
                                           value="{{Auth::user()->company->slogan}}">
                                    @if($errors->has('slogan'))
                                        <div class="error" style="color: red;">{{$errors->first('slogan')}}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea class="form-control"
                                              name="description">{{Auth::user()->company->description}}</textarea>
                                    @if($errors->has('description'))
                                        <div class="error" style="color: red;">{{$errors->first('description')}}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>
                    </div>

                </div>
                </form>


                <div class="col-md-4">
                    <div class="card border-primary">
                        <div class="card-header border-primary"
                             style="font-size:15px; font-weight: bold; background-color: #3803B2; color: #fff">About
                            your company
                        </div>
                        <div class="card-body">

                            <p>Company Name: {{Auth::user()->company->cname}}</p>
                            <p>Address: {{Auth::user()->company->address}}</p>
                            <p>Phone: {{Auth::user()->company->phone}}</p>
                            <p>Slogan: {{Auth::user()->company->slogan}}</p>
                            <p>Company Page: <a href="company/{{Auth::user()->company->slug}}">View</a></p>
                            <p>Description: {{Auth::user()->company->description}}</p>
                            {{--  Do not show website button if company donot have website--}}
                            @if(!empty(Auth::user()->company->website))
                                <p class="btn btn-primary btn-sm"><a href="https://{{Auth::user()->company->website}}"
                                                                     style="text-decoration: none; color: white">Visit
                                        Company Website <i class="fas fa-external-link-alt"></i></a></p>
                        </div>
                    </div>
                    @endif
                    <br>

                    <form action="{{route('cover.photo')}}" method="post" enctype="multipart/form-data">@csrf
                        <div class="card border-primary">
                            <div class="card-header border-primary"
                                 style="font-size:15px; font-weight: bold; background-color: #3803B2; color: #fff">
                                Update Cover Photo
                            </div>
                            <div class="card-body">
                                <input type="file" class="form-control" name="cover_photo"><br>
                                <button class="btn btn-primary float-right" type="submit">Update</button>
                                @if($errors->has('cover_photo'))
                                    <div class="error" style="color: red;">{{$errors->first('cover_photo')}}</div>
                                @endif
                            </div>
                        </div>
                    </form>
                    <br>


                </div>
            </div>
        </div>
@endsection
