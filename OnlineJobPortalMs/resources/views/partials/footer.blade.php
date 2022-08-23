<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="footer-info">
                        <h3>JobsVizor</h3>
                        <p class="pb-3"><em>We connect you with top employers that match your skill sets.</em></p>
                        <p>
                            Inti International University, Nilai<br>
                            Negeri Sembilan 71800, MALAYSIA<br><br>
                            <strong>Phone:</strong> +60 1111 69 3190<br>
                            <strong>Email:</strong> joshboluwaji6@gmail.com<br>
                        </p>
                        <div class="social-links mt-3">
                            <a href="https://twitter.com/" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="https://www.facebook.com/" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="https://www.instagram.com/" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="https://www.skype.com/" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="https://www.linkedin.com/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/about">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Software Management</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">SEO</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>Subscribe for our newsletter, to be the first to know about new job openings.</p>
                    <form action="/subscribe" method="post">@csrf
                        <input type="email" name="subscriberemail" placeholder="enter your email"><input type="submit"
                                                                                                         value="Subscribe">

                    </form>
                    @if(Session::has('message'))
                        <div class="alert alert-primary m-2">
                            {{Session::get('message')}}</div>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">Copyright
            &copy;
            <script>document.write(new Date().getFullYear());</script>
            <strong><span>JobsVizor</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="/">JobsVizor</a>
        </div>
    </div>
</footer><!-- End Footer -->
