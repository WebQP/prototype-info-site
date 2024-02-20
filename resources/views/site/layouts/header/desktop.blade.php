<!-- Топ навигация -->
<nav id="top">
    <div class="container">
        <div class="left-nav pull-left">
            <div id="czheadercmsblock">
                <div class="headercms">
                    <div class="custom-social">
                        <ul>
                            <li class="facebook"><a href="#"><span>Facebook</span></a></li>
                            <li class="twitter"><a href="#"><span>Twitter</span></a></li>
                            <li class="googleplus"><a href="#"><span>Google</span></a></li>
                            <li class="instagram"><a href="#"><span>Instagram</span></a></li>
                            <li class="youtube"><a href="#"><span>YouTube</span></a></li>
                        </ul></div>
                    <div class="callus-text">
                        <i class="fa-solid fa-phone"></i> <a href="tel:+37322523432" class="num">+373 22-523-432</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="headertopright">
            <div class="lang-curr">
                <!-- Языки -->
                <div class="pull-left">
                    <form action="#" method="post" enctype="multipart/form-data" id="form-language">
                        <div class="btn-group">
                            <button class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                                <img src="{{asset('new/images/lang/en.png')}}" alt="English" title="English">
                                <span class="hidden-xs hidden-sm hidden-md">Language</span>&nbsp;<i class="fa fa-angle-down"></i></button>
                            <ul class="dropdown-menu language-menu">
                                <li>
                                    <button class="btn btn-link btn-block language-select" type="button" name="en-gb"><img src="{{asset('new/images/lang/en.png')}}" alt="English" title="English" /> English</button>
                                </li>
                                <li>
                                    <button class="btn btn-link btn-block language-select" type="button" name="ar"><img src="{{asset('new/images/lang/ar.png')}}" alt="Arabic" title="Arabic" /> Arabic</button>
                                </li>
                            </ul>
                        </div>
                        <input type="hidden" name="code" value="" />
                        <input type="hidden" name="redirect" value="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=common/home" />
                    </form>
                </div>
                <!-- Языки -->

                <!-- ЛК -->
                <div class="dropdown myaccount">
                    <a href="#" title="My Account" class="dropdown-toggle" data-toggle="dropdown">
                        <span>Мой аккаунт</span><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right myaccount-menu">
                        <li><a href="#">Register</a></li>
                        <li><a href="#">Login</a></li>
                    </ul>
                </div>
                <!-- ЛК -->
            </div>
        </div>
    </div>
</nav>
<!-- Топ навигация -->

<!-- Шапка -->
<div class="header-container">
    <header>
        <div class="container">
            <div class="row">
                <div class="header-main">
                    <div class="header-logo">
                        <div id="logo">
                            <a href="/">
                                <img src="{{asset('new/images/logo.png')}}"
                                     title="Medical Store"
                                     alt="Medical Store"
                                     class="img-responsive"
                                />
                            </a>
                        </div>
                    </div>

                    <div class="head-right-bottom">
                        <!-- Корзина -->
                        <div class="header-cart">
                            <div id="cart" class="btn-group btn-block">
                                <a href="/cart" class="cart_heading">Корзина</a>
                            </div>
                        </div>
                        <!-- Корзина -->

                        <!-- Поиск -->
                        <div id="search" class="input-group">
                            <span class="search_button"></span>
                            <div class="search_toggle">
                                <div id="searchbox">
                                    <input
                                        type="text"
                                        name="search" value=""
                                        placeholder="Search Products Here"
                                        class="form-control input-lg"
                                    />
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default btn-lg">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Поиск -->

                        <!-- Навигация шапка -->
                        <nav class="nav-container" role="navigation">
                            <div class="nav-inner">
                                <div id="menu" class="main-menu">
                                    <ul class="nav navbar-nav">
                                        <li class="top_level"><a href="/about-the-company">Despre companie</a></li>
                                        <li class="top_level"><a href="/livrarea-i-achitarea">Livrarea şi achitarea</a></li>
                                        <li class="top_level"><a href="/contacts">Contacte</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Мобильное меню -->
                            <div id="res-menu" class="main-menu nav-container1">
                                <div class="nav-responsive">
                                    <span>Menu</span>
                                    <div class="expandable"></div>
                                </div>
                                <ul class="main-navigation">
                                    <li class="top_level dropdown"><a href="#">Fashion</a>
                                        <ul>
                                            <li>
                                                <a href="#">Clothing</a>
                                                <ul class="list-unstyled childs_2">
                                                    <li><a href="#">Ethnic Wear</a></li>
                                                    <li><a href="#">Sports Wear</a></li>
                                                    <li><a href="#">Loungewear</a></li>
                                                    <li><a href="#">Trousers</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <a href="#">Accessories</a>
                                                <ul class="list-unstyled childs_2">
                                                    <li><a href="#">Luggage &amp; Travel</a></li>
                                                    <li><a href="#">Wallets &amp; Belts</a></li>
                                                    <li><a href="#">Handbags</a></li>
                                                    <li><a href="#">Printed Sarees</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <a href="#">Footwear</a>
                                                <ul class="list-unstyled childs_2">
                                                    <li><a href="#">Formal Shoes</a></li>
                                                    <li><a href="#">Flip-Flops</a></li>
                                                    <li><a href="#">Sandles</a></li>
                                                    <li><a href="#">Sports Shoes</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- Мобильное меню -->
                        </nav>
                        <!-- Навигация шапка -->
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
<!-- Шапка -->
