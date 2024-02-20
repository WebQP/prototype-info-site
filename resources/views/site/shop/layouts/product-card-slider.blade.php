<div class="slider-item">
    <div class="product-block product-thumb transition">
        <div class="product-block-inner">
            <div class="image">
                <a href="{{$item['slug']}}">
                    <img src="{{$item['image_1']}}" title="{{$item['name']}}" alt="{{$item['name']}}" class="img-responsive reg-image"/>
                    <img src="{{$item['image_2']}}" title="{{$item['name']}}" alt="{{$item['name']}}" class="img-responsive hover-image"/>
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
                        <span class="price-new">
                            ${{$item['price']}}
                        </span>
                        <span class="price-old">
                            ${{$item['price_old']}}
                        </span>
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
