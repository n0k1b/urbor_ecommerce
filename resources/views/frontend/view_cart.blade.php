@extends('frontend.layout.app2')
@section('main_content')
<main class="no-main">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="ps-breadcrumb__list">
                <li class="active"><a href="index.html">Home</a></li>

                <li><a href="javascript:void(0);">Shopping Cart</a></li>
            </ul>
        </div>
    </div>
    <section class="section--shopping-cart">
        <div class="container shopping-container">
            <h3 class="page__title" style="padding:14px">Shopping Cart</h3>
            <div class="shopping-cart__content">
                <div class="row m-0">
                    <div class="col-12 col-lg-8">
                        <div class="shopping-cart__products">
                            <div class="shopping-cart__table">
                                <div class="shopping-cart-light">
                                    <div class="shopping-cart-row">
                                        <div class="cart-product">Product</div>
                                        <div class="cart-price">Price</div>
                                        <div class="cart-quantity">Quantity</div>
                                        <div class="cart-total">Total</div>
                                        <div class="cart-action"> </div>
                                    </div>
                                </div>
                                <div class="shopping-cart-body" id="cart_all">




                                </div>
                            </div>
                            <div class="shopping-cart__step"><a class="button left" href="shop-view-grid.html"><i class="icon-arrow-left"></i>Continue Shopping</a></div>

                        </div>
                    </div>
                    <div class="col-12 col-lg-4" id="cart_total">

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@section('page_js')
<script src="{{asset('assets')}}/frontend/js/cart_all.js?{{ time() }}"></script>
@endsection
