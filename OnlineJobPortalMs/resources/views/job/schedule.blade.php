@extends('layouts.main')

@section('content')
    <div class="py-5 mt-5">
        <div class="container">
            @if (session('err_message'))
                <div class="alert alert-primary">
                    {{ session('err_message') }}
                </div>
            @endif

            <div class="row">
                @include('company.emp-left-menu')
                <div class="col-md-4">
                    <div class="card border-primary">
                        <div class="mt-3 card-form ml-4" style="font-weight: bold">
                            <h5>{{ __('Schedule Interview for') }} {{$user->name}} </h5>
                        </div>
                        <hr class="border-primary"/>
                        <div class="card-body">
                            <h6 class="lead mt-n3 mb-4"><em style="color: darkred; font-size: 14px">Ensure the date
                                    field is entered according to format</em></h6>
                            @php $emp_id = Auth::user()->id;  @endphp
                            <form class="d-inline" method="POST"
                                  action="{{route('schedule.interview',[$job_id, $user->id, $emp_id])}}"> @csrf
                                <div class="form-group">
                                    <label for="Interview" class="display-5">Enter Date</label>
                                    <input name="topic" type="hidden" value="interview">
                                    <input name="agenda" type="hidden" value="Interview">
                                    @php $now = \Carbon\Carbon::now() @endphp
                                    <input name="date_time" class="form-control " placeholder="{{$now->toDateString()}}"
                                           required="">
                                </div>

                                <div class="form-group">
                                    <label for="timing">Type </label>
                                    <select name="timing" class="form-control" required="">
                                        <option value="08:00:00">08:00</option>
                                        <option value="08:30:00">08:30</option>
                                        <option value="09:00:00">09:00</option>
                                        <option value="09:30:00">09:30</option>
                                        <option value="10:00:00">10:00</option>
                                        <option value="10:30:00">10:30</option>

                                        <option value="11:00:00">11:00</option>
                                        <option value="11:30:00">11:30</option>
                                        <option value="12:00:00">12:00</option>
                                        <option value="12:30:00">12:30</option>
                                        <option value="13:00:00">13:00</option>
                                        <option value="13:30:00">13:30</option>

                                        <option value="14:00:00">14:00</option>
                                        <option value="14:30:00">14:30</option>
                                        <option value="15:00:00">15:00</option>
                                        <option value="15:30:00">15:30</option>
                                        <option value="16:00:00">16:00</option>
                                        <option value="16:30:00">16:30</option>

                                        <option value="17:00:00">17:00</option>
                                        <option value="17:30:00">17:30</option>


                                    </select>

                                </div>
                                <button type="submit" class="btn btn-outline-primary mt-2 float-right"><i
                                        class="far fa-calendar-check"></i> Schedule
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <img src="{{ asset('template/assets/img/interview.png ') }}" class="img-fluid mt-5">

                </div>
            </div>
        </div>
    </div>
@endsection
