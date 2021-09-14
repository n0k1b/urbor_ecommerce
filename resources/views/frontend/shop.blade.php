@extends('frontend.layout.app2')
@section('main_content')
<main class="no-main">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="ps-breadcrumb__list">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="javascript:void(0);">Shop</a></li>
            </ul>
        </div>
    </div>
    <section class="section-shop">

        <div class="shop__header mobile">
            <div class="owl-carousel shop__header--carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-item-xl="1" data-owl-duration="1000" data-owl-mousedrag="on"><a href="shop-categories.html"><img src="img/shop/shop-grid-mobile-side-1.jpg" alt></a><a href="shop-categories.html"><img src="img/shop/shop-grid-mobile-side-2.jpg" alt></a><a href="shop-categories.html"><img src="img/shop/shop-grid-mobile-side-3.jpg" alt></a>
            </div>
            <div class="container">
                <div class="shop__header__promo">
                    <div class="promo-item"><a href="shop-with-banner.html"><img src="img/shop/shop-grid-mobile-promo-1.jpg" alt></a></div>
                    <div class="promo-item"><a href="shop-all-brands.html"><img src="img/shop/shop-grid-mobile-promo-2.jpg" alt></a></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="shop__content">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="ps-shop--sidebar">
                            <div class="sidebar__category">
                                <div class="sidebar__title">ALL CATEGORIES</div>
                                <ul class="menu--mobile">

                                    <li class="category-item"> <a href="shop-categories.html">Top Promotions</a>
                                    </li>
                                    <li class="category-item"> <a href="shop-categories.html">New Arrivals</a>
                                    </li>

                                    <li class="menu-item-has-children category-item"><a href="shop-categories.html">Food Cupboard</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                                        <ul class="sub-menu">
                                            <li> <a href="shop-view-grid.html">Crisps, Snacks & Nuts</a>
                                            </li>
                                            <li> <a href="shop-view-grid.html">Breakfast Cereals</a>
                                            </li>
                                            <li> <a href="shop-view-grid.html">Tins & Cans</a>
                                            </li>
                                            <li> <a href="shop-view-grid.html">Chocolate & Sweets</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="category-item"> <a href="shop-categories.html">Bakery</a>
                                    </li>
                                    <li class="category-item"> <a href="shop-categories.html">Frozen Foods</a>
                                    </li>
                                    <li class="menu-item-has-children category-item"><a href="shop-categories.html">Ready Meals</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                                        <ul class="sub-menu">
                                            <li> <a href="shop-view-grid.html">Traditional British</a>
                                            </li>
                                            <li> <a href="shop-view-grid.html">Indian</a>
                                            </li>
                                            <li> <a href="shop-view-grid.html">Italian</a>
                                            </li>
                                            <li> <a href="shop-view-grid.html">Chinese</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children category-item"><a href="shop-categories.html">Drinks, Tea &amp; Coffee</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                                        <ul class="sub-menu">
                                            <li> <a href="shop-view-grid.html">Tea & Coffee</a>
                                            </li>
                                            <li> <a href="shop-view-grid.html">Hot Drinks</a>
                                            </li>
                                            <li> <a href="shop-view-grid.html">Fizzy Drinks</a>
                                            </li>
                                            <li> <a href="shop-view-grid.html">Water</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="category-item"> <a href="shop-categories.html">Beer, Wine & Spirits</a>
                                    </li>
                                    <li class="category-item"> <a href="shop-categories.html">Baby & Child</a>
                                    </li>
                                    <li class="category-item"> <a href="shop-categories.html">Kitchen & Dining</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-lg-9">

                        <div class="result__content">
                            <div class="">
                                <div class="row">
                                    @foreach ( $products as $product )
                                    <?php
                                    $discount_percentage = 0;
                                    $discount_price = 0;
                                    ?>
                                    <div class="col-6 col-md-4 col-lg-3 p-0" style="height: 405px">
                                        <div class="ps-product--standard">
                                            <a href="product_details/{{ $product->id }}" ><img class="ps-product__thumbnail" height="150px"  src="{{ $product->thumbnail_image }}" alt="alt" /></a><a class="ps-product__expand" href="product_details/{{ $product->id }}" ><i class="icon-expand"></i></a>
                                            <div class="ps-product__content" href="product_details/{{ $product->id }}" >

                                                <h5><a class="ps-product__name" style="height: 40px" href="product_details/{{ $product->id }}" >{{ $product->name }}</a></h5>

                                                @if($discount_percentage>0)
                                                <p class="ps-product__unit product_unit">{{ $product->unit->unit_quantity }} {{ $product->unit->unit_type }}<span class="ps-product-price-block"> Tk <span class="ps-product__sale">{{ $discount_price }}</span><span class="ps-product__price">TK {{ $product->price }}</span><span class="ps-product__off">{{ $product_list->discount_percentage }}% Off</span></span></p>


                                                @else
                                                <p class="ps-product__unit text-center product_unit">{{ $product->unit->unit_quantity }} {{ $product->unit->unit_type }}<span clas="ps-product-price-block"> Tk <span class="ps-product__sale">{{ $discount_price }}</span></span></p>
                                                {{-- <p class="ps-product-price-block">Tk <span class="ps-product__sale">{{ $discount_price }}</span> --}}
                                                </p>
                                                @endif

                                                <p class="ps-product__unit text-center">Stock: {{ $product->stock }} Unit</p>

                                                {{-- <p class="ps-product__sold">Stock in Unit: {{ $product->stock->stock_amount }}</p> --}}
                                            </div>
                                            <div class="ps-product__footer">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus dec" onclick="dec({{$product->id  }})" ><i class="icon-minus"></i></button>
                                                    <input class="quantity quantity-{{ $product->id }}" value="1" min="0" name="quantity" type="number" id="quantity-{{ $product->id }}"  readonly='readonly' />
                                                    <input type="hidden" name="hidden_product_id" value={{  $product->id}}>
                                                    <button class="plus inc"><i class="icon-plus"></i></button>
                                                </div>
                                                <div class="ps-product__total"></div>
                                                @if($discount_percentage>0)
                                                <button class="add-to-cart  ps-product__addcart"  data-type='product'  data-unit= '{{ $product->unit->unit_quantity }} {{ $product->unit->unit_type }}' data-id = '{{ $product->id }}' data-image='{{ $product->thumbnail_image }}' data-name="{{ $product->name }}" data-price="{{ $discount_price}}" ><i class="icon-cart"></i>Add to cart</button>
                                                @else
                                                <button class="add-to-cart  ps-product__addcart"  data-type='product' data-unit= '{{ $product->unit->unit_quantity }} {{ $product->unit->unit_type }}' data-id = '{{ $product->id }}' data-image='{{ $product->thumbnail_image }}' data-name="{{ $product->name }}" data-price="{{ $product->price }}" ><i class="icon-cart"></i>Add to cart</button>
                                                @endif
                                                {{-- <div class="ps-product__box"><a class="ps-product__wishlist" href="#">Wishlist</a></div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                            </div>
                            <div class="ps-pagination blog--pagination">
                                {!! $products->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</main>
@endsection
