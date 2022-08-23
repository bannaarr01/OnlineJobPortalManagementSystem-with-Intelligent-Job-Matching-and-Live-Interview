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
                    <div class="card">
                        <div class="card-header text-white blog-head" style="font-size:20px; font-weight: bold;">
                            Create Testimonial
                        </div>
                        <div class="card-body blog-border">
                            <form action="{{route('testimonial.store')}}" method="post"
                                  enctype="multipart/form-data">@csrf

                                <div class="form-group">

                                    <div class="form-group">
                                        <label for="Name">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               name="name" value="{{ old('name') }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="Profession">Profession</label>
                                        <input type="text"
                                               class="form-control @error('profession') is-invalid @enderror"
                                               name="profession" value="{{ old('profession') }}">
                                        @error('profession')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="Title">Content</label>
                                        <textarea class="form-control @error('content') is-invalid @enderror"
                                                  id="editor" name="content">{{ old('content') }}</textarea>
                                        @error('content')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image"
                                               class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <input type="submit" class="btn btn-admin text-white" value="Create">
                                    </div>

                            </form>
                        </div>

                    </div>
                </div>

            </div>


        </div>
    </div>
@endsection



