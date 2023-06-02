@include('layouts.front.partials.head')

<body>

    @include('layouts.front.partials.navigation')
    <div class="container-fluid p-0" id="content">
        @yield('content')
    </div>
    <footer class="container-fluid footer">
        <div class="row border-bottom pb-5">
            <div class="col-sm-4">
                <h4>Get to Know Us</h4>
                <ul>
                    <li><a href="http://">About Us</a></li>
                    <li><a href="http://">Careers</a></li>
                    <li><a href="http://">Press Releases</a></li>
                    <li><a href="http://">Baagicha Services</a></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <h4>Connect with Us</h4>
                <ul>
                    <li><a href="http://">Facebook</a></li>
                    <li><a href="http://">Twitter</a></li>
                    <li><a href="http://">Instagram</a></li>
                    <li><a href="http://">Whatsapp</a></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <h4>Let Us Help You</h4>
                <ul>
                    <li><a href="http://">Your Account</a></li>
                    <li><a href="http://">Return Center</a></li>
                    <li><a href="http://">100% Purchase Protection</a></li>
                    <li><a href="http://">Help</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright text-light d-flex justify-content-center p-3 fs-6">
            &copy; 2022-{{ now()->year }} Baagicha.in or its affiliates
        </div>
    </footer>
    <!-- Bootstrap 5 JS CDN-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
    <!-- Slick Slider Script -->


    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <!-- Slick Slider JS CDN-->
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.hero').slick({
                dots: false,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: false,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            centerMode: false,
                            infinite: true,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            centerMode: false,
                            infinite: true,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false
                        }
                    }
                ]
            });

            $('.slider').slick({
                dots: false,
                centerMode: true,
                infinite: true,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 2,
                centerPadding: '60px',
                arrows: true,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            arrows: true
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            centerMode: true,
                            infinite: true,
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            arrows: false
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            centerMode: true,
                            infinite: true,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            centerMode: true,
                            infinite: true,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });

            $('.blog_slider').slick({
                dots: false,
                centerMode: false,
                infinite: false,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 2,
                centerPadding: '60px',
                arrows: true,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            centerMode: true,
                            infinite: true,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            centerMode: true,
                            infinite: true,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        });
    </script>
</body>

</html>