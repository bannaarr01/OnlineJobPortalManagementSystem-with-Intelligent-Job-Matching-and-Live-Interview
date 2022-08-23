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
                    @if($posts->count() > 0)
                        <h5>Trashed Blog Post</h5>
                        <table class="table">
                            <thead class="thead tabhead text-white">
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                                <th scope="col">Restore</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th><img src="{{asset('storage/'.$post->image)}}" width="50"></th>
                                    <td>{{$post->title}}</td>
                                    <td>{!! html_entity_decode(str_limit($post->content, 20))!!}</td>

                                    <td> @if($post->status == '1')
                                            <a href="#" class="badge badge-primary">Live </a>
                                        @else
                                            <a href="#" class="badge badge-secondary">Draft </a>
                                        @endif</td>

                                    <td>{{$post->created_at->diffForHumans()}}</td>
                                    <td><a href="{{route('post.restore', [$post->id])}}"
                                           class="btn btn-primary btn-sm text-white ml-2"><i
                                                class="fas fa-undo-alt ml-1 text-center mr-1"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{route('post.removeTrash', [$post->id])}}"
                                           class="btn btn-danger btn-sm text-white ml-2"><i
                                                class="fas fa-trash-alt ml-1 text-center mr-1"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $posts->appends(Request::except('page'))->links('vendor.pagination.custom') }}
                    @else

                        <div class="col-md-8 offset-4 mt-5 py-5">
                            <i class="far fa-trash-alt fa-2x text-muted ml-5"></i>
                            <h3 class="text-muted">Empty Bin</h3>
                        </div>
                    @endif
                </div>


            </div>
        </div>
    </div>
@endsection



