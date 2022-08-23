<!-- Vendor JS Files -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{--<script src="{{ asset('template/assets/vendor/jquery/jquery.min.js') }}"></script>--}}
<script src="{{ asset('template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('template/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('template/assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('template/assets/vendor/venobox/venobox.min.js') }}"></script>
<script src="{{ asset('template/assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('template/assets/vendor/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('template/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('template/assets/vendor/aos/aos.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>

<!-- Template Main JS File -->
<script src="{{ asset('template/assets/js/main.js') }}"></script>
<script src="{{ asset('template/assets/js/typing.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"/>

<!-- <script src="https://unpkg.com/vue-star-rating@next/dist/VueStarRating.umd.min.js"></script> -->
<script>
    jQuery(document).ready(function ($) {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {}
        })
    })
</script>
<script>
    $(function () {
        $("#datepicker").datepicker();
    });
</script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
