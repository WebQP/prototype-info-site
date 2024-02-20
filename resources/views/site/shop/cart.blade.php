@extends('site.layout')

@section('content')
    <div class="wrap-breadcrumb parallax-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="#">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li>
                    <a href="/cart">
                        Shopping Cart
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div id="checkout-cart" class="container">
        <div class="row">
            <!-- СайдБар -->
                @include('site.layouts.sidebar.sidebar-home')
            <!-- СайдБар -->
            <div id="content" class="col-sm-9">
                <h1 class="page-title">Shopping Cart</h1>
                <site-shop-cart></site-shop-cart>
            </div>
        </div>
    </div>
    <script src="{{ mix('assets/site/js/site.js') }}"></script>
@endsection
