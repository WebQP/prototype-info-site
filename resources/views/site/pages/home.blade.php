@extends('site.layout')

@section('content')
    <div class="wrap-breadcrumb parallax-breadcrumb">
        <div class="container"></div>
    </div>
    <div id="common-home" class="container">
        <div class="main-slider">
            <div id="spinner"></div>
            <div class="swiper-viewport">
                <div id="slideshow0" class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($data->listSlider as $item)
                            <div class="swiper-slide text-center">
                                <a href="#">
                                    <img
                                        src="{{$item}}"
                                        alt="Main Banner1"
                                        class="img-responsive"
                                    />
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-pagination slideshow0"></div>
                <div class="swiper-pager">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- СайдБар -->
            @include('site.layouts.sidebar.sidebar-home')
            <!-- СайдБар -->

            <!-- Карусель товаров -->
            <div id="content" class="col-sm-9">

                <!-- Карусель товаров -->
                <div class="hometab box">
                    <div class="tab-head">
                        <div class="hometab-heading box-heading">Товары</div>
                        <div id="tabs" class="htabs">
                            <ul class='etabs'>
                                <li class='tab'>
                                    <a href="#tab-latest">Новинки</a>
                                </li>
                                <li class='tab'>
                                    <a href="#tab-bestseller">Популярное</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Новинки -->
                    <div id="tab-latest" class="tab-content">
                        <div class="box">
                            <div class="box-content">
                                <div class="customNavigation">
                                    <a class="fa prev fa-arrow-left">&nbsp;</a>
                                    <a class="fa next fa-arrow-right">&nbsp;</a>
                                </div>
                                <div class="box-product product-carousel" id="tablatest-carousel">
                                    @foreach($data->listProductNew as $item)
                                        @include('site.shop.layouts.product-card-slider')
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <span class="tablatest_default_width" style="display:none; visibility:hidden"></span>
                    </div>
                    <!-- Новинки -->

                    <!-- Популярное -->
                    <div id="tab-bestseller" class="tab-content">
                        <div class="box">
                            <div class="box-content">
                                <div class="customNavigation">
                                    <a class="fa prev fa-arrow-left">&nbsp;</a>
                                    <a class="fa next fa-arrow-right">&nbsp;</a>
                                </div>
                                <div class="box-product product-carousel" id="tabbestseller-carousel">
                                    @foreach($data->listProductTop as $item)
                                        @include('site.shop.layouts.product-card-slider')
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <span class="tabbestseller_default_width" style="display:none; visibility:hidden"></span>
                    </div>
                    <!-- Популярное -->
                </div>
                <script type="text/javascript">
                    $('#tabs a').tabs();
                </script>
                <!-- Карусель товаров -->

                <!-- Блок банеров -->
                <div id="czbannercmsblock" class="block czbanners">
                    <div class="cmsbanners">
                        <div class="one-half cmsbanner-part1">
                            <div class="cmsbanner-inner">
                                <div class="cmsbanner cmsbanner1"><a href="#" class="banner-anchor">
                                        <img src="{{asset('new/images/preview/cms-banner-1.jpg')}}" alt="cms-banner1" class="banner-image1">
                                    </a>
                                    <div class="banner-detail">
                                        <div class="cmsbanner-text">Departments Title</div>
                                        <div class="shopnow"><a href="#" class="shop-now">Shop now !</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="one-half cmsbanner-part2">
                            <div class="cmsbanner-inner">
                                <div class="cmsbanner cmsbanner2">
                                    <a href="#" class="banner-anchor">
                                        <img src="{{asset('new/images/preview/cms-banner-2.jpg')}}" alt="cms-banner2" class="banner-image2">
                                    </a>
                                    <div class="banner-detail">
                                        <div class="cmsbanner-text">Departments Title</div>
                                        <div class="shopnow"><a href="#" class="shop-now">Shop now !</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Блок банеров -->

                <!-- Преимущества -->
                <div id="czservicecmsblock">
                    <div class="service_container">
                        <div class="service-area">
                            <div class="service-fourth service1">
                                <div class="service-icon"></div>
                                <div class="service-content">
                                    <div class="service-heading">Free World Delivery</div>
                                    <div class="service-description">Orders Over $100</div>
                                </div>
                            </div>
                            <div class="service-fourth service2">
                                <div class="service-icon"></div>
                                <div class="service-content">
                                    <div class="service-heading">Money Back Guarantee</div>
                                    <div class="service-description">Within 30 Days</div>
                                </div>
                            </div>
                            <div class="service-fourth service3">
                                <div class="service-icon"></div>
                                <div class="service-content">
                                    <div class="service-heading">Best Online Support</div>
                                    <div class="service-description">Hours : 8am - 11pm</div>
                                </div>
                            </div>
                            <div class="service-fourth service4">
                                <div class="service-icon"></div>
                                <div class="service-content">
                                    <div class="service-heading">Win $100 To Shop</div>
                                    <div class="service-description">Enter Now</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Преимущества -->

                <!-- Рекомендуемые -->
                <div class="box featured">
                    <div class="container">
                        <div class="box-head">
                            <div class="box-heading">Рекомендуемые</div>
                        </div>
                        <div class="box-content">
                            <div class="customNavigation">
                                <a class="fa prev fa-arrow-left">&nbsp;</a>
                                <a class="fa next fa-arrow-right">&nbsp;</a>
                            </div>
                            <div class="box-product product-carousel" id="featured-carousel">
                                @foreach($data->listProductRecommended as $item)
                                    @include('site.shop.layouts.product-card-slider')
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <span class="featured_default_width" style="display:none; visibility:hidden"></span>
                </div>
                <!-- Рекомендуемые -->

                <!-- Бренды -->
                <div id="carousel-0" class="banners-slider-carousel box">
                    <div class="box-head">
                        <div class="box-heading">Top Brands</div>
                    </div>
                    <div class="carousel-block box-content">
                        <div class="customNavigation">
                            <a class="prev fa fa-arrow-left">&nbsp;</a>
                            <a class="next fa fa-arrow-right">&nbsp;</a>
                        </div>
                        <div class="product-carousel" id="module-0-carousel">
                            @foreach($data->listBrand as $item)
                            <div class="slider-item">
                                <div class="product-block">
                                    <div class="product-block-inner">
                                        <img src="{{$item['image']}}" alt="{{$item['name']}}" />
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Бренды -->

                <span class="module_default_width" style="display:none; visibility:hidden"></span>

                <!-- Блог -->
                <div class="box blogs">

                    <div class="box-head">
                        <div class="box-heading">Latest Blog</div>
                    </div>
                    <div class="box-content">
                        <div class="customNavigation">
                            <a class="fa prev czblog_prev"></a>
                            <a class="fa next czblog_next"></a>
                        </div>

                        <div class="box-product  owl-carousel blogcarousel " id="blog-carousel">

                            @foreach($data->listNews as $item)
                                <div class="blog-item">
                                    <div class="product-block">
                                        <div class="product-block-inner">
                                            <div class="blog-left">
                                                <div class="blog-image">
                                                    <img
                                                        src="{{$item['image']}}"
                                                        alt="{{$item['name']}}"
                                                        title="name"
                                                        class="img-thumbnail"
                                                    />
                                                </div>
                                            </div>
                                            <div class="blog-right">
                                                <div class="date-comment">
                                                    <div class="date-time">
                                                        <i class="fa-regular fa-calendar-days"></i>
                                                        {{$item['date']}}
                                                    </div>
                                                </div>
                                                <h4 class="blog_title">
                                                    <a href="{{$item['slug']}}">
                                                        {{$item['name']}}
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Блог -->

            </div>
        </div>
    </div>
@endsection
