@extends('frontend.layout.app2')

@section('main_content')
<main class="no-main ps-home--dark">
    <div class="section-slide--default">
        <div class="owl-carousel" data-owl-auto="false" data-owl-loop="false" data-owl-speed="3000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1"
            data-owl-duration="3000" data-owl-mousedrag="on">
            @foreach($banners as $banner)
            <div class="ps-banner">
                <img class="mobile-only" src="{{ $banner->image }}" alt="alt" />
                <img class="desktop-only" src="{{ $banner->image }}" alt="alt" />

            </div>
            @endforeach


        </div>
    </div>
    <section class="ps-component ps-component--category">
        <div class="container">
            <div class="component__header">
                <h3 class="component__title">Shop By Category</h3><a class="component__view" href="#">View all <i class="icon-chevron-right"></i></a>
            </div>
            <div class="component__content">
                <div class="owl-carousel" data-owl-auto="false" data-owl-loop="false" data-owl-speed="3000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="8" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="5" data-owl-item-lg="8" data-owl-duration="1000"
                    data-owl-mousedrag="on">
                    @foreach ($categories as $category)
                    <div class="ps-category__item">
                        <a href="view_all/category_prodcut-{{$category->id}}"><img class="ps-categories__thumbnail" style="width:100px;height:100px" src="{{ $category->image }}" alt></a><a class="ps-categories__name" href="view_all/category_prodcut-{{$category->id}}">{{ $category->name }} </a>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>
    @foreach($homepage_section_content as $section_product)




    <section class="ps-component ps-component--flash">
        <div class="container">
            <div class="component__header">
                <h3 class="component__title">{{ $section_product->section_name }}</h3><a class="component__view" href="view_all/section_prodcut-{{$section_product->id}}">View all <i class="icon-chevron-right"></i></a>
            </div>
            <div class="component__content">
                <div class="owl-carousel" data-owl-auto="false" data-owl-loop="false" data-owl-speed="8000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="5" data-owl-item-xs="5" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5"
                    data-owl-duration="1000" data-owl-mousedrag="on">
                    @foreach($section_product->product_list as $product_list)
                    <?php
                       $discount_price =$product_list->product->price- floor(($product_list->product->price*$product_list->discount_percentage)/100);
                    ?>
                    <div class="ps-flash__product">
                        <div class="ps-product--standard">
                            <a href="javascript:void(0);" onclick="show_cart_modal({{$product_list->product->id}})"><img class="ps-product__thumbnail" height="150px"  src="{{ $product_list->product->thumbnail_image }}" alt="alt" /></a><a class="ps-product__expand" href="javascript:void(0);" onclick="show_cart_modal({{$product_list->product->id}})"><i class="icon-expand"></i></a>
                            <div class="ps-product__content" href="javascript:void(0);" onclick="show_cart_modal({{$product_list->product->id}})">

                                <h5><a class="ps-product__name" style="height: 40px" href="javascript:void(0);" onclick="show_cart_modal({{$product_list->product->id}})">{{ $product_list->product->name }}</a></h5>
                                <p class="ps-product__unit">{{ $product_list->product->unit->unit_quantity }} {{ $product_list->product->unit->unit_type }}</p>
                                @if($product_list->discount_percentage>0)
                                <p class="ps-product-price-block">Tk <span class="ps-product__sale">{{ $discount_price }}</span><span class="ps-product__price">TK {{ $product_list->product->price }}</span><span class="ps-product__off">{{ $product_list->discount_percentage }}% Off</span>
                                </p>
                                @else
                                <p class="ps-product-price-block">Tk <span class="ps-product__sale">{{ $discount_price }}</span>
                                </p>
                                @endif

                                <p class="ps-product__sold">Stock in Unit: {{ $product_list->product->stock->stock_amount }}</p>
                            </div>
                            <div class="ps-product__footer">
                                <div class="def-number-input number-input safari_only">
                                    <button class="minus dec" onclick="dec({{$product_list->product->id  }})" ><i class="icon-minus"></i></button>
                                    <input class="quantity quantity-{{ $product_list->product->id }}" value="1" min="0" name="quantity" type="number" id="quantity-{{ $product_list->product->id }}"   />
                                    <input type="hidden" id="input_quantity-{{$product_list->product->id}}">
                                    <input type="hidden" name="hidden_product_id" value={{  $product_list->product->id}}>
                                    <button class="plus inc"><i class="icon-plus"></i></button>
                                </div>
                                <div class="ps-product__total"></div>
                                <button class="ps-product__addcart" onclick="cart_add({{ $product_list->product->id }})"><i class="icon-cart"></i>Add to cart</button>
                                <div class="ps-product__box"><a class="ps-product__wishlist" href="#">Wishlist</a></div>
                            </div>
                        </div>
                    </div>

                    @endforeach






                </div>
            </div>
        </div>
    </section>

    @endforeach






    <section class="ps-component--register">
        <div class="container">
            <h3 class="component__title">Get started to Urbor</h3>
            <p>Join other shoppers in your area, and try Urbor today.</p><a class="ps-button" href="#">Register An Account</a>
        </div>
    </section>
</main>
@endsection
@section('page_js')




@endsection
