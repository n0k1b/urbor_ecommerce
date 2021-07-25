@extends('frontend.layout.app2')
@section('page_css')

<style>
    .ui-icon-circle-triangle-e
    {
        font-size: 50px !important
    }
    .ui-menu .ui-menu-item a:hover{
        color:black;
    }
    .ui-menu-item{
        background:#026D6D !important;
        color:white;
    }
    .ui-datepicker-month
    {
        color:white !important;
        font-size: bold;
    }
    .ui-datepicker-year
    {
        color:white !important;
        font-size: bold;
    }
.ui-widget-header{
    background: #026D6D !important;
}
    .radio-label{
        margin-left: 21px;
        margin-top:11px !important;
    }
    .form-check{
        padding-bottom:0px;
        padding-left: 0px;
    }
    .select2-search--dropdown .select2-search__field {
    padding: 17px;
}
</style>
@endsection
@section('main_content')
<div class="modal fade" id="add_address" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg ps-quickview">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid quickview-body">
                    <div class="row">

                        <div class="col-12 col-lg-12">
                            <div class="quickview__product">
                                <div class="product__header">
                                    <div class="product__title">Address</div>

                                </div>
                                <div class="product__content">


                                        <div class="form-row">
                                            <div class="col-12 col-lg-6 form-group--block">
                                                <label>Address Type: <span>*</span></label>
                                                <input class="form-control" type="text" id="address_type" placeholder="Home/Office" required >
                                            </div>
                                            <div class="col-12 col-lg-6 form-group--block">
                                                <label>Area: <span>*</span></label>
                                                <select class="single-select2" id="area_id">
                                                    @foreach ( $areas as $data )
                                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                    @endforeach


                                                </select>
                                            </div>
                                            <div class="col-12 form-group--block">
                                                <label>Full Address</label>
                                                <input class="form-control" type="text" id="address">
                                            </div>
                                            <div class="col-12 form-group--block">
                                                <label>Phone: <span>*</span></label>
                                                <input class="form-control" type="text" id="contact_no" required>
                                            </div>


                                        </div>

                                        <button type="button" class="btn btn-primary" onclick="add_address()" style="float: right; padding:10px; margin-top:10px;font-size:1.5rem">Add Address</button>






                                </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit_address" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg ps-quickview">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid quickview-body">
                    <div class="row">

                        <div class="col-12 col-lg-12">
                            <div class="quickview__product">
                                <div class="product__header">
                                    <div class="product__title">Addresas</div>

                                </div>
                                <div class="product__content">


                                        <div class="form-row">
                                            <div class="col-12 col-lg-6 form-group--block">
                                                <label>Address Type: <span>*</span></label>
                                                <input class="form-control" type="text" id="edit_address_type" placeholder="Home/Office" required >
                                            </div>
                                            <div class="col-12 col-lg-6 form-group--block">
                                                <label>Area: <span>*</span></label>
                                                <select class="single-select2" id="edit_area_id">
                                                    @foreach ( $areas as $data )
                                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                    @endforeach


                                                </select>
                                            </div>
                                            <div class="col-12 form-group--block">
                                                <label>Full Address</label>
                                                <input class="form-control" type="text" id="edit_address_name">
                                            </div>
                                            <div class="col-12 form-group--block">
                                                <label>Phone: <span>*</span></label>
                                                <input class="form-control" type="text" id="edit_contact_no" required>
                                                <input type="hidden" id="hidden_id">
                                            </div>


                                        </div>

                                        <button type="button" class="btn btn-primary" onclick="edit_address()" style="float: right; padding:10px; margin-top:10px;font-size:1.5rem">Update Address</button>






                                </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<main class="no-main">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="ps-breadcrumb__list">
                <li class="active"><a href="{{ url('/') }}">Home</a></li>

                <li><a href="javascript:void(0);">Checkout</a></li>
            </ul>
        </div>
    </div>
    <section class="section--checkout">


        <div class="container">
            @if (count($errors)>0)
    <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-10 alert alert-danger mt-4" style="background: #dd0505;
    border-color: #dd0505;font-weight:bold">
        <ul>
            @foreach($errors->all() as $error)
                <li style="display: list-item;list-style-type:disc;font-size: 15px;color:white;font-weight:bold">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            {{-- @if(Session::has('error'))
            <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-10 alert alert-danger mt-4" style="font-size: 14px;color:white;background: #dd0505;
            border-color: #dd0505;font-weight:bold">
                {{Session::get('error')}}
            </div>
            @endif --}}
            <h2 class="page__title">Checkout</h2>
            <div class="checkout__content">

                <div class="row">
                    <div class="col col-6 col-md-6 col-sm-12">
                        <h3 class="checkout__title">Delivery Address<span style="float: right;"><button type="button"  onclick="show_address_modal()" class="btn btn-lg btn-primary">Add New</button></span> </h3>
                        <div class="col-12 col-lg-12" style="background-color:#F7F9F9;padding:17px">

                            <div class="checkout__form">

                                    <p>Select an Address</p>
                                    <div class="form-row">

                                        {{-- <div class="col-12 form-group--block">
                                            <label>Name</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="col-12 form-group--block">
                                            <label>Phone</label>
                                            <input class="form-control" type="text" required>
                                        </div> --}}



                                        <div class="col-12 form-group--block">
                                            <form action="{{ route('place_order') }}" method="POST">
                                                @csrf
                                         <div id="address_list">


                                        </div>

                                        </div>

                                    </div>

                            </div>
                        </div>
                        <h3 class="checkout__title">Pick a delivery date & time </h3>
                        <div class="col col-12 col-lg-12" style="background-color:#F7F9F9; margin-top:25px;padding-bottom:30px;padding:17px">


                            <div class="row">
                                <div class="col">
                                    <label>Select Date</label>
                                    <input type='text' placeholder="Delivery Date" name="delivery_date" class="form-control" id="datepicker" />
                                </div>
                                <div class="col">
                                    <label>Select Time</label>
                                    <input type='text' placeholder="Delivery Time" name="delivery_time" class="form-control" id='timepicker' />
                                </div>

                            </div>


                        </div>

                    </div>

                    <div class="col-6 col-md-6 col-sm-12">
                        <div class="col-12">
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
                                    @foreach($cart as $id =>$details)

                                    <div class="checkout__product__item">
                                        <div class="checkout-product">
                                            <div class="product__name">{{ $details['name'] }}<span>(x{{ $details['quantity'] }})</span></div>
                                            <div class="product__unit">{{ $details['unit'] }}</div>
                                        </div>
                                        <div class="checkout-price">{{ $details['price']*$details['quantity'] }}</div>
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
                            <div class="checkout__payment">
                                <div class="checkout__label mb-3">SELECT PAYMENT</div>
                                <div class="form-group--block">
                                    <input class="form-check-input" type="checkbox" id="checkboxBank" value="bank">
                                    <label class="label-checkbox" for="checkboxBank"><b class="text-heading">Cash on Delivery</b></label>
                                </div>


                            </div>

                            <div class="form-group--block">
                                <input class="form-check-input" type="checkbox" id="checkboxAgree" value="agree">

                            </div><button class="checkout__order" type="submit" >Place an order</button>
                        </form>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@section('page_js')
<script src="{{asset('assets')}}/frontend/js/checkout.js?{{ time() }}"></script>
<script>
    $(function() {
        $( "#datepicker" ).datepicker({
            minDate: 0,
            dateFormat: 'dd/mm/yy'
        });
        $('#timepicker').timepicker({});
        $('#timingAlert').click(function(e) {
            e.preventDefault();
            alert(`
                Date: ${$("#datepicker").val()}
                Time: ${$( "#timepicker" ).val()}
            `)
        })
    });
 </script>

@endsection
