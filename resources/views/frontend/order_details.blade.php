@extends('frontend.layout.app2')
@section('page_css')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" re="stylesheet">

<style>
.col-8,.col-4,.col-12{
    padding-right:0px !important;
}
.card {
    z-index: 0;
    background-color: #ECEFF1;
    padding-bottom: 20px;
    margin-top: 90px;
    margin-bottom: 40px;
    border-radius: 10px
}

.top {
    padding-top: 40px;
    padding-left: 13% !important;
    padding-right: 13% !important
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: #455A64;
    padding-left: 0px;
    margin-top: 30px
}

#progressbar li {
    list-style-type: none;
    font-size: 13px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar .step0:before {
    font-family: FontAwesome;
    content: "\f10c";
    color: #fff
}

#progressbar li:before {
    width: 40px;
    height: 40px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    background: #C5CAE9;
    border-radius: 50%;
    margin: auto;
    padding: 0px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 12px;
    background: #C5CAE9;
    position: absolute;
    left: 0;
    top: 16px;
    z-index: -1
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    position: absolute;
    left: -50%
}

#progressbar li:nth-child(2):after,
#progressbar li:nth-child(3):after {
    left: -50%
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
    position: absolute;
    left: 50%
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #651FFF
}

#progressbar li.active:before {
    font-family: FontAwesome;
    content: "\f00c"
}

.icon {
    width: 36px;
    height: 32px;
    margin-right: 10px
}

.icon-content {
    padding-bottom: 20px
}

@media screen and (max-width: 992px) {
    .icon-content {
        width: 50%;
        font-size: 12px
    }

}
}
</style>
@endsection
@section('main_content')
<main class="no-main">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="ps-breadcrumb__list">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="javascript:void(0);">Order Tracking</a></li>
            </ul>
        </div>
    </div>
    <section class="section--checkout">
        <div class="container">
            <h2 class="page__title">Order Tracking</h2>
            <div class="checkout__content">
                <div class="row">

                    <div class="col-8 col-md-8 col-sm-12">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <h3 class="checkout__title">Order Status</h3>

                        <div class="container mx-auto">
                        <div class="card" style="margin-top:0px">
                            <div class="row d-flex justify-content-between px-3 top">

                                <div class="d-flex flex-column text-sm-left">
                                    <h5 class="order_list_details">Order No: <span class="text-primary font-weight-bold">#{{ $order_no }}</span></h5>
                                    <h5  class="order_list_details">Order Date: <span class="text-primary font-weight-bold">{{ $order_date }}</span></h5>
                                    <h5 class="order_list_details">Delivery Address: <span class="text-primary font-weight-bold">{{ $delivery_address }}</span></h5>

                                </div>
                            </div> <!-- Add class 'active' to progress -->
                            <div class="row d-flex justify-content-center">
                                <div class="col-12">
                                    @if($status!='canceled')
                                    <ul id="progressbar" class="text-center">
                                        @if($status == 'pending')
                                        <li class="active step0"></li>
                                        <li class="active step1 "></li>
                                        <li class="step0"></li>
                                        <li class="step0"></li>
                                        @elseif($status == 'confirmed')
                                        <li class="active step0"></li>
                                        <li class="active step0 "></li>
                                        <li class="active step1"></li>
                                        <li class="step0"></li>

                                        @elseif($status == 'picked')
                                        <li class="active step0"></li>
                                        <li class="active step0 "></li>
                                        <li class="active step0"></li>
                                        <li class="active step1"></li>


                                        @elseif($status == 'delivered')
                                        <li class="active step0"></li>
                                        <li class="active step0 "></li>
                                        <li class="active step0"></li>
                                        <li class="active step0"></li>
                                        @endif

                                    </ul>

                                    @else
                                    <div class="text-center">
                                        <h4 style="color:#E31C19">Ordered Canceled</h4>
                                        <img src="{{ asset('image') }}/cross.png?{{ time() }}" width="9%">
                                    </div>
                                    @endif

                                </div>
                            </div>
                            @if($status !='canceled')
                            <div class="row justify-content-between top" style="padding-top:5px;margin-left:-8px ">
                                <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
                                    <div class="d-flex flex-column">
                                        <p class="font-weight-bold">Pending</p>
                                    </div>
                                </div>
                                <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
                                    <div class="d-flex flex-column">
                                        <p class="font-weight-bold">Confirmed</p>
                                    </div>
                                </div>
                                <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                                    <div class="d-flex flex-column">
                                        <p class="font-weight-bold">Picked</p>
                                    </div>
                                </div>
                                <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/HdsziHP.png">
                                    <div class="d-flex flex-column">
                                        <p class="font-weight-bold">Delivered</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>


                    </div>


                        </div>
                        @if($status=="pending")
                        <div class="text-center">
                            <h5>Would you like to cancel the order?</h5>
                            <button type="button" class="btn btn-danger btn-lg" onclick="cancel_order('{{ $order_no }}')">Cacnel</button>
                        </div>
                        @endif
                    </div>

                    <div class="col-4 col-md-4 col-sm-12">

                    <div class="col-12 col-sm-12 col-lg-12">
                        <h3 class="checkout__title">Your Order</h3>
                        <div class="checkout__products">
                            <div class="row">
                                <div class="col-8">
                                    <div class="checkout__label">PRODUCT</div>
                                </div>
                                <div class="col-4 text-right">
                                    <div class="checkout__label">TOTAL</div>
                                </div>
                            </div>
                            <div class="checkout__list">
                                @foreach($order_detail as $data)

                                <div class="checkout__product__item">
                                    <div class="checkout-product">

                                        @if($data->product_type =='regular')
                                        <div class="product__name">{{$data->product->name  }}<span>(x{{ $data->count }})</span></div>
                                        @else
                                        <div class="product__name">{{$data->package->package_name  }}<span>(x{{ $data->count }})</span></div>
                                        @endif
                                        <div class="product__unit">{{ $data->unit_quantity }}</div>
                                    </div>
                                    <div class="checkout-price">{{ $data->price*$data->count }}</div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="checkout__label">Subtotal</div>
                                </div>
                                <div class="col-4 text-right">
                                    <div class="checkout__label">{{ $sub_total }}</div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-8">
                                    <div class="checkout__label">Delivery Charge</div>
                                </div>
                                <div class="col-4 text-right">
                                    <div class="checkout__label">{{ $delivery_charge }}</div>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-8">
                                    <div class="checkout__total">Total</div>
                                </div>
                                <div class="col-4 text-right">
                                    <div class="checkout__money">{{ $total }}</div>
                                </div>
                            </div>
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
@endsection
