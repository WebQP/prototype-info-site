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
                    <a href="/contacts">
                        Contacts
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
                    <div class="contact-form">
                        <h1 class="page-title">Contact Us</h1>
                        <div class="row">
                            <div class="col-md-6 mt-25">
                                <h3>Oficiu</h3>
                                <i class="fa-solid fa-location-dot contact-icon"></i> bd. Ioan Cuza-Vodă, 5/1, of. 403 Chișinău, 2060<br>
                                <i class="fa-solid fa-timer contact-icon"></i> 9:00 - 17:00<br>
                                <i class="fa-solid fa-phone contact-icon"></i> <a href="tel:+37322523432">+373 225-234-32</a><br>
                                <i class="fa-solid fa-envelope contact-icon"></i> <a href="mailto:info@ecochimie.md">info@ecochimie.md</a>
                            </div>

                            <div class="col-md-6 mt-25">
                                <h3>Depozit</h3>
                                <i class="fa-solid fa-location-dot contact-icon"></i>  Str. Sarmizegetusa 94/2, Chișinău 2032<br>
                                <i class="fa-solid fa-timer contact-icon"></i> 9:00 - 17:00<br>
                                <i class="fa-solid fa-phone contact-icon"></i> <a href="tel:+37322523432">+373 22-523-432</a><br>
                                <i class="fa-solid fa-envelope contact-icon"></i> <a href="mailto:vanzari@ecochimie.md">vanzari@ecochimie.md</a>
                            </div>

                            <div class="col-md-6 mt-25">
                                <h3>Department Achiziții Publice și Import</h3>
                                <i class="fa-solid fa-timer contact-icon"></i> 9:00 - 17:00<br>
                                <i class="fa-solid fa-phone contact-icon"></i> <a href="tel:+37322109111">+373 22-109-111</a><br>
                                <i class="fa-solid fa-fax contact-icon"></i> <a href="tel:+37322109222">+373 22-109-222</a><br>
                                <i class="fa-solid fa-envelope contact-icon"></i> <a href="mailto:info@ecochimie.md">info@ecochimie.md</a>
                            </div>

                            <div class="col-md-6 mt-25">
                                <h3>Magazin On-lin</h3>
                                <i class="fa-solid fa-timer contact-icon"></i> 24/7<br>
                                <i class="fa-solid fa-envelope contact-icon"></i> <a href="mailto:shop@ecochimie.md">shop@ecochimie.md</a>
                            </div>
                        </div>
                    </div>

                    <div class="map" id="google_map" style="width: 100%; height: 400px; position: relative; overflow: hidden;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d87063.259985529!2d28.762320297347053!3d47.006335596338474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d47.025210099999995!2d28.8100813!4m5!1s0x40c9799a7f8ef47b%3A0xcf293ac1bea3c71!2sDepozit%20Ecochimie%20S.R.L.%2C%20Strada%20Sarmizegetusa%2094%2F2%2C%20Chi%C5%9Fin%C4%83u%202032!3m2!1d46.9803691!2d28.8810909!5e0!3m2!1sru!2sru!4v1696595623436!5m2!1sru!2sru" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <!-- Контент -->
            </div>
        </div>
    </section>
@endsection
