@extends('site.layout')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 mt-20">
                    <div class="breadcrumb">
                        <a href="/">Главная</a>
                        <a href="/">Каталог</a>
                        <span>Рыбная продукция</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <catalog-list></catalog-list>

    <!-- Часто покупают -->
    <section class="main_catalog mt-40 mb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Вы недавно просматривали</h2>
                </div>
                @desktop
                <div class="col-12 slider-two-row mt-30">
                    <slider-one-row/>
                </div>
                @elsedesktop
                <div class="col-12 slider-two-row mt-15">
                    <slider-mobile-one-row/>
                </div>
                @enddesktop
            </div>
        </div>
    </section>
    <!-- Часто покупают -->
@endsection
