@extends('layouts.main')

@section('content')


    <div class="py-5 mt-5">
        <div class="container" id="app">
            @if(Session::has('message'))
                <div class="alert alert-primary">{{Session::get('message')}}</div>
            @endif


            <div class="row">

                @include('admin.left-menu')

                <div class="col-md-9">
                    {{--  Vue Js to search users--}}
                    <searchuser-component></searchuser-component>

                    <table class="table">
                        <thead class="thead tabhead text-white">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Email</th>
                            <th scope="col">Registered</th>
                            <th scope="col">Deactivate</th>
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
                                <td>


                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm ml-2" data-toggle="modal"
                                            data-target="#exampleModal{{$user->id}}"><i
                                            class="fas fa-power-off ml-3 text-center mr-3"></i></button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i
                                                            class="fas fa-user-lock fa-2x"></i> Deactivate user</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <i class="fas fa-question fa-2x mr-2" style="color: red"></i>
                                                    Are you sure you want to deactivate this user?
                                                </div>
                                                <form action="{{route('user.destroy')}}" method="POST">@csrf
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id" value="{{$user->id}}">
                                                        <button type="button" class="btn btn-secondary btn-sm"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                        <button type="submit" class="btn btn-danger btn-sm">YES <i
                                                                class="fas fa-power-off"></i></button>
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
                    {{ $users->appends(Request::except('page'))->links('vendor.pagination.custom') }}
                </div>

            </div>


        </div>
    </div>
@endsection
