@extends('layouts.main')

@section('content')
    <div class="py-5 mt-5">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-primary">
                    {{Session::get('message')}}</div>
            @endif
            <div class="row">
                @include('company.emp-left-menu')

                <div class="col-md-9">
                    @if(count($records )>0)
                        <table class="table table-striped">
                            <thead style="background-color: #3803B2; color: #fff">
                            <th>Interviewee</th>
                            <th>Meeting ID</th>
                            <th>Password</th>
                            <th>Join URL</th>
                            <th>Time</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>
                                        @php $applicant = App\Models\User::where('id',$record->applicant_id)->first();  @endphp
                                        {{$applicant->name}}
                                    </td>

                                    <td>
                                        {{$record->meeting_id}}
                                    </td>

                                    <td>
                                        {{$record->meeting_password}}
                                    </td>

                                    <td>
                                        <a id="mlink" href="{{$record->join_meeting_url}}"
                                           target="_blank"> {{$record->join_meeting_url}}</a>
                                        <style>
                                            #mlink {
                                                color: #03adfc;
                                                cursor: default;
                                            }

                                            #mlink:hover {
                                                color: #000000
                                            }
                                        </style>
                                    </td>
                                    <td>
                                        {{ date('F d, Y h:i:s A', strtotime($record->scheduled_time))}}

                                    </td>

                                    <td>
                                        <form action="{{route('api.deleteScheduledInterview', [$record->meeting_id])}}"
                                              method="POST">@csrf
                                            <button type="submit" class="badge badge-danger"><i
                                                    class="fas fa-trash-alt"> delete</i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div>
                            {{ $records->appends(Request::except('page'))->links('vendor.pagination.custom') }}
                        </div>

                    @else
                        <div class="mt-5 p-5">

                            <h5 class="mt-5 p-5"><i class="fas fa-history fa-3x" style="color: #012970"></i> <br>You
                                have not Scheduled Any Interview Meeting.</h5>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
