<style>
    #comp_link {
        color: #010483;
    }

    #comp_link:hover {
        color: #ff006a;
    }
</style>
<section id="clients" class="clients">
    <div class="container" data-aos="fade-up">
        <div class="section-title aos-init aos-animate">
            <h2>Featured</h2>
            <p>Top Employers</p>
        </div>
        <div class="clients-slider swiper-container">
            <div class="swiper-wrapper align-items-center">
                @foreach($companies as $company)
                    @if(!empty($company->logo))

                        <a class="swiper-slide border-0 ml-2"
                           href="{{route('company.index',[$company->id,$company->slug])}}"><img
                                src="{{asset('uploads/logo')}}/{{$company->logo}}" width="50"></a>


                    @else
                        <a class="swiper-slide border-0 ml-2"
                           href="{{route('company.index',[$company->id,$company->slug])}}"><img
                                src="{{asset('avatar/company.png')}}" width="50"></a>
                        @endif

                        </a>
                        @endforeach
            </div>

            <div class="swiper-pagination"></div>
        </div>
    </div>

</section><!-- End Top Employers Section -->
