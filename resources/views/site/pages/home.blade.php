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
                        @foreach($data['listSlider'] as $item)
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
        <script type="text/javascript"><!--
            $('#slideshow0').swiper({
                mode: 'horizontal',
                slidesPerView: 1,
                pagination: '.slideshow0',
                paginationClickable: true,
                nextButton: '.swiper-button-next',
                prevButton: '.swiper-button-prev',
                spaceBetween: 0,
                autoplay: 5000,
                autoplayDisableOnInteraction: true,
                loop: true
            });
            --></script>

        <script type="text/javascript">
            // Can also be used with $(document).ready()
            $(window).load(function() {
                $("#spinner").fadeOut("slow");
            });
        </script>

        <div class="row"><aside id="column-left" class="col-sm-3 hidden-xs">
                <div class="box category">
                    <div class="box-heading">Shop By Category</div>
                    <div class="box-content">
                        <ul id="nav-one" class="dropmenu">
                            <li class="top_level dropdown"><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=20">Fashion</a>

                                <div class="dropdown-menu megamenu column3">
                                    <div class="dropdown-inner">
                                        <ul class="list-unstyled childs_1">
                                            <!-- 2 Level Sub Categories START -->
                                            <li class="dropdown"><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=20_27">Clothing</a>

                                                <div class="dropdown-menu">
                                                    <div class="dropdown-inner">
                                                        <ul class="list-unstyled childs_2">
                                                            <li><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=20_27_49">Ethnic Wear</a></li>
                                                            <li><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=20_27_50">Sports Wear</a></li>
                                                            <li><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=20_27_51">Loungewear</a></li>
                                                            <li><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=20_27_52">Trousers</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </li>
                                            <!-- 2 Level Sub Categories END -->

                                        </ul>
                                        <ul class="list-unstyled childs_1">
                                            <!-- 2 Level Sub Categories START -->
                                            <li class="dropdown"><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=20_26">Accessories</a>

                                                <div class="dropdown-menu">
                                                    <div class="dropdown-inner">
                                                        <ul class="list-unstyled childs_2">
                                                            <li><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=20_26_53">Luggage &amp; Travel</a></li>
                                                            <li><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=20_26_54">Wallets &amp; Belts</a></li>
                                                            <li><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=20_26_55">Handbags</a></li>
                                                            <li><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=20_26_56">Printed Sarees</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </li>
                                            <!-- 2 Level Sub Categories END -->

                                        </ul>
                                        <ul class="list-unstyled childs_1">
                                            <!-- 2 Level Sub Categories START -->
                                            <li class="dropdown"><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=20_43">Footwear</a>

                                                <div class="dropdown-menu">
                                                    <div class="dropdown-inner">
                                                        <ul class="list-unstyled childs_2">
                                                            <li><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=20_43_38">Formal Shoes</a></li>
                                                            <li><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=20_43_37">Flip-Flops</a></li>
                                                            <li><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=20_43_39">Sandles</a></li>
                                                            <li><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=20_43_40">Sports Shoes</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </li>
                                            <!-- 2 Level Sub Categories END -->

                                        </ul>
                                    </div>
                                </div>

                            </li>
                            <li class="top_level"><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=18">Furniture</a></li>
                            <li class="top_level dropdown"><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=25">Electronics</a>

                                <div class="dropdown-menu megamenu column1">
                                    <div class="dropdown-inner">
                                        <ul class="list-unstyled childs_1">
                                            <!-- 2 Level Sub Categories START -->
                                            <li><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=25_32">Web Cameras</a></li>
                                            <!-- 2 Level Sub Categories END -->
                                            <!-- 2 Level Sub Categories START -->
                                            <li><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=25_28">Monitors</a></li>
                                            <!-- 2 Level Sub Categories END -->
                                            <!-- 2 Level Sub Categories START -->
                                            <li><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=25_35">Speakers</a></li>
                                            <!-- 2 Level Sub Categories END -->
                                            <!-- 2 Level Sub Categories START -->
                                            <li><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=25_30">Printers</a></li>
                                            <!-- 2 Level Sub Categories END -->
                                            <!-- 2 Level Sub Categories START -->
                                            <li><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=25_31">Scanners</a></li>
                                            <!-- 2 Level Sub Categories END -->

                                        </ul>
                                    </div>
                                </div>

                            </li>
                            <li class="top_level"><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=57">Jewellery</a></li>
                            <li class="top_level"><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=17">Automobiles</a></li>
                            <li class="top_level"><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=24">Sports</a></li>
                            <li class="top_level"><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/category&amp;path=33">Featured</a></li>
                        </ul>
                    </div>
                </div>





                <div class="swiper-viewport">
                    <div id="banner0" class="swiper-container  single-banner ">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="#">
                                    <img
                                        src="{{asset('new/images/baner/left-banner-1-250x335.jpg')}}"
                                        alt="Left banner1"
                                        class="img-responsive"
                                    />
                                </a>
                            </div>
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <script type="text/javascript"><!--
                    $('#banner0').swiper({
                        effect: 'fade',
                        autoplay: 2500,
                        pagination: '.swiper-pagination',  // If we need pagination
                        autoplayDisableOnInteraction: false
                    });
                    --></script>
                <div class="box special">
                    <div class="container">
                        <div class="box-heading">Specials</div>
                        <div class="box-content">
                            <div class="box-product productbox-grid" id="special-grid">
                                <div class="product-items">
                                    <div class="product-block product-thumb transition">
                                        <div class="product-block-inner">
                                            <div class="image">
                                                <a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=47">
                                                    <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/01-80x85.jpg"
                                                         title="Accusantium Doloremque"
                                                         alt="Accusantium Doloremque"
                                                         class="img-responsive reg-image"/>
                                                    <img class="img-responsive hover-image"
                                                         src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/02-80x85.jpg"
                                                         title="Accusantium Doloremque"
                                                         alt="Accusantium Doloremque"/>
                                                </a>
                                                <span class="saleicon sale">Sale</span>
                                                <div class="percentsaving">6% off</div>
                                                <div class="button-group">
                                                    <div class="top-btn">
                                                        <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List " onclick="wishlist.add('47 ');"><i class="fa fa-heart"></i></button>
                                                        <div class="quickview-button" data-toggle="tooltip" title="Quick view"> <a class="quickbox" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/quick_view&amp;product_id=47">
                                                                <i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                                        <button class="compare" type="button" data-toggle="tooltip" title="Add to Compare " onclick="compare.add('47 ');"><i class="fa fa-exchange"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-details">
                                                <div class="caption">
                                                    <h4><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=47 ">Accusantium Doloremque </a></h4>
                                                    <p class="price">
                                                        <span class="price-new">$98.00</span> <span class="price-old">$104.00</span>
                                                        <span class="price-tax">Ex Tax: $80.00</span>
                                                    </p>
                                                    <div class="rating">
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                    </div>
                                                    <button type="button" class="addtocart" onclick="cart.add('47 ');"><span>Add to Cart</span> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="special_default_width" style="display:none; visibility:hidden"></span>

                <div id="cztestimonialcmsblock" class="box testimonial-block">
                    <div class="box-heading">Whats People says</div>

                    <div class="box-content">
                        <div class="testimonial_wrapper">
                            <div class="testimonial-area">
                                <ul id="testimonial-carousel" class="cz-carousel product_list">
                                    <li class="slider-item">
                                        <div class="testimonial-item">
                                            <div class="item cms_face">
                                                <div class="title">
                                                    <div class="name"><a href="#">Mack Jeckno</a></div>
                                                    <span class="subheading">Manager(CEO)</span></div>
                                            </div>
                                            <div class="product_inner_cms">
                                                <div class="des">Lorem Ipsum, you need to be sure there isn't embarrassing hidden in the middle of text. Internet tend..
                                                    <div class="quote_img"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="slider-item">
                                        <div class="testimonial-item">
                                            <div class="item cms_face">
                                                <div class="title">
                                                    <div class="name"><a href="#">luies charls</a></div>
                                                    <span class="subheading">Webdesigner</span></div>
                                            </div>
                                            <div class="product_inner_cms">
                                                <div class="des">Lorem Ipsum, you need to be sure there isn't embarrassing hidden in the middle of text. Internet tend..
                                                    <div class="quote_img"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="slider-item">
                                        <div class="testimonial-item">
                                            <div class="item cms_face">
                                                <div class="title">
                                                    <div class="name"><a href="#">jecob goeckno</a></div>
                                                    <span class="subheading">Webdeveloper</span></div>
                                            </div>
                                            <div class="product_inner_cms">
                                                <div class="des">Lorem Ipsum, you need to be sure there isn't embarrassing hidden in the middle of text. Internet tend..
                                                    <div class="quote_img"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-viewport">
                    <div id="banner1" class="swiper-container  single-banner ">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="#">
                                    <img
                                        src="{{asset('new/images/baner/left-banner-2-250x335.jpg')}}"
                                        alt="Left banner2"
                                        class="img-responsive"
                                    />
                                </a>
                            </div>
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <script type="text/javascript"><!--
                    $('#banner1').swiper({
                        effect: 'fade',
                        autoplay: 2500,
                        pagination: '.swiper-pagination',  // If we need pagination
                        autoplayDisableOnInteraction: false
                    });
                    --></script>
                <div class="box">
                    <div class="box-heading">Information</div>
                    <div class="list-group">
                        <a class="list-group-item" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=information/information&amp;information_id=4">About Us </a>
                        <a class="list-group-item" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=information/information&amp;information_id=6">Delivery Information </a>
                        <a class="list-group-item" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=information/information&amp;information_id=3">Privacy Policy </a>
                        <a class="list-group-item" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=information/information&amp;information_id=5">Terms &amp; Conditions </a>
                        <a class="list-group-item" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=information/contact">Contact Us </a>
                        <a class="list-group-item" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=information/sitemap">Site Map </a>
                    </div>
                </div>
            </aside>

            <!-- Карусель товаров -->
            <div id="content" class="col-sm-9"><div class="hometab box">
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
                                <li class='tab'>
                                    <a href="#tab-special">Спец.</a>
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
                                    <div class="slider-item">
                                        <div class="product-block product-thumb transition">
                                            <div class="product-block-inner">
                                                <div class="image">
                                                    <a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=48">
                                                        <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/15-255x270.jpg" title="Voluptates Repudiandae" alt="Voluptates Repudiandae" class="img-responsive reg-image"/>
                                                        <img class="img-responsive hover-image" src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/06-255x270.jpg" title="Voluptates Repudiandae" alt="Voluptates Repudiandae"/>
                                                    </a>
                                                    <div class="button-group">
                                                        <div class="top-btn">
                                                            <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List " onclick="wishlist.add('48 ');">
                                                                <i class="fa fa-heart"></i></button>
                                                            <div class="quickview-button" data-toggle="tooltip" title="Quick view"> <a class="quickbox" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/quick_view&amp;product_id=48">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                                            <button class="compare" type="button" data-toggle="tooltip" title="Add to Compare " onclick="compare.add('48 ');">
                                                                <i class="fa fa-exchange"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-details">
                                                    <div class="caption">

                                                        <h4><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=48 ">Voluptates Repudiandae </a></h4>


                                                        <p class="price">
                                                            $140.00
                                                            <span class="price-tax">Ex Tax: $115.00</span>
                                                        </p>

                                                        <div class="rating">
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        </div>

                                                        <button type="button" class="addtocart" onclick="cart.add('48 ');"><span>Add to Cart</span></button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-item">
                                        <div class="product-block product-thumb transition">
                                            <div class="product-block-inner">
                                                <div class="image">
                                                    <a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=47">
                                                        <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/01-255x270.jpg" title="Accusantium Doloremque" alt="Accusantium Doloremque" class="img-responsive reg-image"/>
                                                        <img class="img-responsive hover-image" src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/02-255x270.jpg" title="Accusantium Doloremque" alt="Accusantium Doloremque"/>
                                                    </a>


                                                    <span class="saleicon sale">Sale</span>

                                                    <div class="percentsaving">6% off</div>

                                                    <div class="button-group">
                                                        <div class="top-btn">
                                                            <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List " onclick="wishlist.add('47 ');">
                                                                <i class="fa fa-heart"></i></button>
                                                            <div class="quickview-button" data-toggle="tooltip" title="Quick view"> <a class="quickbox" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/quick_view&amp;product_id=47">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                                            <button class="compare" type="button" data-toggle="tooltip" title="Add to Compare " onclick="compare.add('47 ');">
                                                                <i class="fa fa-exchange"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-details">
                                                    <div class="caption">

                                                        <h4><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=47 ">Accusantium Doloremque </a></h4>


                                                        <p class="price">
                                                            <span class="price-new">$98.00</span> <span class="price-old">$104.00</span>
                                                            <span class="price-tax">Ex Tax: $80.00</span>
                                                        </p>

                                                        <div class="rating">
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        </div>

                                                        <button type="button" class="addtocart" onclick="cart.add('47 ');"><span>Add to Cart</span></button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-item">
                                        <div class="product-block product-thumb transition">
                                            <div class="product-block-inner">
                                                <div class="image">
                                                    <a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=45">
                                                        <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/10-255x270.jpg" title="Neque Porro Quisquam" alt="Neque Porro Quisquam" class="img-responsive reg-image"/>
                                                        <img class="img-responsive hover-image" src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/11-255x270.jpg" title="Neque Porro Quisquam" alt="Neque Porro Quisquam"/>
                                                    </a>


                                                    <span class="saleicon sale">Sale</span>

                                                    <div class="percentsaving">3% off</div>

                                                    <div class="button-group">
                                                        <div class="top-btn">
                                                            <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List " onclick="wishlist.add('45 ');">
                                                                <i class="fa fa-heart"></i></button>
                                                            <div class="quickview-button" data-toggle="tooltip" title="Quick view"> <a class="quickbox" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/quick_view&amp;product_id=45">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                                            <button class="compare" type="button" data-toggle="tooltip" title="Add to Compare " onclick="compare.add('45 ');">
                                                                <i class="fa fa-exchange"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-details">
                                                    <div class="caption">

                                                        <h4><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=45 ">Neque Porro Quisquam </a></h4>


                                                        <p class="price">
                                                            <span class="price-new">$115.00</span> <span class="price-old">$118.00</span>
                                                            <span class="price-tax">Ex Tax: $115.00</span>
                                                        </p>

                                                        <div class="rating">
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        </div>

                                                        <button type="button" class="addtocart" onclick="cart.add('45 ');"><span>Add to Cart</span></button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-item">
                                        <div class="product-block product-thumb transition">
                                            <div class="product-block-inner">
                                                <div class="image">
                                                    <a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=43">
                                                        <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/02-255x270.jpg" title="Aliquam Quaerat" alt="Aliquam Quaerat" class="img-responsive reg-image"/>
                                                        <img class="img-responsive hover-image" src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/03-255x270.jpg" title="Aliquam Quaerat" alt="Aliquam Quaerat"/>
                                                    </a>


                                                    <span class="saleicon sale">Sale</span>

                                                    <div class="percentsaving">2% off</div>

                                                    <div class="button-group">
                                                        <div class="top-btn">
                                                            <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List " onclick="wishlist.add('43 ');">
                                                                <i class="fa fa-heart"></i></button>
                                                            <div class="quickview-button" data-toggle="tooltip" title="Quick view"> <a class="quickbox" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/quick_view&amp;product_id=43">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                                            <button class="compare" type="button" data-toggle="tooltip" title="Add to Compare " onclick="compare.add('43 ');">
                                                                <i class="fa fa-exchange"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-details">
                                                    <div class="caption">

                                                        <h4><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=43 ">Aliquam Quaerat </a></h4>


                                                        <p class="price">
                                                            <span class="price-new">$106.40</span> <span class="price-old">$108.80</span>
                                                            <span class="price-tax">Ex Tax: $87.00</span>
                                                        </p>

                                                        <div class="rating">
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        </div>

                                                        <button type="button" class="addtocart" onclick="cart.add('43 ');"><span>Add to Cart</span></button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                    <div class="slider-item">
                                        <div class="product-block product-thumb transition">
                                            <div class="product-block-inner">
                                                <div class="image">
                                                    <a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=48">
                                                        <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/15-255x270.jpg" title="Voluptates Repudiandae" alt="Voluptates Repudiandae" class="img-responsive reg-image"/>
                                                        <img class="img-responsive hover-image" src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/06-255x270.jpg" title="Voluptates Repudiandae" alt="Voluptates Repudiandae"/>
                                                    </a>




                                                    <div class="button-group">
                                                        <div class="top-btn">
                                                            <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List " onclick="wishlist.add('48 ');">
                                                                <i class="fa fa-heart"></i></button>
                                                            <div class="quickview-button" data-toggle="tooltip" title="Quick view"> <a class="quickbox" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/quick_view&amp;product_id=48">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                                            <button class="compare" type="button" data-toggle="tooltip" title="Add to Compare " onclick="compare.add('48 ');">
                                                                <i class="fa fa-exchange"></i></button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-details">
                                                    <div class="caption">

                                                        <h4><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=48 ">Voluptates Repudiandae </a></h4>

                                                        <p class="price">
                                                            $140.00
                                                            <span class="price-tax">Ex Tax: $115.00</span>
                                                        </p>

                                                        <div class="rating">
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        </div>

                                                        <button type="button" class="addtocart" onclick="cart.add('48 ');"><span>Add to Cart</span></button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-item">
                                        <div class="product-block product-thumb transition">
                                            <div class="product-block-inner">
                                                <div class="image">
                                                    <a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=43">
                                                        <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/02-255x270.jpg" title="Aliquam Quaerat" alt="Aliquam Quaerat" class="img-responsive reg-image"/>
                                                        <img class="img-responsive hover-image" src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/03-255x270.jpg" title="Aliquam Quaerat" alt="Aliquam Quaerat"/>
                                                    </a>


                                                    <span class="saleicon sale">Sale</span>

                                                    <div class="percentsaving">2% off</div>

                                                    <div class="button-group">
                                                        <div class="top-btn">
                                                            <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List " onclick="wishlist.add('43 ');">
                                                                <i class="fa fa-heart"></i></button>
                                                            <div class="quickview-button" data-toggle="tooltip" title="Quick view"> <a class="quickbox" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/quick_view&amp;product_id=43">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                                            <button class="compare" type="button" data-toggle="tooltip" title="Add to Compare " onclick="compare.add('43 ');">
                                                                <i class="fa fa-exchange"></i></button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-details">
                                                    <div class="caption">

                                                        <h4><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=43 ">Aliquam Quaerat </a></h4>

                                                        <p class="price">
                                                            <span class="price-new">$106.40</span> <span class="price-old">$108.80</span>
                                                            <span class="price-tax">Ex Tax: $87.00</span>
                                                        </p>

                                                        <div class="rating">
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        </div>

                                                        <button type="button" class="addtocart" onclick="cart.add('43 ');"><span>Add to Cart</span></button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-item">
                                        <div class="product-block product-thumb transition">
                                            <div class="product-block-inner">
                                                <div class="image">
                                                    <a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=30">
                                                        <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/05-255x270.jpg" title="Exercitat Virginia" alt="Exercitat Virginia" class="img-responsive reg-image"/>
                                                        <img class="img-responsive hover-image" src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/11-255x270.jpg" title="Exercitat Virginia" alt="Exercitat Virginia"/>
                                                    </a>


                                                    <span class="saleicon sale">Sale</span>

                                                    <div class="percentsaving">11% off</div>

                                                    <div class="button-group">
                                                        <div class="top-btn">
                                                            <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List " onclick="wishlist.add('30 ');">
                                                                <i class="fa fa-heart"></i></button>
                                                            <div class="quickview-button" data-toggle="tooltip" title="Quick view"> <a class="quickbox" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/quick_view&amp;product_id=30">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                                            <button class="compare" type="button" data-toggle="tooltip" title="Add to Compare " onclick="compare.add('30 ');">
                                                                <i class="fa fa-exchange"></i></button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-details">
                                                    <div class="caption">

                                                        <h4><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=30 ">Exercitat Virginia </a></h4>

                                                        <p class="price">
                                                            <span class="price-new">$104.00</span> <span class="price-old">$116.00</span>
                                                            <span class="price-tax">Ex Tax: $85.00</span>
                                                        </p>

                                                        <div class="rating">
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        </div>

                                                        <button type="button" class="addtocart" onclick="cart.add('30 ');"><span>Add to Cart</span></button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-item">
                                        <div class="product-block product-thumb transition">
                                            <div class="product-block-inner">
                                                <div class="image">
                                                    <a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=41">
                                                        <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/11-255x270.jpg" title="Nostrud Exercitation" alt="Nostrud Exercitation" class="img-responsive reg-image"/>
                                                        <img class="img-responsive hover-image" src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/02-255x270.jpg" title="Nostrud Exercitation" alt="Nostrud Exercitation"/>
                                                    </a>


                                                    <span class="saleicon sale">Sale</span>

                                                    <div class="percentsaving">6% off</div>

                                                    <div class="button-group">
                                                        <div class="top-btn">
                                                            <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List " onclick="wishlist.add('41 ');">
                                                                <i class="fa fa-heart"></i></button>
                                                            <div class="quickview-button" data-toggle="tooltip" title="Quick view"> <a class="quickbox" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/quick_view&amp;product_id=41">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                                            <button class="compare" type="button" data-toggle="tooltip" title="Add to Compare " onclick="compare.add('41 ');">
                                                                <i class="fa fa-exchange"></i></button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-details">
                                                    <div class="caption">

                                                        <h4><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=41 ">Nostrud Exercitation </a></h4>

                                                        <p class="price">
                                                            <span class="price-new">$78.80</span> <span class="price-old">$83.60</span>
                                                            <span class="price-tax">Ex Tax: $64.00</span>
                                                        </p>

                                                        <div class="rating">
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        </div>

                                                        <button type="button" class="addtocart" onclick="cart.add('41 ');"><span>Add to Cart</span></button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="tabbestseller_default_width" style="display:none; visibility:hidden"></span>
                    </div>
                    <!-- Популярное -->

                    <!-- Спец.предложения -->
                    <div id="tab-special" class="tab-content">
                        <div class="box">
                            <div class="box-content">
                                <div class="box-product  productbox-grid" id="tabspecial-grid">
                                    <div class="product-items">
                                        <div class="product-block product-thumb transition">
                                            <div class="product-block-inner">
                                                <div class="image">
                                                    <a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=47">
                                                        <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/01-255x270.jpg" title="Accusantium Doloremque" alt="Accusantium Doloremque" class="img-responsive reg-image"/>
                                                        <img class="img-responsive hover-image" src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/02-255x270.jpg" title="Accusantium Doloremque" alt="Accusantium Doloremque"/>
                                                    </a>


                                                    <span class="saleicon sale">Sale</span>

                                                    <div class="percentsaving">6% off</div>

                                                    <div class="button-group">
                                                        <div class="top-btn">
                                                            <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List " onclick="wishlist.add('47 ');">
                                                                <i class="fa fa-heart"></i></button>
                                                            <div class="quickview-button" data-toggle="tooltip" title="Quick view"> <a class="quickbox" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/quick_view&amp;product_id=47">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                                            <button class="compare" type="button" data-toggle="tooltip" title="Add to Compare " onclick="compare.add('47 ');">
                                                                <i class="fa fa-exchange"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-details">
                                                    <div class="caption">

                                                        <h4><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=47 ">Accusantium Doloremque </a></h4>


                                                        <p class="price">
                                                            <span class="price-new">$98.00</span> <span class="price-old">$104.00</span>
                                                            <span class="price-tax">Ex Tax: $80.00</span>
                                                        </p>

                                                        <div class="rating">
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        </div>
                                                        <button type="button" class="addtocart" onclick="cart.add('47 ');"><span>Add to Cart</span></button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-items">
                                        <div class="product-block product-thumb transition">
                                            <div class="product-block-inner">
                                                <div class="image">
                                                    <a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=43">
                                                        <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/02-255x270.jpg" title="Aliquam Quaerat" alt="Aliquam Quaerat" class="img-responsive reg-image"/>
                                                        <img class="img-responsive hover-image" src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/03-255x270.jpg" title="Aliquam Quaerat" alt="Aliquam Quaerat"/>
                                                    </a>


                                                    <span class="saleicon sale">Sale</span>

                                                    <div class="percentsaving">2% off</div>

                                                    <div class="button-group">
                                                        <div class="top-btn">
                                                            <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List " onclick="wishlist.add('43 ');">
                                                                <i class="fa fa-heart"></i></button>
                                                            <div class="quickview-button" data-toggle="tooltip" title="Quick view"> <a class="quickbox" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/quick_view&amp;product_id=43">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                                            <button class="compare" type="button" data-toggle="tooltip" title="Add to Compare " onclick="compare.add('43 ');">
                                                                <i class="fa fa-exchange"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-details">
                                                    <div class="caption">

                                                        <h4><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=43 ">Aliquam Quaerat </a></h4>


                                                        <p class="price">
                                                            <span class="price-new">$106.40</span> <span class="price-old">$108.80</span>
                                                            <span class="price-tax">Ex Tax: $87.00</span>
                                                        </p>

                                                        <div class="rating">
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        </div>
                                                        <button type="button" class="addtocart" onclick="cart.add('43 ');"><span>Add to Cart</span></button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-items">
                                        <div class="product-block product-thumb transition">
                                            <div class="product-block-inner">
                                                <div class="image">
                                                    <a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=42">
                                                        <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/04-255x270.jpg" title="Consectetur Hampden" alt="Consectetur Hampden" class="img-responsive reg-image"/>
                                                        <img class="img-responsive hover-image" src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/10-255x270.jpg" title="Consectetur Hampden" alt="Consectetur Hampden"/>
                                                    </a>


                                                    <span class="saleicon sale">Sale</span>

                                                    <div class="percentsaving">8% off</div>

                                                    <div class="button-group">
                                                        <div class="top-btn">
                                                            <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List " onclick="wishlist.add('42 ');">
                                                                <i class="fa fa-heart"></i></button>
                                                            <div class="quickview-button" data-toggle="tooltip" title="Quick view"> <a class="quickbox" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/quick_view&amp;product_id=42">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                                            <button class="compare" type="button" data-toggle="tooltip" title="Add to Compare " onclick="compare.add('42 ');">
                                                                <i class="fa fa-exchange"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-details">
                                                    <div class="caption">

                                                        <h4><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=42 ">Consectetur Hampden </a></h4>


                                                        <p class="price">
                                                            <span class="price-new">$110.00</span> <span class="price-old">$119.60</span>
                                                            <span class="price-tax">Ex Tax: $90.00</span>
                                                        </p>

                                                        <div class="rating">
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        </div>
                                                        <button type="button" class="addtocart" onclick="cart.add('42 ');"><span>Add to Cart</span></button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-items">
                                        <div class="product-block product-thumb transition">
                                            <div class="product-block-inner">
                                                <div class="image">
                                                    <a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=30">
                                                        <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/05-255x270.jpg" title="Exercitat Virginia" alt="Exercitat Virginia" class="img-responsive reg-image"/>
                                                        <img class="img-responsive hover-image" src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/11-255x270.jpg" title="Exercitat Virginia" alt="Exercitat Virginia"/>
                                                    </a>


                                                    <span class="saleicon sale">Sale</span>

                                                    <div class="percentsaving">11% off</div>

                                                    <div class="button-group">
                                                        <div class="top-btn">
                                                            <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List " onclick="wishlist.add('30 ');">
                                                                <i class="fa fa-heart"></i></button>
                                                            <div class="quickview-button" data-toggle="tooltip" title="Quick view"> <a class="quickbox" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/quick_view&amp;product_id=30">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                                            <button class="compare" type="button" data-toggle="tooltip" title="Add to Compare " onclick="compare.add('30 ');">
                                                                <i class="fa fa-exchange"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-details">
                                                    <div class="caption">

                                                        <h4><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=30 ">Exercitat Virginia </a></h4>


                                                        <p class="price">
                                                            <span class="price-new">$104.00</span> <span class="price-old">$116.00</span>
                                                            <span class="price-tax">Ex Tax: $85.00</span>
                                                        </p>

                                                        <div class="rating">
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        </div>
                                                        <button type="button" class="addtocart" onclick="cart.add('30 ');"><span>Add to Cart</span></button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cz-status">
                                <i class="fa fa-frown-o"></i>
                                No more products found!
                            </div>
                            <div class="viewmore">
                                <button class="btn btn-default gridcount">View More Products</button>
                            </div>
                        </div>
                        <span class="tabspecial_default_width" style="display:none; visibility:hidden"></span>
                    </div>
                    <!-- Спец.предложения -->
                </div>
                <!-- Карусель товаров -->
                <script type="text/javascript">
                    $('#tabs a').tabs();
                </script>

                <!-- Блок банеров -->
                <div id="czbannercmsblock" class="block czbanners">
                    <div class="cmsbanners">
                        <div class="one-half cmsbanner-part1">
                            <div class="cmsbanner-inner">
                                <div class="cmsbanner cmsbanner1"><a href="#" class="banner-anchor"><img src="image/catalog/cms-banner-1.jpg" alt="cms-banner1" class="banner-image1"></a>
                                    <div class="banner-detail">
                                        <div class="cmsbanner-text">Departments Title</div>
                                        <div class="shopnow"><a href="#" class="shop-now">Shop now !</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="one-half cmsbanner-part2">
                            <div class="cmsbanner-inner">
                                <div class="cmsbanner cmsbanner2"><a href="#" class="banner-anchor"><img src="image/catalog/cms-banner-2.jpg" alt="cms-banner2" class="banner-image2"></a>
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
                                <div class="service-icon icon1"></div>
                                <div class="service-content">
                                    <div class="service-heading">Free World Delivery</div>
                                    <div class="service-description">Orders Over $100</div>
                                </div>
                            </div>
                            <div class="service-fourth service2">
                                <div class="service-icon icon2"></div>
                                <div class="service-content">
                                    <div class="service-heading">Money Back Guarantee</div>
                                    <div class="service-description">Within 30 Days</div>
                                </div>
                            </div>
                            <div class="service-fourth service3">
                                <div class="service-icon icon3"></div>
                                <div class="service-content">
                                    <div class="service-heading">Best Online Support</div>
                                    <div class="service-description">Hours : 8am - 11pm</div>
                                </div>
                            </div>
                            <div class="service-fourth service4">
                                <div class="service-icon icon4"></div>
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
                                <div class="slider-item">
                                    <div class="product-block product-thumb transition">
                                        <div class="product-block-inner">
                                            <div class="image">
                                                <a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=43">
                                                    <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/02-255x270.jpg" title="Aliquam Quaerat" alt="Aliquam Quaerat" class="img-responsive reg-image"/>
                                                    <img class="img-responsive hover-image" src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/03-255x270.jpg" title="Aliquam Quaerat" alt="Aliquam Quaerat"/>
                                                </a>


                                                <span class="saleicon sale">Sale</span>


                                                <div class="percentsaving">2% off</div>

                                                <div class="button-group">
                                                    <div class="top-btn">
                                                        <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List " onclick="wishlist.add('43 ');"><i class="fa fa-heart"></i></button>
                                                        <div class="quickview-button" data-toggle="tooltip" title="Quick view"> <a class="quickbox" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/quick_view&amp;product_id=43">
                                                                <i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                                        <button class="compare" type="button" data-toggle="tooltip" title="Add to Compare " onclick="compare.add('43 ');"><i class="fa fa-exchange"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product-details">
                                                <div class="caption">

                                                    <h4><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=43 ">Aliquam Quaerat </a></h4>


                                                    <p class="price">
                                                        <span class="price-new">$106.40</span> <span class="price-old">$108.80</span>
                                                        <span class="price-tax">Ex Tax: $87.00</span>
                                                    </p>

                                                    <div class="rating">
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                    </div>
                                                    <button type="button" class="addtocart" onclick="cart.add('43 ');"><span>Add to Cart</span> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <div class="product-block product-thumb transition">
                                        <div class="product-block-inner">
                                            <div class="image">
                                                <a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=40">
                                                    <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/13-255x270.jpg" title="Praesentium Voluptatum" alt="Praesentium Voluptatum" class="img-responsive reg-image"/>
                                                    <img class="img-responsive hover-image" src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/04-255x270.jpg" title="Praesentium Voluptatum" alt="Praesentium Voluptatum"/>
                                                </a>




                                                <div class="button-group">
                                                    <div class="top-btn">
                                                        <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List " onclick="wishlist.add('40 ');"><i class="fa fa-heart"></i></button>
                                                        <div class="quickview-button" data-toggle="tooltip" title="Quick view"> <a class="quickbox" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/quick_view&amp;product_id=40">
                                                                <i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                                        <button class="compare" type="button" data-toggle="tooltip" title="Add to Compare " onclick="compare.add('40 ');"><i class="fa fa-exchange"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product-details">
                                                <div class="caption">

                                                    <h4><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=40 ">Praesentium Voluptatum </a></h4>


                                                    <p class="price">
                                                        $128.00
                                                        <span class="price-tax">Ex Tax: $105.00</span>
                                                    </p>

                                                    <div class="rating">
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                    </div>
                                                    <button type="button" class="addtocart" onclick="cart.add('40 ');"><span>Add to Cart</span> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <div class="product-block product-thumb transition">
                                        <div class="product-block-inner">
                                            <div class="image">
                                                <a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=42">
                                                    <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/04-255x270.jpg" title="Consectetur Hampden" alt="Consectetur Hampden" class="img-responsive reg-image"/>
                                                    <img class="img-responsive hover-image" src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/10-255x270.jpg" title="Consectetur Hampden" alt="Consectetur Hampden"/>
                                                </a>


                                                <span class="saleicon sale">Sale</span>


                                                <div class="percentsaving">8% off</div>

                                                <div class="button-group">
                                                    <div class="top-btn">
                                                        <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List " onclick="wishlist.add('42 ');"><i class="fa fa-heart"></i></button>
                                                        <div class="quickview-button" data-toggle="tooltip" title="Quick view"> <a class="quickbox" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/quick_view&amp;product_id=42">
                                                                <i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                                        <button class="compare" type="button" data-toggle="tooltip" title="Add to Compare " onclick="compare.add('42 ');"><i class="fa fa-exchange"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product-details">
                                                <div class="caption">

                                                    <h4><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=42 ">Consectetur Hampden </a></h4>


                                                    <p class="price">
                                                        <span class="price-new">$110.00</span> <span class="price-old">$119.60</span>
                                                        <span class="price-tax">Ex Tax: $90.00</span>
                                                    </p>

                                                    <div class="rating">
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                    </div>
                                                    <button type="button" class="addtocart" onclick="cart.add('42 ');"><span>Add to Cart</span> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <div class="product-block product-thumb transition">
                                        <div class="product-block-inner">
                                            <div class="image">
                                                <a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=35">
                                                    <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/03-255x270.jpg" title="Commodi Consequatur" alt="Commodi Consequatur" class="img-responsive reg-image"/>
                                                    <img class="img-responsive hover-image" src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/08-255x270.jpg" title="Commodi Consequatur" alt="Commodi Consequatur"/>
                                                </a>




                                                <div class="button-group">
                                                    <div class="top-btn">
                                                        <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List " onclick="wishlist.add('35 ');"><i class="fa fa-heart"></i></button>
                                                        <div class="quickview-button" data-toggle="tooltip" title="Quick view"> <a class="quickbox" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/quick_view&amp;product_id=35">
                                                                <i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                                        <button class="compare" type="button" data-toggle="tooltip" title="Add to Compare " onclick="compare.add('35 ');"><i class="fa fa-exchange"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product-details">
                                                <div class="caption">

                                                    <h4><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=35 ">Commodi Consequatur </a></h4>


                                                    <p class="price">
                                                        $136.40
                                                        <span class="price-tax">Ex Tax: $112.00</span>
                                                    </p>

                                                    <div class="rating">
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                    </div>
                                                    <button type="button" class="addtocart" onclick="cart.add('35 ');"><span>Add to Cart</span> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <div class="product-block product-thumb transition">
                                        <div class="product-block-inner">
                                            <div class="image">
                                                <a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=32">
                                                    <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/14-255x270.jpg" title="Reprehenderit Aliquam" alt="Reprehenderit Aliquam" class="img-responsive reg-image"/>
                                                    <img class="img-responsive hover-image" src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/05-255x270.jpg" title="Reprehenderit Aliquam" alt="Reprehenderit Aliquam"/>
                                                </a>


                                                <span class="saleicon sale">Sale</span>


                                                <div class="percentsaving">7% off</div>

                                                <div class="button-group">
                                                    <div class="top-btn">
                                                        <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List " onclick="wishlist.add('32 ');"><i class="fa fa-heart"></i></button>
                                                        <div class="quickview-button" data-toggle="tooltip" title="Quick view"> <a class="quickbox" href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/quick_view&amp;product_id=32">
                                                                <i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                                        <button class="compare" type="button" data-toggle="tooltip" title="Add to Compare " onclick="compare.add('32 ');"><i class="fa fa-exchange"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product-details">
                                                <div class="caption">

                                                    <h4><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=product/product&amp;product_id=32 ">Reprehenderit Aliquam </a></h4>


                                                    <p class="price">
                                                        <span class="price-new">$110.00</span> <span class="price-old">$118.40</span>
                                                        <span class="price-tax">Ex Tax: $90.00</span>
                                                    </p>

                                                    <div class="rating">
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                    </div>
                                                    <button type="button" class="addtocart" onclick="cart.add('32 ');"><span>Add to Cart</span> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Рекомендуемые -->

                <span class="featured_default_width" style="display:none; visibility:hidden"></span>

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
                            <div class="slider-item">
                                <div class="product-block">
                                    <div class="product-block-inner">
                                        <img src="{{asset('new/images/brands/1.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="slider-item">
                                <div class="product-block">
                                    <div class="product-block-inner">
                                        <img src="{{asset('new/images/brands/2.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="slider-item">
                                <div class="product-block">
                                    <div class="product-block-inner">
                                        <img src="{{asset('new/images/brands/3.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="slider-item">
                                <div class="product-block">
                                    <div class="product-block-inner">
                                        <img src="{{asset('new/images/brands/4.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="slider-item">
                                <div class="product-block">
                                    <div class="product-block-inner">
                                        <img src="{{asset('new/images/brands/5.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="slider-item">
                                <div class="product-block">
                                    <div class="product-block-inner">
                                        <img src="{{asset('new/images/brands/6.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="slider-item">
                                <div class="product-block">
                                    <div class="product-block-inner">
                                        <img src="{{asset('new/images/brands/7.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>
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

                            <div class="blog-item">
                                <div class="product-block">
                                    <div class="product-block-inner">

                                        <div class="blog-left">
                                            <div class="blog-image">
                                                <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/blog-6-1110x712.jpg" alt="Latest Blog" title="Latest Blog" class="img-thumbnail" />
                                                <div class="post-image-hover"> </div>
                                                <p class="post_hover"><a class="icon zoom" title="Click to view Full Image " href="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/blog-6-1110x712.jpg" data-lightbox="example-set"><i class="fa fa-search-plus"></i> </a>
                                                    <a class="icon readmore_link" title="Click to view Read More " href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=information/blogger&amp;blogger_id=6"><i class="fa fa-link"></i></a>
                                                </p>
                                            </div>

                                        </div>




                                        <div class="blog-right">

                                            <div class="date-comment">
                                                <div class="date-time"> <i class="fa fa-calendar"></i>  15/05/2018</div>
                                            </div>

                                            <h4 class="blog_title"><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=information/blogger&amp;blogger_id=6">Necessitatibus Saepe Eveniet</a> </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="blog-item">
                                <div class="product-block">
                                    <div class="product-block-inner">

                                        <div class="blog-left">
                                            <div class="blog-image">
                                                <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/blog-5-1110x712.jpg" alt="Latest Blog" title="Latest Blog" class="img-thumbnail" />
                                                <div class="post-image-hover"> </div>
                                                <p class="post_hover"><a class="icon zoom" title="Click to view Full Image " href="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/blog-5-1110x712.jpg" data-lightbox="example-set"><i class="fa fa-search-plus"></i> </a>
                                                    <a class="icon readmore_link" title="Click to view Read More " href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=information/blogger&amp;blogger_id=5"><i class="fa fa-link"></i></a>
                                                </p>
                                            </div>

                                        </div>




                                        <div class="blog-right">

                                            <div class="date-comment">
                                                <div class="date-time"> <i class="fa fa-calendar"></i>  15/05/2018</div>
                                            </div>

                                            <h4 class="blog_title"><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=information/blogger&amp;blogger_id=5">Quis Autem Reprehender Pariatur</a> </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="blog-item">
                                <div class="product-block">
                                    <div class="product-block-inner">

                                        <div class="blog-left">
                                            <div class="blog-image">
                                                <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/blog-4-1110x712.jpg" alt="Latest Blog" title="Latest Blog" class="img-thumbnail" />
                                                <div class="post-image-hover"> </div>
                                                <p class="post_hover"><a class="icon zoom" title="Click to view Full Image " href="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/blog-4-1110x712.jpg" data-lightbox="example-set"><i class="fa fa-search-plus"></i> </a>
                                                    <a class="icon readmore_link" title="Click to view Read More " href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=information/blogger&amp;blogger_id=4"><i class="fa fa-link"></i></a>
                                                </p>
                                            </div>

                                        </div>




                                        <div class="blog-right">

                                            <div class="date-comment">
                                                <div class="date-time"> <i class="fa fa-calendar"></i>  15/05/2018</div>
                                            </div>

                                            <h4 class="blog_title"><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=information/blogger&amp;blogger_id=4">Voluptatem Accusantium Doloremque</a> </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="blog-item">
                                <div class="product-block">
                                    <div class="product-block-inner">

                                        <div class="blog-left">
                                            <div class="blog-image">
                                                <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/blog-3-1110x712.jpg" alt="Latest Blog" title="Latest Blog" class="img-thumbnail" />
                                                <div class="post-image-hover"> </div>
                                                <p class="post_hover"><a class="icon zoom" title="Click to view Full Image " href="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/blog-3-1110x712.jpg" data-lightbox="example-set"><i class="fa fa-search-plus"></i> </a>
                                                    <a class="icon readmore_link" title="Click to view Read More " href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=information/blogger&amp;blogger_id=3"><i class="fa fa-link"></i></a>
                                                </p>
                                            </div>

                                        </div>




                                        <div class="blog-right">

                                            <div class="date-comment">
                                                <div class="date-time"> <i class="fa fa-calendar"></i>  15/05/2018</div>
                                            </div>

                                            <h4 class="blog_title"><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=information/blogger&amp;blogger_id=3">Matters To This Principle Of Selection</a> </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="blog-item">
                                <div class="product-block">
                                    <div class="product-block-inner">

                                        <div class="blog-left">
                                            <div class="blog-image">
                                                <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/blog-2-1110x712.jpg" alt="Latest Blog" title="Latest Blog" class="img-thumbnail" />
                                                <div class="post-image-hover"> </div>
                                                <p class="post_hover"><a class="icon zoom" title="Click to view Full Image " href="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/blog-2-1110x712.jpg" data-lightbox="example-set"><i class="fa fa-search-plus"></i> </a>
                                                    <a class="icon readmore_link" title="Click to view Read More " href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=information/blogger&amp;blogger_id=2"><i class="fa fa-link"></i></a>
                                                </p>
                                            </div>

                                        </div>




                                        <div class="blog-right">

                                            <div class="date-comment">
                                                <div class="date-time"> <i class="fa fa-calendar"></i>  15/05/2018</div>
                                            </div>

                                            <h4 class="blog_title"><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=information/blogger&amp;blogger_id=2">Omnis Voluptas Assumenda Est</a> </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="blog-item">
                                <div class="product-block">
                                    <div class="product-block-inner">

                                        <div class="blog-left">
                                            <div class="blog-image">
                                                <img src="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/blog-1-1110x712.jpg" alt="Latest Blog" title="Latest Blog" class="img-thumbnail" />
                                                <div class="post-image-hover"> </div>
                                                <p class="post_hover"><a class="icon zoom" title="Click to view Full Image " href="https://codezeel.com/opencart/OPC01/OPC010010/image/cache/catalog/blog-1-1110x712.jpg" data-lightbox="example-set"><i class="fa fa-search-plus"></i> </a>
                                                    <a class="icon readmore_link" title="Click to view Read More " href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=information/blogger&amp;blogger_id=1"><i class="fa fa-link"></i></a>
                                                </p>
                                            </div>

                                        </div>




                                        <div class="blog-right">

                                            <div class="date-comment">
                                                <div class="date-time"> <i class="fa fa-calendar"></i>  15/05/2018</div>
                                            </div>

                                            <h4 class="blog_title"><a href="https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=information/blogger&amp;blogger_id=1">Praesentium Voluptatum Deleniti</a> </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="buttons text-center">
                            <button type="button" onclick="location='https://codezeel.com/opencart/OPC01/OPC010010/index.php?route=information/blogger/blogs ';" class="btn btn-primary">See all Blogs</button>
                        </div>
                    </div>
                </div>
                <!-- Блог -->

                <span class="blog_default_width" style="display:none; visibility:hidden"></span>

                <!-- Скрипт блога -->
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('.blogcarousel').owlCarousel({
                            items: 3,
                            singleItem: false,
                            navigation: false,
                            pagination: false,
                            itemsDesktop : [1199,3],
                            itemsDesktopSmall :	[991,2],
                            itemsTablet :	[575,1]
                        });
                        $(".czblog_next").click(function(){
                            $('.blogcarousel').trigger('owl.next');
                        })
                        $(".czblog_prev").click(function(){
                            $('.blogcarousel').trigger('owl.prev');
                        });
                    });
                </script>
                <!-- Скрипт блога -->

            </div>
        </div>
    </div>
@endsection
