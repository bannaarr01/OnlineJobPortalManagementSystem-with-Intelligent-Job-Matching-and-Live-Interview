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
                    @if($users->count() > 0)
                        <h5>Deactivated Users / Inactive Accounts</h5>
                        <table class="table">
                            <thead class="thead tabhead text-white">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Email</th>
                                <th scope="col">Registered</th>
                                <th scope="col">Activate</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        @if($user->user_type == "seeker")
                                            {{$user->name}}
                                        @else
                                            {{$user->company['cname']}}
                                        @endif
                                    </td>

                                    <td>
                                        @if($user->user_type == "seeker")
                                            <span class="badge badge-secondary badge-pill">Job Seeker</span>
                                        @else
                                            <span class="badge badge-info badge-pill">Employer</span>
                                        @endif
                                    </td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                    <td><a href="{{route('user.restore', [$user->id])}}"
                                           class="btn btn-primary btn-sm text-white"><i
                                                class="fas fa-toggle-on ml-3 text-center mr-3"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $users->appends(Request::except('page'))->links('vendor.pagination.custom') }}
                    @else

                        <div class="mt-5 p-5">
                            <h5 class="mt-5 p-5"><i class="fas fa-power-off fa-3x" style="color: #012970"></i> <br>So
                                far, no Account has been deactivated. </h5>

                        </div>
                    @endif
                </div>


            </div>
        </div>
    </div>
@endsection



