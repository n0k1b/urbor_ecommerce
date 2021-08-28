@extends('frontend.layout.app2')

@section('page_css')
    <style>
        .section--flashSale .flashSale__product .col-lg-2dot4 {
         height: 333px !important;
        }
        .section--flashSale .flashSale__product .ps-product--standard:hover {
height: 333px !important;
}

.section--flashSale .flashSale__product .ps-product--standard {

    border-right: 3px solid #eeeeee !important;

}
.ps-product__off{
    font-weight: bold;
    color:red;
}

.ps-product__sale{
    font-weight: bold;
}
.ps-product__addcart{
    color: white;
    background-color: #3fc979;
    border: none;
    border-radius: 3px;
    width: 100%;
    font-size: 18px;
    padding: 5px;
    margin-bottom: 10px;
}
.ps-product__addcart i {
    color: white;
    margin-right: 5px;
}

    </style>
@endsection
@section('main_content')
<main class="no-main">
    <section class="section--flashSale">
        <div class="flashSale__header">
            <div class="container">
                <div class="row" style="margin-bottom:10px">
                    <div class="col-md-3">
                        <h3 class="flashSale__title">{{ $package_info->package_name }} (10 Item)</h3>
                    </div>

                    <div class="col-md-3">
                        <h3 class="flashSale__title"><span class="ps-product-price-block"> Tk <span class="ps-product__sale">{{ $package_info->discount_price }} </span><span class="ps-product__price" style=" font-size:20px;
                            text-decoration: line-through;">TK {{$package_info->total_price }}</span>
                            <span class="ps-product__off">{{ $package_info->discount_percentage }}% Off</span></span></h3>
                    </div>

                    <div class="col-md-2">
                        <h3 class="flashSale__title">
                        <div class="def-number-input number-input safari_only">
                            <button class="minus dec_package" ><i class="icon-minus"></i></button>
                            <input class="quantity_package" min="0" name="quantity" value="1" type="number" id="quantity_package-{{ $package_info->id }}" readonly="readonly">
                            <input type="hidden" id="input_quantity_package">
                            <input type="hidden" name="hidden_product_id_package" value="{{ $package_info->id }}">
                            <button class="plus inc_package"><i class="icon-plus"></i></button>
                        </div>
                    </h3>
                    </div>

                    <div class="col-md-3">
                        <h3 class="flashSale__title">
                            <button class="add-to-cart  ps-product__addcart"  data-type='package'
                            data-unit= '1 Package'
                             data-id = '{{ $package_info->id }}' data-image='{{ $package_info->package_image }}'
                             data-name="{{ $package_info->package_name }}" data-price="{{$package_info->discount_price}}" ><i class="icon-cart"></i>Add to cart</button>
                        </h3>
                    </div>

                </div>

            </div>
        </div>

        <div class="container">
            <div class="flashSale__product" style="padding-bottom:10px ">
                <div class="row m-0">
                    @foreach($package_product as $package)
                    <div class="col-6 col-md-4 col-lg-2dot4 p-0" style="margin-bottom:3px">
                        <div class="ps-product--standard"><a  href="javascript:void(0);" ><img class="ps-product__thumbnail" height="150px"   src="{{asset($package->product->thumbnail_image)}}" alt="alt" /></a><a class="ps-product__expand" href="javascript:void(0);" ><i class="icon-expand"></i></a>
                            <div class="ps-product__content">

                                <h5><a class="ps-product__name" href="javascript:void(0);"  >{{$package->product->name}}</a></h5>



                                <p class="ps-product__unit text-center" style="font-size: 17px">{{$package->product->unit->unit_quantity}} {{$package->product->unit->unit_type}}
                                <span class="ps-product-price-block"><span class="ps-product__sale">x {{$package->unit_quantity}}</span></p>




                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>


    </section>
</main>

@endsection
