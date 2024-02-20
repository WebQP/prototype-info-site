@extends('site.layout')

@section('content')
    <div class="wrap-breadcrumb parallax-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/"><i class="fa fa-home"></i></a></li>
            </ul>
        </div>
    </div>

    <div id="product-category" class="container">
        <div class="row">

            <!-- СайдБар -->
            @include('site.layouts.sidebar.sidebar-home')
            <!-- СайдБар -->

            <div id="content" class="col-sm-9">
                <h1 class="page-title">{{$data->content->name}}</h1>
                <div class="row cat_prod">
                    @foreach($data->listProducts as $item)
                        <div class="product-layout product-grid col-lg-4 col-md-4 col-sm-4 col-xs-6">
                            <div class="product-block product-thumb">
                                <div class="product-block-inner">
                                    <div class="image">
                                        <a href="{{$item['slug']}}">
                                            <img
                                                src="{{$item['image_1']}}"
                                                title="{{$item['name']}}"
                                                alt="{{$item['name']}}"
                                                class="img-responsive reg-image"
                                            >
                                            <img
                                                src="{{$item['image_2']}}"
                                                title="{{$item['name']}}"
                                                alt="{{$item['name']}}"
                                                class="img-responsive hover-image"
                                            >
                                        </a>
                                    </div>
                                    <div class="product-details">
                                        <div class="caption">
                                            <h4>
                                                <a href="{{$item['slug']}}">
                                                    {{$item['name']}}
                                                </a>
                                            </h4>



                                            <p class="price">
                                                <span class="price-new">${{$item['price']}}</span>
                                                <span class="price-old">${{$item['price_old']}}</span>
                                            </p>

                                            <button
                                                type="button"
                                                class="addtocart addToCart"
                                                data-id="{{$item['id']}}"
                                            >
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12 pagination-right">
                        {{ $data->pagination->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
