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
                    <a href="{{$data->meta->languageUrl}}">
                        {{$data->content->name}}
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <section class="product-category-18 layout-2 left-col">
        <div id="product-category" class="container">
            <div class="row">

                <!-- СайдБар -->
                @include('site.layouts.sidebar.sidebar-home')
                <!-- СайдБар -->

                <!-- Контент -->
                <div id="content" class="col-sm-9">
                    <h1 class="page-title">{{$data->content->name}}</h1>
                    {!! $data->content->content !!}
                </div>
                <!-- Контент -->
            </div>
        </div>
    </section>
@endsection
