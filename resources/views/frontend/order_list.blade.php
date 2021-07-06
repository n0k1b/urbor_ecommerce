@extends('frontend.layout.app2')
@section('page_css')
<link rel="stylesheet" href="{{asset('assets')}}/frontend/css/tab.css?{{ time() }}">


@endsection
@section('main_content')
<main class="no-main">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="ps-breadcrumb__list">
                <li class="active"><a href="index.html">Home</a></li>
                <li class="active"><a href="shop.html">Shop</a></li>
                <li><a href="javascript:void(0);">Wishlist</a></li>
            </ul>
        </div>
    </div>
    <section class="section--wishlist">
        <div class="container">
            <h2 class="page__title">Order List</h2>
            <div class="wishlist__content">
                <ul class="tab-group">
                    <li class="tab active tab_li"><a href="#all">All</a></li>
                    <li class="tab tab_li"><a href="#pending">Pending</a></li>
                    <li class="tab tab_li"><a href="#picked">Picked</a></li>
                    <li class="tab tab_li"><a href="#delivered">Delivered</a></li>
                </ul>

                <div class="tab-content">

                    <div id="all">
                        <div class="wishlist__product">

                        <div class="wishlist__product--mobile">
                        <div class="row m-0">
                            <div class="col-6 col-md-4 p-0">
                                <div class="ps-product--standard"><a class="ps-product__trash" href="javascript:void(0);"><i class="icon-trash2"></i></a><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_18a.jpg" alt="alt" /></a>
                                    <div class="ps-product__content">
                                        <p class="ps-product__instock">In stock</p><a href="product-default.html">
                                            <h5 class="ps-product__name">Extreme Budweiser Light Can</h5>
                                        </a>
                                        <p class="ps-product__unit">500g</p>
                                        <p class="ps-product__meta"><span class="ps-product__price">$3.90</span></p>
                                    </div>
                                    <div class="ps-product__footer">
                                        <button class="ps-product__addcart">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 p-0">
                                <div class="ps-product--standard"><a class="ps-product__trash" href="javascript:void(0);"><i class="icon-trash2"></i></a><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_31a.jpg" alt="alt" /></a>
                                    <div class="ps-product__content">
                                        <p class="ps-product__instock">In stock</p><a href="product-default.html">
                                            <h5 class="ps-product__name">Honest Organic Still Lemonade</h5>
                                        </a>
                                        <p class="ps-product__unit">100g</p>
                                        <p class="ps-product__meta"><span class="ps-product__price-sale">$5.99</span><span class="ps-product__is-sale">$8.99</span></p>
                                    </div>
                                    <div class="ps-product__footer">
                                        <button class="ps-product__addcart">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 p-0">
                                <div class="ps-product--standard"><a class="ps-product__trash" href="javascript:void(0);"><i class="icon-trash2"></i></a><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_16a.jpg" alt="alt" /></a>
                                    <div class="ps-product__content">
                                        <p class="ps-product__instock">In stock</p><a href="product-default.html">
                                            <h5 class="ps-product__name">Matures Own 100% Wheat</h5>
                                        </a>
                                        <p class="ps-product__unit">1.5L</p>
                                        <p class="ps-product__meta"><span class="ps-product__price">$12.90</span></p>
                                    </div>
                                    <div class="ps-product__footer">
                                        <button class="ps-product__addcart">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 p-0">
                                <div class="ps-product--standard"><a class="ps-product__trash" href="javascript:void(0);"><i class="icon-trash2"></i></a><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_1a.jpg" alt="alt" /></a>
                                    <div class="ps-product__content">
                                        <p class="ps-product__ofstock">Out of stock</p><a href="product-default.html">
                                            <h5 class="ps-product__name">Corn, Yellow Sweet</h5>
                                        </a>
                                        <p class="ps-product__unit">500g</p>
                                        <p class="ps-product__meta"><span class="ps-product__price">$3.90</span></p>
                                    </div>
                                    <div class="ps-product__footer">
                                        <button class="wishlist__readmore">Read more</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="wishlist__product--desktop">
                        <table class="table">
                            <thead class="wishlist__thead">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Order No</th>
                                    <th scope="col">Total Price</th>
                                     <th scope="col">Order Status</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="wishlist__tbody">
                                @foreach($all_order as $data)
                                <tr>
                                    <td>1</td>
                                    <td><span class="ps-product__price">{{ $data->order_date }}</span></td>

                                    <td><span class="ps-product__price">{{ $data->order_no }}</span></td>

                                    <td><span class="ps-product__price">{{ $data->total_price }}</span></td>
                                    <td><span class="ps-product__instock">{{ ucfirst(ucfirst(ucfirst(ucfirst(ucfirst(ucfirst($data->status)))))) }}</span>
                                    </td>
                                    <td>
                                         <form action="{{ route('view_order_details') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="order_no" value="{{ $data->order_no }}">
                                        <button type="submit" class="btn wishlist__btn add-cart">Order Details</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="pending">
                <div class="wishlist__product">

                <div class="wishlist__product--mobile">
                <div class="row m-0">
                    <div class="col-6 col-md-4 p-0">
                        <div class="ps-product--standard"><a class="ps-product__trash" href="javascript:void(0);"><i class="icon-trash2"></i></a><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_18a.jpg" alt="alt" /></a>
                            <div class="ps-product__content">
                                <p class="ps-product__instock">In stock</p><a href="product-default.html">
                                    <h5 class="ps-product__name">Extreme Budweiser Light Can</h5>
                                </a>
                                <p class="ps-product__unit">500g</p>
                                <p class="ps-product__meta"><span class="ps-product__price">$3.90</span></p>
                            </div>
                            <div class="ps-product__footer">
                                <button class="ps-product__addcart">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 p-0">
                        <div class="ps-product--standard"><a class="ps-product__trash" href="javascript:void(0);"><i class="icon-trash2"></i></a><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_31a.jpg" alt="alt" /></a>
                            <div class="ps-product__content">
                                <p class="ps-product__instock">In stock</p><a href="product-default.html">
                                    <h5 class="ps-product__name">Honest Organic Still Lemonade</h5>
                                </a>
                                <p class="ps-product__unit">100g</p>
                                <p class="ps-product__meta"><span class="ps-product__price-sale">$5.99</span><span class="ps-product__is-sale">$8.99</span></p>
                            </div>
                            <div class="ps-product__footer">
                                <button class="ps-product__addcart">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 p-0">
                        <div class="ps-product--standard"><a class="ps-product__trash" href="javascript:void(0);"><i class="icon-trash2"></i></a><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_16a.jpg" alt="alt" /></a>
                            <div class="ps-product__content">
                                <p class="ps-product__instock">In stock</p><a href="product-default.html">
                                    <h5 class="ps-product__name">Matures Own 100% Wheat</h5>
                                </a>
                                <p class="ps-product__unit">1.5L</p>
                                <p class="ps-product__meta"><span class="ps-product__price">$12.90</span></p>
                            </div>
                            <div class="ps-product__footer">
                                <button class="ps-product__addcart">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 p-0">
                        <div class="ps-product--standard"><a class="ps-product__trash" href="javascript:void(0);"><i class="icon-trash2"></i></a><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_1a.jpg" alt="alt" /></a>
                            <div class="ps-product__content">
                                <p class="ps-product__ofstock">Out of stock</p><a href="product-default.html">
                                    <h5 class="ps-product__name">Corn, Yellow Sweet</h5>
                                </a>
                                <p class="ps-product__unit">500g</p>
                                <p class="ps-product__meta"><span class="ps-product__price">$3.90</span></p>
                            </div>
                            <div class="ps-product__footer">
                                <button class="wishlist__readmore">Read more</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>



             <div class="wishlist__product--desktop">
                <table class="table">
                    <thead class="wishlist__thead">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Order No</th>
                            <th scope="col">Total Price</th>
                             <th scope="col">Order Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="wishlist__tbody">
                        @foreach($pending as $data)
                                <tr>
                                    <td>1</td>
                                    <td><span class="ps-product__price">{{ $data->order_date }}</span></td>

                                    <td><span class="ps-product__price">{{ $data->order_no }}</span></td>

                                    <td><span class="ps-product__price">{{ $data->total_price }}</span></td>
                                    <td><span class="ps-product__instock">{{ ucfirst(ucfirst(ucfirst(ucfirst(ucfirst(ucfirst($data->status)))))) }}</span>
                                    </td>
                                    <td>
                                         <form action="{{ route('view_order_details') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="order_no" value="{{ $data->order_no }}">
                                        <button type="submit" class="btn wishlist__btn add-cart">Order Details</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach


                    </tbody>
                </table>
                </div>
             </div>
          </div>
            <div id="picked">
                <div class="wishlist__product">

                <div class="wishlist__product--mobile">
                <div class="row m-0">
                    <div class="col-6 col-md-4 p-0">
                        <div class="ps-product--standard"><a class="ps-product__trash" href="javascript:void(0);"><i class="icon-trash2"></i></a><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_18a.jpg" alt="alt" /></a>
                            <div class="ps-product__content">
                                <p class="ps-product__instock">In stock</p><a href="product-default.html">
                                    <h5 class="ps-product__name">Extreme Budweiser Light Can</h5>
                                </a>
                                <p class="ps-product__unit">500g</p>
                                <p class="ps-product__meta"><span class="ps-product__price">$3.90</span></p>
                            </div>
                            <div class="ps-product__footer">
                                <button class="ps-product__addcart">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 p-0">
                        <div class="ps-product--standard"><a class="ps-product__trash" href="javascript:void(0);"><i class="icon-trash2"></i></a><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_31a.jpg" alt="alt" /></a>
                            <div class="ps-product__content">
                                <p class="ps-product__instock">In stock</p><a href="product-default.html">
                                    <h5 class="ps-product__name">Honest Organic Still Lemonade</h5>
                                </a>
                                <p class="ps-product__unit">100g</p>
                                <p class="ps-product__meta"><span class="ps-product__price-sale">$5.99</span><span class="ps-product__is-sale">$8.99</span></p>
                            </div>
                            <div class="ps-product__footer">
                                <button class="ps-product__addcart">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 p-0">
                        <div class="ps-product--standard"><a class="ps-product__trash" href="javascript:void(0);"><i class="icon-trash2"></i></a><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_16a.jpg" alt="alt" /></a>
                            <div class="ps-product__content">
                                <p class="ps-product__instock">In stock</p><a href="product-default.html">
                                    <h5 class="ps-product__name">Matures Own 100% Wheat</h5>
                                </a>
                                <p class="ps-product__unit">1.5L</p>
                                <p class="ps-product__meta"><span class="ps-product__price">$12.90</span></p>
                            </div>
                            <div class="ps-product__footer">
                                <button class="ps-product__addcart">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 p-0">
                        <div class="ps-product--standard"><a class="ps-product__trash" href="javascript:void(0);"><i class="icon-trash2"></i></a><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_1a.jpg" alt="alt" /></a>
                            <div class="ps-product__content">
                                <p class="ps-product__ofstock">Out of stock</p><a href="product-default.html">
                                    <h5 class="ps-product__name">Corn, Yellow Sweet</h5>
                                </a>
                                <p class="ps-product__unit">500g</p>
                                <p class="ps-product__meta"><span class="ps-product__price">$3.90</span></p>
                            </div>
                            <div class="ps-product__footer">
                                <button class="wishlist__readmore">Read more</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>



             <div class="wishlist__product--desktop">
                <table class="table">
                    <thead class="wishlist__thead">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Order No</th>
                            <th scope="col">Total Price</th>
                             <th scope="col">Order Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="wishlist__tbody">
                        @foreach($picked as $data)
                        <tr>
                            <td>1</td>
                            <td><span class="ps-product__price">{{ $data->order_date }}</span></td>

                            <td><span class="ps-product__price">{{ $data->order_no }}</span></td>

                            <td><span class="ps-product__price">{{ $data->total_price }}</span></td>
                            <td><span class="ps-product__instock">{{ ucfirst(ucfirst(ucfirst(ucfirst(ucfirst(ucfirst($data->status)))))) }}</span>
                            </td>
                            <td>

                                 <form action="{{ route('view_order_details') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="order_no" value="{{ $data->order_no }}">
                                        <button type="submit" class="btn wishlist__btn add-cart">Order Details</button>
                                        </form>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
                </div>
             </div>
          </div>

            <div id="delivered">
                <div class="wishlist__product">

                <div class="wishlist__product--mobile">
                <div class="row m-0">
                    <div class="col-6 col-md-4 p-0">
                        <div class="ps-product--standard"><a class="ps-product__trash" href="javascript:void(0);"><i class="icon-trash2"></i></a><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_18a.jpg" alt="alt" /></a>
                            <div class="ps-product__content">
                                <p class="ps-product__instock">In stock</p><a href="product-default.html">
                                    <h5 class="ps-product__name">Extreme Budweiser Light Can</h5>
                                </a>
                                <p class="ps-product__unit">500g</p>
                                <p class="ps-product__meta"><span class="ps-product__price">$3.90</span></p>
                            </div>
                            <div class="ps-product__footer">
                                <button class="ps-product__addcart">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 p-0">
                        <div class="ps-product--standard"><a class="ps-product__trash" href="javascript:void(0);"><i class="icon-trash2"></i></a><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_31a.jpg" alt="alt" /></a>
                            <div class="ps-product__content">
                                <p class="ps-product__instock">In stock</p><a href="product-default.html">
                                    <h5 class="ps-product__name">Honest Organic Still Lemonade</h5>
                                </a>
                                <p class="ps-product__unit">100g</p>
                                <p class="ps-product__meta"><span class="ps-product__price-sale">$5.99</span><span class="ps-product__is-sale">$8.99</span></p>
                            </div>
                            <div class="ps-product__footer">
                                <button class="ps-product__addcart">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 p-0">
                        <div class="ps-product--standard"><a class="ps-product__trash" href="javascript:void(0);"><i class="icon-trash2"></i></a><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_16a.jpg" alt="alt" /></a>
                            <div class="ps-product__content">
                                <p class="ps-product__instock">In stock</p><a href="product-default.html">
                                    <h5 class="ps-product__name">Matures Own 100% Wheat</h5>
                                </a>
                                <p class="ps-product__unit">1.5L</p>
                                <p class="ps-product__meta"><span class="ps-product__price">$12.90</span></p>
                            </div>
                            <div class="ps-product__footer">
                                <button class="ps-product__addcart">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 p-0">
                        <div class="ps-product--standard"><a class="ps-product__trash" href="javascript:void(0);"><i class="icon-trash2"></i></a><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_1a.jpg" alt="alt" /></a>
                            <div class="ps-product__content">
                                <p class="ps-product__ofstock">Out of stock</p><a href="product-default.html">
                                    <h5 class="ps-product__name">Corn, Yellow Sweet</h5>
                                </a>
                                <p class="ps-product__unit">500g</p>
                                <p class="ps-product__meta"><span class="ps-product__price">$3.90</span></p>
                            </div>
                            <div class="ps-product__footer">
                                <button class="wishlist__readmore">Read more</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>



             <div class="wishlist__product--desktop">
                <table class="table">
                    <thead class="wishlist__thead">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Order No</th>
                            <th scope="col">Total Price</th>
                             <th scope="col">Order Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="wishlist__tbody">
                        @foreach($delivered as $data)
                                <tr>
                                    <td>1</td>
                                    <td><span class="ps-product__price">{{ $data->order_date }}</span></td>

                                    <td><span class="ps-product__price">{{ $data->order_no }}</span></td>

                                    <td><span class="ps-product__price">{{ $data->total_price }}</span></td>
                                    <td><span class="ps-product__instock">{{ ucfirst(ucfirst(ucfirst(ucfirst(ucfirst(ucfirst($data->status)))))) }}</span>
                                    </td>
                                    <td>
                                        <form action="{{ route('view_order_details') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="order_no" value="{{ $data->order_no }}">
                                        <button type="submit" class="btn wishlist__btn add-cart">Order Details</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach


                    </tbody>
                </table>
                </div>
             </div>
          </div>
        </div>

            </div>
        </div>
    </section>
</main>



@endsection
@section('page_js')
<script src="{{asset('assets')}}/frontend/js/tab.js?{{ time() }}"></script>
@endsection
