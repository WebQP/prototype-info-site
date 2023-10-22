@extends('site.layout')

@section('content')
    <section class="product">
        <div class="container mt-20px mb-30px">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Главная</a>
                        </li>
                        <li>
                            <a href="#">Каталог</a>
                        </li>
                        <li>
                            <span>Рыбная продукция</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Карточка товара -->
            <div class="row">

                @desktop
                <div class="col-md-8">
                    <div class="product-block">
                        <div class="row">
                            <div class="col-md-5 product-slider" style="padding-right: 0;">
                                <slider-product-desktop></slider-product-desktop>
                            </div>
                            <div class="col-md-7">
                                <h1>
                                    Горбуша б/г 1/22 Восточный Берег
                                </h1>
                                <span class="code">
                                Код: НМ-00000678
                            </span>
                                <span class="reviews">
                                5 отзывов
                            </span>
                                <span class="availability">
                                В наличии
                            </span>
                                <span class="sum-percent">
                                -90 %
                            </span>
                                <span class="price_old">
                                290,99 руб/кг
                            </span>
                                <span class="price">237,77 руб/кг</span>
                                <span class="min-order">22 кг (1 упаковка) - минимальный заказ</span>

                                <product-calculator-price></product-calculator-price>

                                <div class="flex-button mt-30">
                                    <button class="btn-blue w-48">В корзину</button>
                                    <button class="btn-white w-48">Купить сейчас</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @elsedesktop
                <div class="col-md-8">
                    <h1>
                        Горбуша б/г 1/22 Восточный Берег
                    </h1>
                    <div class="row mt-15">
                        <div class="col-6">
                                                            <span class="code">
                                Код: НМ-00000678
                            </span>
                        </div>
                        <div class="col-6 text-end">
                                <span class="availability">
                                В наличии
                            </span>
                        </div>
                    </div>
                    <span class="reviews mt-15">
                                5 отзывов
                            </span>
                    <div class="product-block">

                        <div class="row">
                            <div class="col-md-5 product-slider" style="padding-right: 0;">
                                <slider-product-mobile></slider-product-mobile>
                            </div>
                            <div class="col-md-7">
                                <span class="sum-percent">
                                -90 %
                            </span>
                                <span class="price_old">
                                290,99 руб/кг
                            </span>
                                <span class="price">237,77 руб/кг</span>
                                <span class="min-order">22 кг (1 упаковка) - минимальный заказ</span>

                                <product-calculator-price></product-calculator-price>
                            </div>
                        </div>
                    </div>
                    <div class="flex-button mt-30 mb-4">
                        <button class="btn-blue w-48">В корзину</button>
                        <button class="btn-white w-48">Купить сейчас</button>
                    </div>
                </div>
                @enddesktop



                <div class="col-md-4">
                    <div class="additional-info">
                        <div class="pickup">
                            <span class="name">Самовывоз с пункта выдачи</span>
                            <span class="date">На следующий день после<br>заказа.</span>
                            <span class="delivery-price">Бесплатно</span>
                            <button>Выбрать пункт выдачи</button>
                        </div>
                        <div class="delivery">
                            <span class="name">Доставка курьером</span>
                            <span class="date">На следующий день после<br>заказа.</span>
                            <button>Расчитать стоимость доставки</button>
                        </div>
                        <div class="warranty">
                            <span class="name">Гарантия возврата</span>
                            <span class="date">Гарантируем возврат денежных<br>средств, если вас не устроит<br>качество нашего товара.</span>
                        </div>
                        <div class="exclusive">
                            Получайте эксклюзивные предложения!<br>
                            До 7 апреля предоставляется скидка<br>
                            до -25% дополнительно для зарегистрированных пользователей.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Карточка товара -->

            <!-- Табы -->
            <div class="row mt-40">
                <div class="col-12">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">

                            @desktop
                            <button
                                class="nav-link active"
                                id="nav-home-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#nav-home"
                                type="button"
                                role="tab"
                                aria-controls="nav-home"
                                aria-selected="true">
                                Характеристики
                            </button>
                            <a href="#reviews" class="nav-link">Отзывы (100 отзывов)</a>
                            <button
                                class="nav-link"
                                id="nav-contact-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#nav-contact"
                                type="button"
                                role="tab"
                                aria-controls="nav-contact"
                                aria-selected="false">
                                Доставка и оплата
                            </button>
                            <button
                                class="nav-link"
                                id="nav-contact-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#nav-contact"
                                type="button"
                                role="tab"
                                aria-controls="nav-contact"
                                aria-selected="false">
                                Возврат товара
                            </button>
                            @elsedesktop
                            <button
                                class="nav-link active"
                                id="nav-home-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#nav-home"
                                type="button"
                                role="tab"
                                aria-controls="nav-home"
                                aria-selected="true">
                                Характеристики
                            </button>
                            @enddesktop
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="about">
                                <p>
                                    Горбуша свежемороженая филе на коже 200-600 гр – источник легкоусвояемого животного белка.
                                    Продукт активно используют в составе низкокалорийных, безуглеводных диет для похудения.
                                    Ценную рыбу из семейства лососевых, ловят в соленых водах Северного Ледовитого и Тихого океанов.
                                </p>
                                <p>
                                    Пищевая ценность: белок – 21%, жиры – 6,5 %
                                </p>
                                <p>
                                    Калорийность: 155 кКал на 100 г рыбы
                                </p>
                                <p>
                                    Условия хранения: в замороженном виде при температуре не выше -18С.
                                </p>

                                <div class="row">
                                    <div class="col-md-5">
                                        <table class="table-about">
                                            <tr>
                                                <td>Условия хранения</td>
                                                <td>keep at -18oC</td>
                                            </tr>
                                            <tr>
                                                <td>Годен до</td>
                                                <td>05.01.2024</td>
                                            </tr>
                                            <tr>
                                                <td>Глазировка</td>
                                                <td>3 %</td>
                                            </tr>
                                            <tr>
                                                <td>Пищевая ценность (на 100 г продукта)</td>
                                                <td>Caloric content 189 kcal<br>
                                                    Protein 18 g<br>
                                                    Fat 13 g<br>
                                                    Carbohydrates 0 g</td>
                                            </tr>
                                            <tr>
                                                <td>Размерный ряд</td>
                                                <td>300-500 grs</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-5">
                                        <table class="table-about">
                                            <tr>
                                                <td>Условия хранения</td>
                                                <td>keep at -18oC</td>
                                            </tr>
                                            <tr>
                                                <td>Годен до</td>
                                                <td>05.01.2024</td>
                                            </tr>
                                            <tr>
                                                <td>Глазировка</td>
                                                <td>3 %</td>
                                            </tr>
                                            <tr>
                                                <td>Пищевая ценность (на 100 г продукта)</td>
                                                <td>Caloric content 189 kcal<br>
                                                    Protein 18 g<br>
                                                    Fat 13 g<br>
                                                    Carbohydrates 0 g</td>
                                            </tr>
                                            <tr>
                                                <td>Размерный ряд</td>
                                                <td>300-500 grs</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="tab-pane fade"
                            id="nav-profile"
                            role="tabpanel"
                            aria-labelledby="nav-profile-tab">
                            <div class="about">
                                <p>
                                    Доставка и оплата
                                </p>
                            </div>
                        </div>
                        <div
                            class="tab-pane fade"
                            id="nav-contact"
                            role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="about">
                                <p>
                                    Возврат товара
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Табы -->
        </div>
    </section>

    <!-- С этим товаром покупают -->
    <section class="main_catalog mt-40">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>С этим товаром покупают</h2>
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
    <!-- С этим товаром покупают -->

    <!-- Похожие товары -->
    <section class="main_catalog mt-40">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Похожие товары</h2>
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
    <!-- Похожие товары -->

    <!-- Отзывы -->
    <section id="reviews">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-40">
                    <div class="info-reviews">
                    <h2>Отзывы</h2>
                    <span class="recommend">(22 клиента рекомендуют)</span>
                    </div>
                </div>
            </div>
            @desktop
            <div class="col-12 mt-30">
                <div class="reviews-statistic">
                    <div class="row">
                        <div class="col-md-3">
                            <span class="rating-sum">4.71</span>
                            <div class="stars">
                                <div class="gold"></div>
                                <div class="gold"></div>
                                <div class="gold"></div>
                                <div class="gold"></div>
                                <div class="gray"></div>
                            </div>
                            <spam class="rating-sum-count">22 отзыва</spam>
                        </div>
                        <div class="col-3">
                            <div class="rating-stat-star">
                                <div class="name">
                                    5 звезд
                                </div>
                                <div class="lines">
                                    <div class="line-gray"></div>
                                    <div class="line-green w-80"></div>
                                </div>
                                <div class="count">
                                    (200)
                                </div>
                            </div>
                            <div class="rating-stat-star">
                                <div class="name">
                                    4 звезды
                                </div>
                                <div class="lines">
                                    <div class="line-gray"></div>
                                    <div class="line-green-lite w-80"></div>
                                </div>
                                <div class="count">
                                    (40)
                                </div>
                            </div>
                            <div class="rating-stat-star">
                                <div class="name">
                                    3 звезды
                                </div>
                                <div class="lines">
                                    <div class="line-gray"></div>
                                    <div class="line-yellow w-80"></div>
                                </div>
                                <div class="count">
                                    (30)
                                </div>
                            </div>
                            <div class="rating-stat-star">
                                <div class="name">
                                    2 звезды
                                </div>
                                <div class="lines">
                                    <div class="line-gray"></div>
                                    <div class="line-orange-lite w-80"></div>
                                </div>
                                <div class="count">
                                    (20)
                                </div>
                            </div>
                            <div class="rating-stat-star">
                                <div class="name">
                                    1 звезда
                                </div>
                                <div class="lines">
                                    <div class="line-gray"></div>
                                    <div class="line-orange w-80"></div>
                                </div>
                                <div class="count">
                                    (10)
                                </div>
                            </div>
                            <button>Написать отзыв</button>
                        </div>
                        <div class="col-md-1">
                            <div class="vertical-line"></div>
                        </div>
                        <div class="col-md-2">
                            <div class="icon-count-register mt-20px"></div>
                            <span class="reviews-count mt-10px">246</span>
                            <p class="reviews-signature mt-5px">Зарегистрированных<br>пользователей</p>
                        </div>
                        <div class="col-md-1">
                            <div class="vertical-line"></div>
                        </div>
                        <div class="col-md-2">
                            <div class="icon-count-percent mt-20px"></div>
                            <span class="reviews-count mt-10px">99%</span>
                            <p class="reviews-signature mt-5px">Положительных<br>отзывов</p>
                        </div>
                    </div>
                </div>
            </div>
            @elsedesktop
            <div class="col-12 mt-30">
                <div class="reviews-statistic">
                    <div class="row justify-content-between">
                        <div class="col-12">
                            <span class="rating-sum">4.71</span>
                            <div class="stars">
                                <div class="gold"></div>
                                <div class="gold"></div>
                                <div class="gold"></div>
                                <div class="gold"></div>
                                <div class="gray"></div>
                            </div>
                            <spam class="rating-sum-count">22 отзыва</spam>
                        </div>
                        <div class="col-5">
                            <div class="icon-count-register mt-20px"></div>
                            <span class="reviews-count mt-10px">246</span>
                            <p class="reviews-signature mt-5px">Зарегистрированных<br>пользователей</p>
                        </div>
                        <div class="col-1">
                            <div class="vertical-line"></div>
                        </div>
                        <div class="col-5">
                            <div class="icon-count-percent mt-20px"></div>
                            <span class="reviews-count mt-10px">99%</span>
                            <p class="reviews-signature mt-5px">Положительных<br>отзывов</p>
                        </div>
                        <div class="col-12">
                            <div class="rating-stat-star">
                                <div class="name">
                                    5 звезд
                                </div>
                                <div class="lines">
                                    <div class="line-gray"></div>
                                    <div class="line-green w-80"></div>
                                </div>
                                <div class="count">
                                    (200)
                                </div>
                            </div>
                            <div class="rating-stat-star">
                                <div class="name">
                                    4 звезды
                                </div>
                                <div class="lines">
                                    <div class="line-gray"></div>
                                    <div class="line-green-lite w-80"></div>
                                </div>
                                <div class="count">
                                    (40)
                                </div>
                            </div>
                            <div class="rating-stat-star">
                                <div class="name">
                                    3 звезды
                                </div>
                                <div class="lines">
                                    <div class="line-gray"></div>
                                    <div class="line-yellow w-80"></div>
                                </div>
                                <div class="count">
                                    (30)
                                </div>
                            </div>
                            <div class="rating-stat-star">
                                <div class="name">
                                    2 звезды
                                </div>
                                <div class="lines">
                                    <div class="line-gray"></div>
                                    <div class="line-orange-lite w-80"></div>
                                </div>
                                <div class="count">
                                    (20)
                                </div>
                            </div>
                            <div class="rating-stat-star">
                                <div class="name">
                                    1 звезда
                                </div>
                                <div class="lines">
                                    <div class="line-gray"></div>
                                    <div class="line-orange w-80"></div>
                                </div>
                                <div class="count">
                                    (10)
                                </div>
                            </div>
                            <button>Написать отзыв</button>
                        </div>


                    </div>
                </div>
            </div>
            @enddesktop

            <div class="col-md-12">
                <div class="reviews-filter">
                    <div class="row">
                        <div class="сol-6">
                            <span class="sor">
                                Сортировать по
                            </span>
                        </div>
                        <div class="col-6 text-end">
                            <span class="sor">
                                Фильтр
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                @desktop
                <div class="review">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="name">Андрей Иванов</div>
                            <div class="date">31.03.2022</div>
                        </div>
                        <div class="col-md-10">
                            <div class="estimation">Отлично</div>
                            <div class="flex-vertical-center">
                                <div class="stars">
                                    <div class="gold"></div>
                                    <div class="gold"></div>
                                    <div class="gold"></div>
                                    <div class="gold"></div>
                                    <div class="gray"></div>
                                </div>
                                <span class="user-status">Отзыв клиента Moldbazar</span>
                            </div>
                            <p>
                                Доставили целую рыбу без головы и потрошенную весом около трех кг замечательного качества.
                                Засолила одну треть, получилась очень вкусная. Покупкой довольна.
                            </p>
                            <div class="action">
                                <button class="like">1000</button>
                                <button class="review-add">Добавьте комментарий</button>
                            </div>
                        </div>
                    </div>
                </div>
                @elsedesktop
                <div class="review">
                    <div class="row">
                        <div class="col-6">
                            <div class="name">Андрей Иванов</div>
                        </div>
                        <div class="col-6 text-end">
                            <div class="date">31.03.2022</div>
                        </div>
                        <div class="col-6 mt-10">
                            <div class="stars">
                                <div class="gold"></div>
                                <div class="gold"></div>
                                <div class="gold"></div>
                                <div class="gold"></div>
                                <div class="gray"></div>
                            </div>
                        </div>
                        <div class="col-6 text-end mt-10">
                            <div class="estimation">Отлично</div>
                        </div>
                        <div class="col-12 mt-10">
                            <span class="user-status">Отзыв клиента Moldbazar</span>
                        </div>
                        <div class="col-12 mt-10">
                            <p>
                                Доставили целую рыбу без головы и потрошенную весом около трех кг замечательного качества.
                                Засолила одну треть, получилась очень вкусная. Покупкой довольна.
                            </p>
                            <div class="action">
                                <button class="like">1000</button>
                                <button class="review-add">Добавьте комментарий</button>
                            </div>
                        </div>
                    </div>
                </div>
                @enddesktop

                <div class="navigation">
                    <div class="row">
                        @desktop
                        <div class="col-12 text-center">
                            <a href="#" class="d">Предыдущая страница</a>
                            <a href="#" class="a">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">Следующая страница</a>
                        </div>
                        @elsedesktop
                        <div class="col-12 text-center">
                            <a href="#" class="a">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                        </div>
                        @enddesktop

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Отзывы -->

    <!-- Похожие товары -->
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
    <!-- Похожие товары -->
@endsection
