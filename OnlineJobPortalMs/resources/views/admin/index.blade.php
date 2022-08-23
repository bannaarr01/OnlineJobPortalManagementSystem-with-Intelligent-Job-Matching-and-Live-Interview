@extends('layouts.main')

@section('content')


    <div class="py-5 mt-5">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-primary">{{Session::get('message')}}</div>
            @endif

            <div class="row">

                @include('admin.left-menu')

                <div class="col-md-9 mt-5">
                    <div class="row">
                        <div class="col-xl-4 col-sm-6 col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div class="align-self-center">
                                            <i class="fas fa-users text-info fa-3x"></i>
                                        </div>
                                        <div class="text-end">
                                            <h3>{{$users->count()}}</h3>
                                            <p class="mb-0">Job Seekers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div class="align-self-center">
                                            <i class="fas fa-building text-secondary fa-3x"><i style="font-size: 28px"
                                                                                               class="fas fa-user-tie text-secondary"></i></i>
                                        </div>
                                        <div class="text-end">
                                            <h3 class="text-warning">{{$employers->count()}}</h3>
                                            <p class="mb-0">Employers</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div class="align-self-center">
                                            <i class="fas fa-plus text-primary fa-3x"></i>
                                        </div>
                                        <div class="text-end">
                                            <h6 class="ml-2">New Registered
                                                User {{$latestUser->created_at->diffForHumans()}}</h6><h6></h6>
                                            <p class="mb-0 mt-n1 ml-2">{{$latestUser->email}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xl-4 col-sm-6 col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div>
                                            <h3 class="text-primary">{{$jobs->count()}}</h3>
                                            <p class="mb-0">Live Jobs</p>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="fas fa-briefcase text-primary fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div>
                                            <h3 class="text-success">{{$approvals->count()}}</h3>
                                            <p class="mb-0">Aprroval</p>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="fas fa-chart-line text-success fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div>
                                            <h3 class="text-danger">{{$declined->count()}}</h3>
                                            <p class="mb-0">Declined</p>
                                        </div>
                                        <div class="align-self-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                 fill="currentColor" class="bi bi-graph-down" viewBox="0 0 16 16"
                                                 style="color: red;">
                                                <path fill-rule="evenodd"
                                                      d="M0 0h1v15h15v1H0V0zm10 11.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-1 0v2.6l-3.613-4.417a.5.5 0 0 0-.74-.037L7.06 8.233 3.404 3.206a.5.5 0 0 0-.808.588l4 5.5a.5.5 0 0 0 .758.06l2.609-2.61L13.445 11H10.5a.5.5 0 0 0-.5.5z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xl-4 col-sm-6 col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div>
                                            <h3 class="text-warning">{{$reportedJobs->count()}}</h3>
                                            <p class="mb-0 text">Reported Jobs</p>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="fas fa-flag text-warning fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div>
                                            <h3 class="text-info">{{$jobCategories->count()}}</h3>
                                            <p class="mb-0">Job Categories</p>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="fas fa-layer-group text-info fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div>
                                            <h3 class="text-success">{{$subscriber->count()}}</h3>
                                            <p class="mb-0">Subscribers</p>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="fas fa-bell text-success fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xl-4 col-sm-6 col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div>
                                            <h3 class="text-info">{{$posts->count()}}</h3>
                                            <p class="mb-0 text">Live Blog Post</p>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="fas fa-book-open text-info fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>
@endsection



