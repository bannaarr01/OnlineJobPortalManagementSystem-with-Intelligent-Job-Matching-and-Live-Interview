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
                            <th scope="col">Name</th>
                            <th scope="col">Content</th>
                            <th scope="col">Profession</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($testimonials as $testimonial)
                            <tr>
                                <th><img src="{{asset('storage/'.$testimonial->image)}}" width="50"></th>
                                <td>{{$testimonial->name}}</td>
                                <td>{!! html_entity_decode(str_limit($testimonial->content, 20))!!}</td>
                                <td>{{$testimonial->profession}}</td>
                                <td><a href="#" class="btn btn-admin btn-sm text-white"><i class="fas fa-edit"></i></a>


                                    {{-- Button trigger modal --}}
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#exampleModal{{$testimonial->id}}"><i
                                            class="fas fa-trash-alt"></i></button>

                                    {{-- Modal --}}
                                    <div class="modal fade" id="exampleModal{{$testimonial->id}}" tabindex="-1"
                                         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-secondary text-white">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete
                                                        testimonial</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <i class="fas fa-question fa-2x mr-2" style="color: red"></i>
                                                    Are you sure you want to delete this testimonial?
                                                </div>
                                                <form action="#" method="testimonial">@csrf
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id" value="{{$testimonial->id}}">
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
                    {{ $testimonials->appends(Request::except('page'))->links('vendor.pagination.custom') }}
                </div>


            </div>
        </div>
    </div>
@endsection



