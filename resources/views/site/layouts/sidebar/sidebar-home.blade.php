<aside id="column-left" class="col-sm-3 hidden-xs">
    <div class="box category">
        <div class="box-heading">Shop By Category</div>
        <div class="box-content">
            <ul id="nav-one" class="dropmenu">
                <!-- Многоуровнвое <li class="top_level dropdown">
                    <a href="#">Fashion</a>
                    <div class="dropdown-menu megamenu column3">
                        <div class="dropdown-inner">
                            <ul class="list-unstyled childs_1">
                                <li class="dropdown">
                                <a href="#">Clothing</a>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-inner">
                                            <ul class="list-unstyled childs_2">
                                                <li>
                                                <a href="#">Ethnic Wear</a></li>
                                             </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-unstyled childs_1">
                                <li class="dropdown">
                                <a href="#">Accessories</a>

                                    <div class="dropdown-menu">
                                        <div class="dropdown-inner">
                                            <ul class="list-unstyled childs_2">
                                                <li>
                                                <a href="#">Luggage &amp; Travel</a>
                                                </li>
                                              </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-unstyled childs_1">
                                <li class="dropdown">
                                <a href="#">Footwear</a>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-inner">
                                            <ul class="list-unstyled childs_2">
                                                <li>
                                                <a href="#">
                                                Formal Shoes
                                                     </a>
                                                 </li>
                                               </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li> -->
                @foreach($data->sidebar['shopCategories'] as $item)
                    @if(count($item['children']) > 0)
                        <li class="top_level dropdown">
                            <a href="{{$item['slug']}}">{{$item['name']}}</a>
                            <div class="dropdown-menu megamenu column1">
                                <div class="dropdown-inner">
                                    <ul class="list-unstyled childs_1">
                                        @foreach($item['children'] as $children)
                                            <li>
                                                <a href="{{$children['slug']}}">{{$children['name']}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="top_level">
                            <a href="{{$item['slug']}}">{{$item['name']}}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>

    <div class="swiper-viewport">
        <div id="banner0" class="swiper-container  single-banner  swiper-container-horizontal swiper-container-fade">
            <div class="swiper-wrapper">
                <div class="swiper-slide swiper-slide-active" style="opacity: 1; transform: translate3d(0px, 0px, 0px);">
                    <a href="#" class="w-100">
                        <img src="{{asset('new/images/preview/left-banner-1-250x335.jpg')}}" alt="Left banner1"
                             class="w-100">
                    </a>
                </div>
            </div>
            <div class="swiper-pagination swiper-pagination-bullets">
                <span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span>
            </div>
        </div>
    </div>

    <div class="box special">
        <div class="container">
            <div class="box-heading">Specials</div>
            <div class="box-content">
                <div class="box-product productbox-grid box-sidebar" id="special-grid">
                    @foreach($data->sidebar['shopSpecialsProducts'] as $item)
                        <div class="product-items">
                            <div class="product-block product-thumb transition">
                                <div class="product-block-inner">
                                    <div class="image">
                                        <a href="{{$item['slug']}}">
                                            <img src="{{$item['image_1']}}"
                                                 title="{{$item['name']}}"
                                                 alt="{{$item['name']}}"
                                                 class="img-responsive reg-image"/>
                                            <img class="img-responsive hover-image"
                                                 src="{{$item['image_2']}}"
                                                 title="{{$item['name']}}"
                                                 alt="{{$item['name']}}"/>
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
            </div>
        </div>
    </div>

    <div class="swiper-viewport">
        <div id="banner0" class="swiper-container  single-banner  swiper-container-horizontal swiper-container-fade">
            <div class="swiper-wrapper">
                <div class="swiper-slide swiper-slide-active" style="opacity: 1; transform: translate3d(0px, 0px, 0px);">
                    <a href="#">
                        <img src="{{asset('new/images/preview/left-banner-2-250x335.jpg')}}" alt="Left banner1"
                             class="img-responsive w-100">
                    </a>
                </div>
            </div>
            <div class="swiper-pagination swiper-pagination-bullets">
                <span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="box-heading">Information</div>
        <div class="list-group">
            <li class="list-group-item"><a href="/about-the-company">Despre companie</a></li>
            <li class="list-group-item"><a href="/livrarea-i-achitarea">Livrarea şi achitarea</a></li>
            <li class="list-group-item"><a href="/terms-and-conditions">Termeni și condiții</a></li>
            <li class="list-group-item"><a href="/vacancies">Posturi vacante</a></li>
            <li class="list-group-item"><a href="/sitemap">Harta Site-ului</a></li>
        </div>
    </div>
</aside>
