@extends('layouts.main')

@section('content')
    <div class="py-4">
        <div class="container">

            <!-- ======= F.A.Q Section ======= -->
            <section id="faq" class="faq section-bg">
                <div class="container">

                    <div class="section-title" data-aos="fade-up">
                        <h2>F.A.Q</h2>
                        <p>Frequently Asked Questions</p>
                    </div>

                    <div class="faq-list">
                        <ul>
                            <li data-aos="fade-up">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse"
                                                                               href="#faq-list-1">How can i apply for
                                    Jobs? <i class="bx bx-chevron-down icon-show"></i><i
                                        class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                                    <p>
                                        Register an account, update your profile by uploading your resume and cover
                                        letter, then you can apply for jobs.
                                    </p>
                                </div>
                            </li>

                            <li data-aos="fade-up" data-aos-delay="100">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2"
                                                                               class="collapsed">How can i know my
                                    application status? <i class="bx bx-chevron-down icon-show"></i><i
                                        class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                                    <p>
                                        Go to your profile dashboard, click on applications to see the status, however,
                                        you will receive feedbacks either approved or declined.
                                    </p>
                                </div>
                            </li>

                            <li data-aos="fade-up" data-aos-delay="200">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3"
                                                                               class="collapsed">I'm an employer, how
                                    can i post job openings? <i class="bx bx-chevron-down icon-show"></i><i
                                        class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                                    <p>
                                        Have an account (It's free to sign up for one), Update your profile and click on
                                        post a job or directly from the navigation bar, fill the details and put to
                                        live.
                                    </p>
                                </div>
                            </li>

                            <li data-aos="fade-up" data-aos-delay="300">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4"
                                                                               class="collapsed">How can i start
                                    receiving relevant emails for job updates? <i
                                        class="bx bx-chevron-down icon-show"></i><i
                                        class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                                    <p>
                                        Enter your email into the newsletter input at the page footer and subscribe
                                    </p>
                                </div>
                            </li>

                            <li data-aos="fade-up" data-aos-delay="400">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5"
                                                                               class="collapsed">How can i search to my
                                    preference? <i class="bx bx-chevron-down icon-show"></i><i
                                        class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                                    <p>
                                        Enter any keyword related to your search on the homepage and click find job, it
                                        will take you to our advance search page.
                                    </p>
                                </div>
                            </li>

                        </ul>
                    </div>

                </div>
            </section><!-- End F.A.Q Section -->


            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact">
                <div class="container">

                    <div class="section-title" data-aos="fade-left">
                        <h2>Contact</h2>
                        <p>Contact Us</p>
                    </div>

                    <div class="row">

                        <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
                            <div class="info">
                                <div class="address">
                                    <i class="icofont-google-map"></i>
                                    <h4>Location:</h4>
                                    <p>INTI IU, Nilai
                                        Negeri Sembilan 71800, MALAYSIA</p>
                                </div>

                            </div>

                        </div>

                        <div class="col-lg-4 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">
                            <div class="email info">
                                <i class="icofont-envelope"></i>
                                <h4>Email:</h4>
                                <p>joshboluwaji6@gmail.com</p>
                            </div>


                        </div>


                        <div class="col-lg-4 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">
                            <div class="phone info">
                                <i class="icofont-phone"></i>
                                <h4>Call:</h4>
                                <p>+60 1111 69 3190</p>
                            </div>


                        </div>

                    </div>

                </div>
            </section><!-- End Contact Section -->


        </div>
    </div>
@endsection
