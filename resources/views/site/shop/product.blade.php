@extends('site.layout')

@section('content')
    <div class="wrap-breadcrumb parallax-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="/">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- СайдБар -->
            @include('site.layouts.sidebar.sidebar-home')
            <!-- СайдБар -->

            <div id="content" class="col-sm-9 productpage">
                <!-- Товар -->
                <div class="row">
                    <div class="col-sm-5 product-left">
                        <div class="product-info">
                            <div class="left product-image thumbnails">

                                <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
                                <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

                                <div class="slider slider-for">
                                    @foreach($data->content->images as $item)
                                        <div>
                                            <img src="{{$item}}" alt="">
                                        </div>
                                    @endforeach
                                </div>

                                <div class="slider slider-nav">
                                    @foreach($data->content->images as $item)
                                        <div>
                                            <img src="{{$item}}" alt="">
                                        </div>
                                    @endforeach
                                </div>

                                <script>
                                    $('.slider-for').slick({
                                        slidesToShow: 1,
                                        slidesToScroll: 1,
                                        arrows: false,
                                        fade: true,
                                        asNavFor: '.slider-nav'
                                    });
                                    $('.slider-nav').slick({
                                        slidesToShow: 3,
                                        slidesToScroll: 1,
                                        asNavFor: '.slider-for',
                                        dots: false,
                                        arrows: false,
                                        centerMode: true,
                                        focusOnSelect: true
                                    });
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-7 product-right">
                        <h3 class="product-title">{{$data->content->name}}</h3>
                        <ul class="list-unstyled attr">
                            <li>
                                <span class="desc">
                                    Brand::
                                </span>
                                <a href="{{$data->brand->meta->languageUrl}}">
                                    {{$data->brand->content->name}}
                                </a>
                            </li>
                            <li>
                                <span class="desc">
                                    Product Code:
                                </span>
                                {{$data->content->unique_code}}
                            </li>
                        </ul>
                        <div id="product">
                            <div class="price-cartbox">
                                <ul class="list-unstyled price">
                                    <li>
                                        <h3 class="special-price">
                                            ${{$data->content->price}}
                                        </h3>
                                    </li>
                                    <li>
                                        <span class="old-price" style="text-decoration: line-through;margin-left: 10px">
                                            ${{$data->content->price_old}}
                                        </span>
                                    </li>
                                </ul>
                                <div class="form-group qty">
                                    <button
                                        type="button"
                                        id="button-cart"
                                        class="btn btn-primary btn-lg btn-block addToCart"
                                        data-id="{{$data->content->id}}"
                                    >
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tabs_info" class="product-tab col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab-description" data-toggle="tab" aria-expanded="false">
                                    Description
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-description">
                                {!! $data->content->content !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Товар -->

                <!-- Похожие товары -->
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
                                @foreach($data->relatedProducts as $item)
                                    @include('site.shop.layouts.product-card-slider')
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <span class="featured_default_width" style="display:none; visibility:hidden"></span>
                </div>
                <!-- Похожие товары -->
            </div>
        </div>
    </div>
@endsection
