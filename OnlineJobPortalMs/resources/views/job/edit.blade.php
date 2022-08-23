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
                             style="font-size:15px; font-weight: bold; background-color: #3803B2; color: #fff">Update a
                            Job
                        </div>
                        <div class="card-body">


                            {{--Job Update--}}
                            <form action="{{route('job.update',[$job->id])}}" method="post">@csrf
                                <div class="form-group">
                                    <label for="title">Job Title: </label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror"
                                           value="{{$job->title}}">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Description: </label>
                                    <textarea type="text" name="description"
                                              class="form-control @error('description') is-invalid @enderror">{{$job->description}}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="role">Roles and Responsibilities: </label>
                                    <textarea type="text" name="roles"
                                              class="form-control @error('roles') is-invalid @enderror">{{$job->roles}}</textarea>
                                    @error('roles')
                                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                                {{--From Cat table, check if cat equals d foreign category_id on jobs table else set as default--}}
                                <div class="form-group">
                                    <label for="category">Category: </label>
                                    <select name="category_id" class="form-control">
                                        @foreach(App\Models\Category::all() as $cat)
                                            <option
                                                value="{{$cat->id}}" {{$cat->id==$job->category_id?'selected':''}}>{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="position">Position: </label>
                                    <input type="text" name="position"
                                           class="form-control @error('position') is-invalid @enderror"
                                           value="{{$job->position}}">
                                    @error('position')
                                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="address">Address: </label>
                                    <input type="text" name="address"
                                           class="form-control @error('address') is-invalid @enderror"
                                           value="{{$job->address}}">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="state">State: </label>
                                    <select name="state" class="form-control">
                                        <option value="kuala_lumpur"{{$job->state=='kuala_lumpur'?'selected':''}}>Kuala
                                            Lumpur
                                        </option>
                                        <option value="putrajaya"{{$job->state=='putrajaya'?'selected':''}}>Putrajaya
                                        </option>
                                        <option value="negeri_sembilan"{{$job->state=='negeri_sembilan'?'selected':''}}>
                                            Negeri Sembilan
                                        </option>
                                        <option value="johor"{{$job->state=='johor'?'selected':''}}>Johor</option>
                                        <option value="kedah"{{$job->state=='kedah'?'selected':''}}>Kedah</option>
                                        <option value="kelantan"{{$job->state=='kelantan'?'selected':''}}>Kelantan
                                        </option>
                                        <option value="malacca"{{$job->state=='malacca'?'selected':''}}>Malacca</option>
                                        <option value="pahang"{{$job->state=='pahang'?'selected':''}}>Pahang</option>
                                        <option value="penang"{{$job->state=='penang'?'selected':''}}>Penang</option>
                                        <option value="perak"{{$job->state=='perak'?'selected':''}}>Perak</option>
                                        <option value="perlis"{{$job->state=='perlis'?'selected':''}}>Perlis</option>
                                        <option value="sabah"{{$job->state=='sabah'?'selected':''}}>Sabah</option>
                                        <option value="sarawak"{{$job->state=='sarawak'?'selected':''}}>Sarawak</option>
                                        <option value="selangor"{{$job->state=='selangor'?'selected':''}}>Selangor
                                        </option>
                                        <option value="terengganu"{{$job->state=='terengganu'?'selected':''}}>
                                            Terengganu
                                        </option>
                                        <option value="labuan"{{$job->state=='labuan'?'selected':''}}>Labuan</option>
                                    </select>

                                </div>


                                <div class="form-group">
                                    <label for="type">Type: </label>
                                    <select name="type" class="form-control">
                                        <option value="fulltime"{{$job->type=='fulltime'?'selected':''}}>Full Time
                                        </option>
                                        <option value="parttime"{{$job->type=='parttime'?'selected':''}}>Part Time
                                        </option>
                                        <option value="contract"{{$job->type=='contract'?'selected':''}}>Contract
                                        </option>
                                        <option value="remote"{{$job->type=='remote'?'selected':''}}>Remote</option>
                                        <option value="internship"{{$job->type=='internship'?'selected':''}}>
                                            Internship
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="experience">Experience: </label>
                                    <input type="text" name="experience"
                                           class="form-control @error('experience') is-invalid @enderror"
                                           value="{{ $job->experience }}">
                                    @error('experience')
                                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status">Status: </label>
                                    <select class="form-control" name="status">
                                        <option value="0"{{$job->status=='0' ?'selected':''}}>draft</option>
                                        <option value="1"{{$job->status=='1' ?'selected':''}}>live</option>
                                        <option value="2"{{$job->status=='2' ?'selected':''}}>closed</option>


                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="number_of_vacancy">Number of Vacancy: </label>
                                    <input type="text" name="number_of_vacancy"
                                           class="form-control @error('number_of_vacancy') is-invalid @enderror"
                                           value="{{ $job->number_of_vacancy }}">
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
                                           value="{{ $job->salary }}">
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
                                           value="{{ $job->qualification }}">
                                    @error('qualification')
                                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="lastdate">Last date of application: </label>
                                    <input name="last_date" type="text" id="datepicker"
                                           class="form-control @error('last_date') is-invalid @enderror"
                                           value="{{ $job->last_date }}">
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
