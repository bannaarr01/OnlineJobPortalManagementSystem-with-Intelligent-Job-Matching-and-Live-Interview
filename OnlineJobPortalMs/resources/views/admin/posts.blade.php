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
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <th><img src="{{asset('storage/'.$post->image)}}" width="50"></th>
                                <td>{{$post->title}}</td>
                                <td>{!! html_entity_decode(str_limit($post->content, 20))!!}</td>

                                <td> @if($post->status == '1')
                                        <a href="{{route('post.toggle',[$post->id])}}"
                                           class="badge badge-primary">Live </a>
                                    @else
                                        <a href="{{route('post.toggle',[$post->id])}}" class="badge badge-secondary">Draft </a>
                                    @endif</td>

                                <td>{{$post->created_at->diffForHumans()}}</td>
                                <td><a href="{{route('post.edit', [$post->id])}}"
                                       class="btn btn-admin btn-sm text-white"><i class="fas fa-edit"></i></a>


                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#exampleModal{{$post->id}}"><i class="fas fa-trash-alt"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$post->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-secondary text-white">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <i class="fas fa-question fa-2x mr-2" style="color: red"></i>
                                                    Are you sure you want to delete this post?
                                                </div>
                                                <form action="{{route('post.delete')}}" method="post">@csrf
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id" value="{{$post->id}}">
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
                    {{ $posts->appends(Request::except('page'))->links('vendor.pagination.custom') }}
                </div>


            </div>
        </div>
    </div>
@endsection



