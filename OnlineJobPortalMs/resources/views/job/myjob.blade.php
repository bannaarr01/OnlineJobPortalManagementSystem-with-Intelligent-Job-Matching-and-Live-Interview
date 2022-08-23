@extends('layouts.main')

@section('content')
    <div class="py-5 mt-5">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-primary">
                    {{Session::get('message')}}</div>
            @endif
            <div class="row ">
                @include('company.emp-left-menu')

                <div class="col-md-9">
                    @if(count($jobs)>0)
                        <table class="table table-striped">
                            <thead style="background-color: #3803B2; color: #fff">
                            <th>Logo</th>
                            <th>Position</th>
                            <th>Address</th>
                            <th>Time</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($jobs as $job)
                                <tr>
                                    <td>
                                        @if(empty(Auth::user()->company->logo))
                                            <img src="{{asset('avatar/avatar.png')}}" width="50"/>
                                        @else
                                            <img src="{{asset('uploads/logo/')}}/{{Auth::user()->company->logo}}"
                                                 width="50"/>
                                        @endif

                                    </td>
                                    <td>Position: {{$job->position}}
                                        <br>
                                        <i class="fas fa-briefcase" style="color: #3490dc"></i>
                                        &nbsp;{{$job->type}}
                                    </td>
                                    <td><i class="fa fa-map-marker" aria-hidden="true"
                                           style="color: #3490dc"></i>&nbsp;{{$job->address}}</td>

                                    <td><i class="fa fa-clock" aria-hiden="true" style="color: #3490dc"></i>
                                        {{$job->created_at->diffForHumans() }}
                                    </td>


                                    <td>
                                        <a href="{{route('jobs.show', [$job->id,$job->slug])}}">
                                            <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button>
                                        </a>

                                        <a href="{{route('job.edit', [$job->id])}}">
                                            <button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                                        </a>
                                        <a href="{{route('myjob.delete', [$job->id])}}">
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{ $jobs->appends(Request::except('page'))->links('vendor.pagination.custom') }}
                        </div>


                    @else
                        <div class="mt-5 p-5">

                            <h5 class="mt-5 p-5"><i class="fas fa-briefcase fa-3x" style="color: #012970"></i> <br>You
                                have not Post Any Job.
                                <br><em><a id="postlink" href="/jobs/create">Post Job</a></em></h5>
                            <style> #postlink {
                                    color: #03adfc;
                                    font-size: 15px;
                                }

                                #postlink:hover {
                                    color: #000000;
                                    font-size: 18px;
                                }</style>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
