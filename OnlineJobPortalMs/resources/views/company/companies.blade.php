@extends('layouts.main')

@section('content')

    <div class="py-4 mt-4">
        <div class="container mt-5" id="app">
            {{-- Search Job  --}}
            <search-component></search-component>

            <!-- ======= Team Section ======= -->
            <section id="team" class="team mt-n2">
                <div class="container">

                    <div class="section-title mb-4" data-aos="fade-up">
                        <h2>List of</h2>
                        <p>Companies</p>
                    </div>


                    <div class="row" data-aos="fade-left">
                        @foreach($companies as $company)
                            @php $data = App\Http\Resources\Rating::collection(App\Models\Rating::all()->where('company_id', $company->id)); @endphp

                            @if($data->count() > 0)
                                @php
                                    $sum=0; $avg=0; //$max=5; $ratingPercentage=0;
                                   foreach($data as $rating){
                                        $sum += $rating['rating'];
                                    }
                                   $avg = $sum / count($data);
                                   $sum = number_format($sum, 1);
                                   $avg = number_format($avg, 1);
                                   $total = count($data);
                                @endphp
                            @endif


                            <div class="col-lg-3 col-md-6 mt-5 mt-md-0 mb-5">

                                <div class="member" data-aos="zoom-in" data-aos-delay="200">
                                    @if(!empty($company->logo))
                                        <div class="pic mb-5">
                                            <img src="{{asset('uploads/logo')}}/{{$company->logo}}" height="85px">
                                        </div>
                                    @else
                                        <div class="pic mb-5">
                                            <img src="{{asset('avatar/company.png')}}" height="85px">
                                        </div>
                                    @endif
                                    <div class="member-info">
                                        <h4>{{(str_limit($company->cname, 20))}}</h4>
                                        <div class="social">
                                            <a href="{{route('company.index',[$company->id,$company->slug])}}"
                                               class="btn btn-outline-primary btn-sm">Visit <i
                                                    class="fas fa-angle-double-right"></i></a>
                                        </div>
                                        @if($data->count() > 0)
                                            <div class="mt-1"
                                                 style="color: #000000; font-size: small; font-weight: bold">
                                                {{$avg ?? ''}}<i class="fa fa-star ml-1" style="color: #d4af37; "></i>
                                            </div>
                                        @endif

                                    </div>

                                </div>
                            </div>

                        @endforeach

                    </div>

                </div>
                {{ $companies->appends(Request::except('page'))->links('vendor.pagination.custom') }}
            </section><!-- End companies Section -->

        </div>
    </div>
    <style>
        .team .member .member-info {
            position: absolute;
            bottom: -100px;
            left: 0px;
            right: 0px;
            background: rgba(255, 255, 255, 0.9);
            padding: 15px 0;
            border-radius: 0 0 4px 4px;
            box-shadow: 0px 2px 15px rgb(0 0 0 / 10%);
            height: 115px;
        }
    </style>

    <script defer src="{{ ('/js/app.js') }}"></script>
@endsection
