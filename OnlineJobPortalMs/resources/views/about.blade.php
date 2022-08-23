@extends('layouts.main')

@section('content')
    <div class="py-3">
        <div class="container">
            <!-- ======= Details Section ======= -->
            <section id="details" class="details">
                <div class="container">
                    <div class="mt-1 ml-5">
                        <h3 id="cmp" class="col-md-8 offset-md-4" style="color: #010483; font-weight: 600;">About
                            JobsVizor</h3>
                        <hr class="bg-primary col-md-8 offset-md-4  mt-n1" style="width: 230px">
                        We are the most reliable, advanced and largest Job Network in Malaysia.
                        We save time and effort for employers in their hiring journey, also job seekers in their search.
                        <style>
                            #cmp {
                                background: -webkit-repeating-radial-gradient(#03adfc, #010483);
                                -webkit-background-clip: text;
                                -webkit-text-fill-color: transparent;
                            }
                        </style>
                    </div>
                    <div class="row content">
                        <div class="col-md-4" data-aos="fade-right">
                            <img src="{{ asset('template/assets/img/details-1.png ') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-8 pt-4" data-aos="fade-up">
                            <h3>We Connect Job seekers</h3>
                            <p class="font-italic">
                                We connect job seekers with top employers that match their skill sets.
                            </p>
                            <ul>
                                <li><i class="icofont-check"></i> Easy Registration.</li>
                                <li><i class="icofont-check"></i> You can also register with your facebook and gmail.
                                </li>
                                <li><i class="icofont-check"></i> Filter your search according to preference.</li>
                                <li><i class="icofont-check"></i> Upload your resume and cover letter to start applying.
                                </li>
                            </ul>
                            <p>
                                We give you adequate feedback on applied job
                            </p>
                        </div>
                    </div>

                    <div class="row content">
                        <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
                            <img src="{{ asset('template/assets/img/details-2.png ') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
                            <h3>Updated Job Postings</h3>
                            <p class="font-italic">
                                We have Top employers around Malaysia with updated job openings
                            </p>
                            <p>
                                We provide jobseekers the best opportunities with the frequent openings posted daily on
                                this platform.
                            </p>
                            <p>
                                Free registration for employers with easy application management system
                            </p>
                        </div>
                    </div>

                    <div class="row content">
                        <div class="col-md-4" data-aos="fade-right">
                            <img src="{{ asset('template/assets/img/details-3.png ') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-8 pt-5" data-aos="fade-up">
                            <h3>Job Matching and Recommendations</h3>
                            <p>We lessen the burden of job searching by providing an intelligent job matching to help
                                you with the right job you are looking for. </p>
                            <ul>
                                <li><i class="icofont-check"></i> List of recommendated jobs to check out.</li>
                                <li><i class="icofont-check"></i> Personalised recommended jobs.</li>
                                <li><i class="icofont-check"></i> Search Intelligent assistance.</li>
                            </ul>
                            <p>
                                Search one, get many recommendations based on your search preference
                            </p>
                            <p>
                                Save jobs to visit later or share job link with friends and family.
                            </p>
                        </div>
                    </div>

                    <div class="row content">
                        <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
                            <img src="{{ asset('template/assets/img/details-4.png ') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
                            <h3>Virtual Interview Assessment</h3>
                            <p class="font-italic">
                                Apply and be assesed at the comfort of your home
                            </p>
                            <p>
                                We provide easy assessment method by having live session with employers at your comfort.
                                Apply, receive interview invite email and connect with employer virtually.
                            </p>
                            <ul>
                                <li><i class="icofont-check"></i> Feedbacks on applied jobs either interview invite,
                                    approved or declined
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
            </section><!-- End Details Section -->

        </div>
    </div>
@endsection
