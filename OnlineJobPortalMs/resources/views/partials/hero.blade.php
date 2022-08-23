<!-- ======= Hero Section ======= -->
<section id="hero">

    <div class="container">
        <div class="row">
            <div class="col-lg-10 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                <div data-aos="zoom-out">
                    <h1>We are the
                        <span class="txt-type" data-wait="3000"
                              data-words='["Most Reliable", "Most Advanced", "Largest"]'></span><span
                            class="typing-cursor">|</span>
                        <br>
                        <h1>Job Network in Malaysia.</h1>
                    </h1>
                    <h2>We connect you with top employers that match your skill sets.</h2>

                    <div class="row">
                        <form action="{{route('alljobs')}}">
                            <div class="form-inline">
                                <div class="form-group ml-2">

                                    <input type="text" name="search" placeholder="Job title or keywords"
                                           class="form-control form-control-lg ml-2" required="">
                                </div>


                                <div class="form-group ml-2">

                                    <input type="text" name="location" placeholder="Area, town or city"
                                           class="form-control form-control-lg ml-2" required="">
                                </div>


                                <div class="form-group ml-3">
                                    <button type="submit" class="btn btn-find-jobs btn-lg btn-block">Find jobs</button>

                                </div>

                            </div>
                        </form>
                    </div>


                </div>
            </div>


            <div class="col-lg-2 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
                <img src="{{ asset('template/assets/img/cropped.png ') }}" class="img-fluid animated" alt="">
            </div>

        </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
         viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
            <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
        </defs>
        <g class="wave1">
            <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
        </g>
        <g class="wave2">
            <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
        </g>
        <g class="wave3">
            <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
        </g>
    </svg>

</section><!-- End Hero -->
