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
                    <table class="table">
                        <thead class="thead tabhead text-white">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Company</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jobs as $job)
                            <tr>
                                <td>{{$job->title}}</td>
                                <td>{{$job->company->cname}}</td>
                                <td> @if($job->status=='0')
                                        <a href="{{route('job.toggle',[$job->id])}}" class="badge badge-secondary">
                                            Draft</a>

                                    @else
                                        <a href="{{route('job.toggle',[$job->id])}}" class="badge badge-primary">
                                            Live</a>
                                    @endif</td>
                                <td>{{$job->created_at->diffForHumans()}}</td>
                                <td class="row"><a href="{{route('jobs.show', [$job->id,$job->slug])}}"
                                                   class="btn btn-admin btn-sm text-white"><i
                                            class="fas fa-eye"></i></a>


                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm ml-2" data-toggle="modal"
                                            data-target="#exampleModal{{$job->id}}"><i class="fas fa-trash-alt"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$job->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-secondary text-white">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete job</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <i class="fas fa-question fa-2x mr-2" style="color: red"></i>
                                                    Are you sure you want to delete this job?
                                                </div>
                                                <form action="{{route('job.delete')}}" method="POST">@csrf
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id" value="{{$job->id}}">
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
                </div>

            </div>


        </div>
        </dav>
@endsection
