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
        <div id="app">

        </div>
    </section>


</main>
@endsection

@section('page_js')
    <script src="{{asset('public/js/app.js') }}"></script>
@endsection
