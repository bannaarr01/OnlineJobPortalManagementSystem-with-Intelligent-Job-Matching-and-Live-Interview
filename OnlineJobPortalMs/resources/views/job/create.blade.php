@extends('layouts.main')

@section('content')
    <div class="py-5 mt-5">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-primary">
                    {{Session::get('message')}}
                </div>
            @endif

            <div class="row">
                @include('company.emp-left-menu')
                <div class="col-md-9">
                    <div class="card border-primary">
                        <div class="card-header border-primary"
                             style="font-size:15px; font-weight: bold; background-color: #3803B2; color: #fff">Create a
                            Job
                        </div>
                        <div class="card-body">


                            <form action="{{route('jobs.store')}}" method="post">@csrf
                                <div class="form-group">
                                    <label for="title">Job Title: </label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror"
                                           value="{{ old('title') }}">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Description: </label>
                                    <textarea type="text" name="description"
                                              class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="role">Roles and Responsibilities: </label>
                                    <textarea type="text" name="roles"
                                              class="form-control @error('roles') is-invalid @enderror">{{old('roles')}}</textarea>
                                    @error('roles')
                                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="category">Category: </label>
                                    <select name="category_id" class="form-control">
                                        @foreach(App\Models\Category::all() as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="position">Position: </label>
                                    <input type="text" name="position"
                                           class="form-control @error('position') is-invalid @enderror"
                                           value="{{ old('position') }}">
                                    @error('position')
                                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="address">Address / Location: </label>
                                    <input type="text" name="address"
                                           class="form-control @error('address') is-invalid @enderror"
                                           value="{{ old('address') }}">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="type">State: </label>
                                    <select name="state" class="form-control">
                                        <option value="kuala_lumpur">Kuala Lumpur</option>
                                        <option value="putrajaya">Putrajaya</option>
                                        <option value="negeri_sembilan">Negeri Sembilan</option>
                                        <option value="johor">Johor</option>
                                        <option value="kedah">Kedah</option>
                                        <option value="kelantan">Kelantan</option>
                                        <option value="malacca">Malacca</option>
                                        <option value="pahang">Pahang</option>
                                        <option value="penang">Penang</option>
                                        <option value="perak">Perak</option>
                                        <option value="perlis">Perlis</option>
                                        <option value="sabah">Sabah</option>
                                        <option value="sarawak">Sarawak</option>
                                        <option value="selangor">Selangor</option>
                                        <option value="terengganu">Terengganu</option>
                                        <option value="labuan">Labuan</option>
                                    </select>

                                </div>


                                <div class="form-group">
                                    <label for="type">Type: </label>
                                    <select name="type" class="form-control">
                                        <option value="fulltime">Full Time</option>
                                        <option value="parttime">Part Time</option>
                                        <option value="contract">Contract</option>
                                        <option value="remote">Remote</option>
                                        <option value="internship">Internship</option>
                                    </select>

                                </div>


                                <div class="form-group">
                                    <label for="experience">Experience: </label>
                                    <input type="text" name="experience"
                                           class="form-control @error('experience') is-invalid @enderror"
                                           value="{{ old('experience') }}">
                                    @error('experience')
                                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="number_of_vacancy">Number of Vacancy: </label>
                                    <input type="text" name="number_of_vacancy"
                                           class="form-control @error('number_of_vacancy') is-invalid @enderror"
                                           value="{{ old('number_of_vacancy') }}">
                                    @error('number_of_vacancy')
                                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="salary">Salary: </label>
                                    <input type="text" name="salary" placeholder="500 or 1000-70000"
                                           class="form-control @error('salary') is-invalid @enderror"
                                           value="{{ old('salary') }}">
                                    @error('salary')
                                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="qualification">Qualification: </label>
                                    <input type="text" name="qualification"
                                           class="form-control @error('qualification') is-invalid @enderror"
                                           value="{{ old('qualification') }}">
                                    @error('qualification')
                                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="status">Status: </label>
                                    <select name="status" class="form-control">
                                        <option value="0">draft</option>
                                        <option value="1">live</option>
                                        <option value="2">closed</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="lastdate">Last date of application: </label>
                                    <input name="last_date" type="text" id="datepicker"
                                           class="form-control @error('last_date') is-invalid @enderror"
                                           value="{{ old('last_date') }}">
                                    @error('last_date')
                                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
