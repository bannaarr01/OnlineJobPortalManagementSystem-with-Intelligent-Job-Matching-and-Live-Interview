<style>
    iframe, .vid-modal {
        background: #000000;
    }
</style>

<!-- VIDEO MODAL -->
<div class="modal fade" id="videoModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body vid-modal">
                <button class="close" data-dismiss="modal"><span style="color: #ffff; font-size: larger;"></span>&times;
                </button>
                <iframe id="YtubeVideo" class="responsive-iframe" width="100%" height="250"
                        src="//www.youtube.com/embed/QH9s0Lf_z4g?autoplay=0" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<section id="about" class="about">
    <div class="container-fluid">
        <div class="row">
            <!-- ======= Testimonial Vid Section ======= -->
            <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch"
                 data-aos="fade-right">

                <a href="#" class="video play-btn mb-4" data-toggle="modal" data-target="#videoModal"></a>
            </div>

            <!-- ======= Testimonials Section ======= -->
            <div
                class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5"
                data-aos="fade-left">
                <h3>Testimonies</h3>

                <section id="testimonials" class="testimonials">
                    <div class="container">

                        <div class="owl-carousel testimonials-carousel" data-aos="zoom-in">

                            @foreach($testimonials as $testimonial)
                                <div class="testimonial-item">
                                    <img src="{{asset('storage/'.$testimonial->image)}}" class="testimonial-img">
                                    <h3>{{$testimonial->name}}</h3>
                                    <h4>{{$testimonial->profession}}</h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        {!!html_entity_decode($testimonial->content) !!}
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>

                            @endforeach

                        </div>

                    </div>
                </section>

            </div>
        </div>

    </div>

</section><!-- End Testimonial Vid Section -->
