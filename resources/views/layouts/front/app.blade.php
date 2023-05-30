@include('layouts.front.partials.head')

<body>

    @include('layouts.front.partials.navigation')
    <div class="container-fluid" style="margin-top:80px;">
        <!-- Slider Begins-->
        <div class="container">
            <div class="hero">
                <div>
                    <img src="https://placehold.co/1800x600" alt="" class="img-fluid">
                </div>
                <div>
                    <img src="https://placehold.co/1800x600" alt="" class="img-fluid">
                </div>
                <div>
                    <img src="https://placehold.co/1800x600" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <!-- Slider Ends-->
        <!-- Category Slider Begin-->
        <div class="container bg-success p-5 mb-3">
            <h1 class="text-center text-white text-uppercase fw-light">Popular Categories</h1>
            <div class="slider m-3 d-flex align-items-stretch">
                @foreach($categories as $category)
                <div class="card border-0 rounded-0 m-1 shadow">
                    <img src="{{asset('/storage/images/'.$category->image)}}" class="card-img-top rounded-0" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$category->title}}</h5>
                        <a href="#" class="btn btn-green btn-block rounded-0 border-0" style="width:100%">Explore</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Category Slider Begin-->
        <!-- All Products Begin-->
        <div class="container">
            <div class="row">
                <h1 class="text-center text-uppercase fw-light">Popular Products</h1>
                @foreach($products as $product)
                <x-product.card :product="$product" />
                @endforeach
                <div class="d-flex justify-content-center">
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
        <!-- All Products Ends-->
        <!-- Featured Product Begin-->
        <div class="container">
            <h1 class="text-center text-uppercase fw-light">Featured Products</h1>
            <div class="slider">
                @foreach($featured_products as $featured)
                <div class="card border-0 rounded-0 m-1 shadow">
                    <img src="{{asset('/storage/images/'.$category->image)}}" class="card-img-top rounded-0" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$featured->title}}</h5>
                        <a href="#" class="btn btn-green btn-block rounded-0 border-0" style="width:100%">View</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Featured Product Ends -->
        <!-- Based on your history Begin-->
        <div class="container bg-success p-5 mb-3">
            <h1 class="text-center text-white text-uppercase fw-light">Based upon your history</h1>
            <div class="slider m-3 d-flex align-items-stretch">
                @foreach($categories as $category)
                <div class="card border-0 rounded-0 m-1 shadow">
                    <img src="{{asset('/storage/images/'.$category->image)}}" class="card-img-top rounded-0" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$category->title}}</h5>
                        <a href="#" class="btn btn-green btn-block rounded-0 border-0" style="width:100%">Explore</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Based on your history Ends-->
    </div>
    <footer>
        THIS IS THE FOOTER
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
                dots: true,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: true,
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
                dots: true,
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