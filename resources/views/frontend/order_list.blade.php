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
                                        <button type="submit" class="btn wishlist__btn add-cart">Details</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
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
                                        <button type="submit" class="btn wishlist__btn add-cart">Details</button>
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
                                            <button type="submit" class="btn wishlist__btn add-cart">Details</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach


                        </tbody>
                    </table>
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
                                        <button type="submit" class="btn wishlist__btn add-cart">Details</button>
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
                                            <button type="submit" class="btn wishlist__btn add-cart">Details</button>
                                            </form>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
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
                                        <button type="submit" class="btn wishlist__btn add-cart">Details</button>
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
                                            <button type="submit" class="btn wishlist__btn add-cart">Details</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach


                        </tbody>
                    </table>
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
                                        <button type="submit" class="btn wishlist__btn add-cart">Details</button>
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
