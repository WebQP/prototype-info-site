<!DOCTYPE html>
<html dir="ltr" lang="ro">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Medical Store</title>
    <meta name="description" content="Medical Store Opencart Responsive Theme is designed for Ayurveda, Medicine, Drug, Hospital, Fitness, Natural, Herbal, Health and multi purpose store. It is looking good with colors combination. It is very nice with its clean and professional look." />
    <meta name="keywords" content="Ayurveda, Medicine, Drug, Hospital, Fitness, Natural, Herbal, Health" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('new/js/jquery-2.1.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('new/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,900' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Oswald:300,400,500,600,700' rel='stylesheet' type='text/css'>
    <link href="{{asset('new/css/stylesheet.css')}}" rel="stylesheet" />

    <!-- Codezeel - Start -->
    <link rel="stylesheet" type="text/css" href="{{asset('new/css/magnific-popup.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('new/css/carousel.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('new/css/custom.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('new/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('new/css/lightbox.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('new/css/animate.css')}}" />

    <link href="{{asset('new/css/swiper.min.css')}}" type="text/css" rel="stylesheet" media="screen" />
    <link href="{{asset('new/css/opencart.css')}}" type="text/css" rel="stylesheet" media="screen" />
    <link href="{{asset('new/css/all.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('new/css/redefinition.css')}}" type="text/css" rel="stylesheet" />
    <script src="{{asset('new/js/swiper.jquery.js')}}" type="text/javascript"></script>

    <link href="https://codezeel.com/opencart/OPC01/OPC010010/image/catalog/cart.png" rel="icon" />
    <script type="text/javascript" src="{{asset('new/js/custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('new/js/jstree.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('new/js/carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('new/js/codezeel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('new/js/jquery.custom.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('new/js/jquery.formalize.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('new/js/lightbox-2.6.min.js')}}/"></script>
    <script type="text/javascript" src="{{asset('new/js/tabs.js')}}"></script>
    <script type="text/javascript" src="{{asset('new/js/jquery.elevatezoom.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('new/js/bootstrap-notify.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('new/js/doubletaptogo.js')}}"></script>
    <script type="text/javascript" src="{{asset('new/js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('new/js/jquery.cookie.js')}}"></script>
    <script type="text/javascript" src="{{asset('new/js/jquery.magnific-popup.min.js')}}"></script>

    <script src="{{asset('new/js/common.js')}}" type="text/javascript"></script>
</head>

@if (Auth::check())
    <!--Авторизован-->
    <script>
        window.Laravel = {!!json_encode([
            'isLoggedin' => true,
            'user' => Auth::user()
        ])!!}
    </script>
@else
    <!--Не авторизован-->
    <script>
        window.Laravel = {!!json_encode([
            'isLoggedin' => false
        ])!!}
    </script>
@endif
<body id="app">
@desktop
    @include('site.layouts.header.desktop')
@elsedesktop
    @include('site.layouts.header.mobile')
@enddesktop

@yield('content')

@desktop
    @include('site.layouts.footer.desktop')
@elsedesktop
    @include('site.layouts.footer.mobile')
@enddesktop

@include('site.layouts.alerts.add-to-cart-good')

<script type="text/javascript" src="{{asset('new/js/main.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/site/js/cart.js')}}"></script>

<script>

</script>
</body>
</html>
