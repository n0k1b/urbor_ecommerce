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
                                <div class="shopping-cart-body show-cart-all" >




                                </div>
                            </div>
                            <div class="shopping-cart__step"><a class="button left" href="{{url('/')}}"><i class="icon-arrow-left"></i>Continue Shopping</a></div>

                        </div>
                    </div>
                    <div class="col-12 col-lg-4" id="cart_total">
                        <div class="shopping-cart__right">
                            <div class="shopping-cart__total">
                                <p class="shopping-cart__subtotal"><span>Subtotal</span><span class="price total-cart"></span></p>
                                <p class="shopping-cart__shipping"><span>Delivery Charge</span><span class="price delivery_charge" style="float: right;font-weight:bold">{{ $delivery_charge }}</span></p>



                                <p class="shopping-cart__subtotal"><span><b>TOTAL</b></span><span class="price-total"></span></p>

                            </div>
                            <div class="col-12 col-lg-12">
                                <div class="shopping-cart__block" style="padding: 0px">
                                    <h3 class="block__title" style="font-size:14px; padding-bottom:5px">Do you have a promo code?</h3>
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="Coupon code">
                                        <div class="input-group-append">
                                            <button class="btn">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="btn shopping-cart__checkout" href="javascript:" onclick="checkout()">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@section('page_js')
{{-- <script src="{{asset('assets')}}/frontend/js/cart_all.js?{{ time() }}"></script> --}}
@endsection
