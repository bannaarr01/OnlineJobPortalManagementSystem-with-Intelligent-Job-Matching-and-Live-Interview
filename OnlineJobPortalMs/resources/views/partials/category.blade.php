<!-- ======= Category Section ======= -->
<section id="features" class="features">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Categories</h2>
            <p>Featured Job Categories</p>
        </div>

        <div class="row" data-aos="fade-left">
            @foreach($categories as $category)
                <div class="col-lg-4 col-md-4 mb-3">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                        <i class="ri-file-list-3-line" style="color: #03adfc;"></i>
                        <h3><a href="{{route('category.index', [$category->id])}}">{{$category->name}} <h3 id="count"
                                                                                                           class="d-flex justify-content-lg-center mt-2">{{$category->jobs->count()}}</h3>
                            </a></h3>

                    </div>
                </div>
                <style>
                    #count {
                        font-size: 18px;
                        color: #ff006a;
                        display: inline-block;
                        font-weight: bold;
                    }
                </style>

            @endforeach

        </div>

    </div>
</section><!-- End Features Section -->

