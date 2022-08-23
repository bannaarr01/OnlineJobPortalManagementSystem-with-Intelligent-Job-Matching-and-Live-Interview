@extends('layouts.main')

@section('content')


    <div class="py-5 mt-5">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-primary">{{Session::get('message')}}</div>
            @endif


            <div class="row">

                @include('admin.left-menu')

                <div class="col-md-9">
                    @if(count($jobs)>0)
                        <h5>Reported Jobs</h5>
                        <table class="table">

                            <thead class="thead tabhead text-white">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Company</th>
                                <th scope="col">Report</th>
                                <th scope="col">Status</th>
                                <th scope="col">Reported</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jobs as $job)
                                @php $jobname = \App\Models\Job::where('id', $job->job_id)->get();
                                $companyname = \App\Models\Company::where('id', $job->company_id)->get();

                            //dd($jobname);
                                @endphp
                                <tr>
                                    <td>
                                        @foreach($jobname as $name)
                                            @php $no_of_times = DB::table('reported_jobs')
                                    ->select(DB::raw('*'))
                                    ->where('job_id', '=', $name->id )->get();
                                            //dd($h->count());
                                            @endphp
                                            {{$name->title}}
                                        @endforeach

                                    </td>

                                    <td>@foreach($companyname as $compname)
                                            {{$compname->cname}}
                                        @endforeach
                                    </td>
                                    <td>
                                        <span class="badge badge-danger">{{$no_of_times->count()}}</span>

                                    </td>
                                    <td>
                                        @foreach($jobname as $jobstatus)
                                            {{--                                        {{$jobstatus->status}}--}}
                                            @php //dd($jobstatus->id); @endphp
                                            @if($jobstatus->status == '1')
                                                <a href="{{route('job.toggle',[$jobstatus->id])}}"
                                                   class="badge badge-primary">Live </a>
                                            @else
                                                <a href="{{route('job.toggle',[$jobstatus->id])}}"
                                                   class="badge badge-secondary">Draft </a>
                                            @endif
                                        @endforeach
                                    </td>

                                    <td>{{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}
                                        {{--                                    {{$job->created_at->diffForHumans()}}--}}
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#exampleModal"><i class="fas fa-trash-alt"></i></button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-secondary text-white">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Job</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <i class="fas fa-question fa-2x mr-2" style="color: red"></i>
                                                        Are you sure you want to delete this job?
                                                    </div>
                                                    <form action="{{route('job.delete')}}" method="post">@csrf
                                                        <div class="modal-footer">
                                                            @foreach($jobname as $jobstatus)
                                                                <input type="hidden" name="id"
                                                                       value="{{$jobstatus->id}}">
                                                            @endforeach
                                                            <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close
                                                            </button>
                                                            <button type="submit" class="btn btn-danger btn-sm">YES <i
                                                                    class="fas fa-trash-alt"></i></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                        {{ $jobs->appends(Request::except('page'))->links('vendor.pagination.custom') }}
                    @else
                        <div class="mt-5 p-5">

                            <h5 class="mt-5 p-5"><i class="far fa-flag fa-3x" style="color: #012970"></i> <br>So far, no
                                job has been reported. </h5>

                        </div>
                    @endif
                </div>

            </div>


        </div>
    </div>
@endsection
