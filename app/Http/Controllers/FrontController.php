<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\domain;
use App\Models\category;
use App\Models\sub_category;
use App\Models\product;
use App\Models\product_brand;
use App\Models\product_color;
use App\Models\product_size;
use App\Models\product_unit;
use App\Models\product_stock;
use App\Models\product_detail_image;
use App\Models\homepage_section;
use App\Models\homepage_product_list;
use App\Models\banner;
use Session;
use App\Models\user_otp;
use App\Models\user;
use App\Models\area;
use App\Models\user_address;
use App\Models\courier_man;
use App\Models\company_info;
use App\Models\order;
use App\Models\order_details;

use DB;


use Auth;

class FrontController extends Controller
{

    //

    public function view_order_details(Request $request)
    {
        $order_no = $request->order_no;
        $order = order::where('order_no',$order_no)->first();
       // $order_no = 1;
        $order_date = date("d-m-Y h:i:s", strtotime($order->created_at));
        $delivery_address = $order->address->address;
        $status = $order->status;
        $areas = area::where('status',1)->get();
        $order_detail = order_details::where('order_no',$order_no)->get();
        $sub_total = 0;
        for($j=0;$j<sizeof($order_detail);$j++)
        {
            $sub_total+=$order_detail[$j]->price*$order_detail[$j]->count;
           // array_push($order_details,['id'=>$order_detail[$j]->id,'price'=>$order_detail[$j]->price,'count'=>$order_detail[$j]->count,'unit'=>$order_detail[$j]->unit_quantity,'name'=>$order_detail[$j]->product->name,'image'=>$this->base_url.$order_detail[$j]->product->thumbnail_image,'total'=>$order_detail[$j]->price*$order_detail[$j]->count]);

        }
        $delivery_charge = 60;
        $total = $sub_total+$delivery_charge;



   // return view('frontend.checkout',compact('areas','cart','delivery_charge','total','sub_total'));
        return view('frontend.order_details',compact('order_no','order_date','delivery_address','status','areas','delivery_charge','total','sub_total','order_detail'));
    }
    public function order_list()
    {
        $user_id = auth()->user()->id;
        $all_order = order::where('user_id',$user_id)->orderBy(DB::raw('case when status= "pending" then 1 when status= "picked" then 2 when status= "delivered" then 3 end'))->orderBy('id','DESC')->get();

        $delivered = order::where('user_id',$user_id)->where('status','delivered')->orderBy('created_at','DESC')->get();
        $picked = order::where('user_id',$user_id)->where('status','picked')->orderBy('created_at','DESC')->get();
        $pending = order::where('user_id',$user_id)->where('status','pending')->orderBy('created_at','DESC')->get();

        foreach($all_order as $data)
        {
            $data->order_date = date("d-m-Y", strtotime($data->created_at));
        }

        foreach($delivered as $data)
        {
            $data->order_date = date("d-m-Y", strtotime($data->created_at));
        }

        foreach($picked as $data)
        {
            $data->order_date = date("d-m-Y", strtotime($data->created_at));
        }

        foreach($pending as $data)
        {
            $data->order_date = date("d-m-Y", strtotime($data->created_at));
        }

       // $all_order = $all_order->groupBy('status')->map->count();

        return view('frontend.order_list',compact('all_order','delivered','picked','pending'));
    }

    public function get_all_category()


    {
        $data_category = array();
        //$data2 = "hello";
        $data="";

        $category = category::where('status',1)->get();
      // return $category[1]->sub_category;

        foreach($category as $cat)
           {
              $sub_cat_avail = sub_category::where('category_id',$cat->id)->first();
              if($sub_cat_avail)
              {
            $data.='
            <li class="has-mega-menu category-item"><a href="javascript:void(0);">'.$cat->name.'</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
            <div class="mega-menu">
                <div class="mega-anchor"></div>
                <div class="mega-menu__column">

                    <ul class="sub-menu--mega">
                            ';

            $data_sub_category = array();
               foreach($cat->sub_category as $sub_category)
               {
                $data.='<li> <a href="view_all/sub_category-'.$sub_category->id.'">'.$sub_category->name.'</a></li>';
                   //array_push($data_sub_category,['id'=>$sub_category->id,'name'=>$sub_category->name,'image'=>$this->base_url.$sub_category->image]);
               }
               $data.='

               </ul>
           </div>

       </div>
   </li>';
            }
            else
            {
                $data.='
                <li class="has-mega-menu category-item"><a href="view_all/category_prodcut-'.$cat->id.'">'.$cat->name.'</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>

             </li>';
            }
              // array_push($data_category,['id'=>$cat->id,'name'=>$cat->name,'image'=>$this->base_url.$cat->image,'sub_category'=>$data_sub_category]);
           }


          // return response($response, 200);
           $data2 = "";
      echo $data;

    }
    public function index()
    {
        $banners = banner::where('status',1)->orderBy('order')->get();
        $categories = category::get();
        $homepage_section_content = homepage_section::where('status',1)->orderBy('section_order')->get();
        $company_info = company_info::first();


        return view ('frontend.index',compact('banners','categories','homepage_section_content','company_info'));
    }


    public function get_cart_count()
    {
        if(session()->has('cart'))
        {
        $total_product = count(session()->get('cart'));
        }
        else
        {
            $total_product = 0;
        }
        echo $total_product;
    }



    public function cart_add(Request $request)
    {
        $id = $request->id;
        $quantity = $request->quantity;
        $product = product::find($id);
        $discount_avail = homepage_product_list::where('product_list',$id)->where('status',1)->first();
        if($discount_avail)
        {
            $product->price = $product->price- floor(($product->price*$discount_avail->discount_percentage)/100);
           // $discount_price =$product->product->price- floor(($product->product->price*$product->discount_percentage)/100);
        }

        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "product_id"=>$product->id,
                        "name" => $product->name,
                        "quantity" => $quantity,
                        "price" => $product->price,
                        "photo" => $product->thumbnail_image,
                        'unit'=>$product->unit->unit_quantity.' '.$product->unit->unit_type
                    ]
            ];
            session()->put('cart', $cart);
            //return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        else{
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $update_quantity = $cart[$id]['quantity'] +$quantity;
            $cart[$id]['quantity'] = $update_quantity;
            session()->put('cart', $cart);
           // file_put_contents('test.txt',json_encode($cart));
            //return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        else{
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "product_id"=>$product->id,
            "name" => $product->name,
            "quantity" => $quantity,
            "price" => $product->price,
            "photo" => $product->thumbnail_image,
            'unit'=>$product->unit->unit_quantity.' '.$product->unit->unit_type
        ];
        session()->put('cart', $cart);
             }
            }



       // return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function cart_delete($id)
    {

            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }


    }

    public function view_cart()
    {


        return view('frontend.view_cart');
    }
    public function search_product(Request $request)
    {
        $input_value = $request->input_value;
        $products = product::where('name','LIKE','%'.$input_value.'%')->get();
        $data='';
        if(sizeof($products)>0){
        foreach($products as $product)
        {
            $data.='<li class="cart-item">
            <div class="ps-product--mini-cart"><a href="javascript:void(0);" onclick="show_cart_modal('.$product->id.')" "><img class="ps-product__thumbnail" src="'.$product->thumbnail_image.'" alt="alt" /></a>
                <div class="ps-product__content"><a class="ps-product__name" href="javascript:void(0);" onclick="show_cart_modal('.$product->id.')">'.$product->name.'</a>
                    <p class="ps-product__meta">Tk  <span class="ps-product__price">'.$product->price.'</span>
                    </p>
                </div>
            </div>
        </li>';

        }


        echo $data;
    }
    else
    {
        $data.='<li class="cart-item">
            <div class="ps-product--mini-cart">
                <div class="ps-product__content"><a class="ps-product__name" href="">No product found</a>
                    <p class="ps-product__meta"> <span class="ps-product__price"></span>
                    </p>
                </div>
            </div>
        </li>';
        echo $data;
    }


      //  file_put_contents('test.txt',$input_value);
    }
    public function search_courier_man($area_id)
    {
       // $area_id = $request->area_id;
        $all_courier = courier_man::where('area_id',$area_id)->get();
        $avail_courier_man = 0;

        foreach($all_courier as $courier)
        {
            if(order::where('courier_man',$courier->user_id)->where('status','!=','delivered')->first())
            {
                continue;
            }
            else
            {
               $avail_courier_man = $courier->user_id;
               break;
            }

        }
        if($avail_courier_man == 0)
        {
            $all_courier = courier_man::where('area_id',$area_id)->orderBy(DB::raw('RAND()'))->take(1)->first();
            if($all_courier)
            $avail_courier_man = $all_courier->user_id;
            else
            $avail_courier_man = 0;

        }

            return $avail_courier_man;


    }

    public function place_order(Request $request)
    {
             $validator = Validator::make($request->all(), [
            'address_id' => ['required'],
         ]);
    if($validator->fails())
    {
        return redirect()->back()->with('error','Please select an address');
    }
        $address_id = $request->address_id;
        $cart = session()->get('cart');
        $total = 0;

        $user_id = auth()->user()->id;
        $order_no = 'GG'.$user_id.mt_rand(10000,99999);
        $area_id = user_address::where('id',$address_id)->first()->area_id;
        $courier_man =$this->search_courier_man($area_id);
        if($courier_man == 0)
        {
        //$response = ['status_code'=>414,];
       // return response($response, 200);
       return back()->with('error','No courier man available at this time. Please try again after sometimes');
        }


        foreach( $cart as $id => $details)
        {
           $total += $details['price'] * $details['quantity'];
           order_details::create(['order_no'=>$order_no,'product_id'=>$id,'unit_quantity'=>$details['unit'],'count'=>$details['quantity'],'price'=>$details['price']]);
        }
        $delivery_fee = 60;
        $order = order::create(['address_id'=>$address_id,'user_id'=>$user_id,'order_no'=>$order_no,'courier_man'=>$courier_man,'status'=>'pending','total_price'=>$total,'delivery_fee'=>$delivery_fee]);

        $status = $order->status;
        $order_no = $order->order_no;
        $order_date =  date("d-m-Y h:i:s", strtotime($order->created_at));
        $delivery_address = $order->address->address;

        $order_detail = order_details::where('order_no',$order_no)->get();
        $sub_total = 0;
        for($j=0;$j<sizeof($order_detail);$j++)
        {
            $sub_total+=$order_detail[$j]->price*$order_detail[$j]->count;
           // array_push($order_details,['id'=>$order_detail[$j]->id,'price'=>$order_detail[$j]->price,'count'=>$order_detail[$j]->count,'unit'=>$order_detail[$j]->unit_quantity,'name'=>$order_detail[$j]->product->name,'image'=>$this->base_url.$order_detail[$j]->product->thumbnail_image,'total'=>$order_detail[$j]->price*$order_detail[$j]->count]);

        }
        $delivery_charge = 60;
        $total = $sub_total+$delivery_charge;
        session()->forget('cart');
        return view('frontend.order_tracking',compact('status','order_no','order_date','delivery_address','delivery_charge','total','sub_total','order_detail'));
       // $order_no = $order->order_no;

       // file_put_contents('test.txt',$address_id);
    }

    public function submit_order(Request $request)
    {
        //file_put_contents('test.txt',$request);
        $address_id = $request->address_id;
        $carts  = json_decode(json_encode($request->cart));

        $user_id = auth('api')->user()->id;
        $order_no = 'GG'.$user_id.mt_rand(10000,99999);
        $area_id = user_address::where('id',$address_id)->first()->area_id;
        $courier_man =$this->search_courier_man($area_id);
        if($courier_man == 0)
        {
        $response = ['status_code'=>414,];
        return response($response, 200);
        }
        $order = order::create(['address_id'=>$address_id,'user_id'=>$user_id,'order_no'=>$order_no,'courier_man'=>$courier_man,'status'=>'pending']);


        foreach($carts as $cart)
        {
         order_details::create(['order_no'=>$order_no,'product_id'=>$cart->id,'unit_quantity'=>$cart->unit,'count'=>$cart->count,'price'=>$cart->price]);
        }

            $order_no = $order->order_no;
              $order_list = array();
            $order_detail = order_details::where('order_no',$order_no)->get();
            $order_details = array();
            $sub_total = 0;
            for($j=0;$j<sizeof($order_detail);$j++)
            {
                $sub_total+=$order_detail[$j]->price*$order_detail[$j]->count;
                array_push($order_details,['id'=>$order_detail[$j]->id,'price'=>$order_detail[$j]->price,'count'=>$order_detail[$j]->count,'unit'=>$order_detail[$j]->unit_quantity,'name'=>$order_detail[$j]->product->name,'image'=>$this->base_url.$order_detail[$j]->product->thumbnail_image,'total'=>$order_detail[$j]->price*$order_detail[$j]->count]);

            }
            $order_date =  date("d-m-Y h:i:s", strtotime($order->created_at));
            array_push($order_list,['order_no'=>$order->order_no,'order_date'=>$order_date,'status'=>$order->status,'delivery_address'=>$order->address->address,'subtotal'=>$sub_total,'product'=>$order_details]);



         $response = ['status_code'=>200,'order'=>$order_list];
        return response($response, 200);

    }


    public function get_all_cart_info()
    {
            $data = "";
            $total = 0;
            $cart = session()->get('cart');

            foreach( $cart as $id => $details)
            {
                $total += $details['price'] * $details['quantity'];
            }
            $delivery_charge = 20;
            $sub_total = $total+$delivery_charge;
            foreach($cart as $id =>$details)
            {

                $data.='   <div class="shopping-cart-row">
                <div class="cart-product">
                    <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="'.$details['photo'].'" alt="alt" /></a>
                        <div class="ps-product__content">
                            <h5><a class="ps-product__name" href="#">'.$details['name'].'</a></h5>
                            <p class="ps-product__unit">'.$details['unit'].'</p>

                            <p class="ps-product__meta">Price: <span class="ps-product__price">TK '.$details['price'].'</span></p>
                            <div class="def-number-input number-input safari_only">
                                <button class="minus" onclick=""><i class="icon-minus"></i></button>
                                <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                <button class="plus" onclick=""><i class="icon-plus"></i></button>
                            </div><span class="ps-product__total">Total: <span>TK '.$details['price']*$details['quantity'].' </span></span>
                        </div>
                        <div class="ps-product__remove"><i class="icon-trash2"></i></div>
                    </div>
                </div>
                <div class="cart-price"><span class="ps-product__price">TK '.$details['price'].'</span>
                </div>
                <div class="cart-quantity">
                    <div class="def-number-input number-input safari_only">
                        <button class="minus dec" onclick="dec('.$id.')"><i class="icon-minus"></i></button>
                        <input type="hidden" id="input_quantity">

                        <input class="quantity" min="0" name="quantity" value="'.$details['quantity'].'" type="number" id="quantity-'.$details['product_id'].'"/>
                        <button class="plus inc" onclick="inc('.$id.')"><i class="icon-plus"></i></button>
                    </div>
                </div>
                <div class="cart-total"> <span class="ps-product__total">TK '.$details['price']*$details['quantity'].'</span>
                </div>
                <div class="cart-action"> <i class="icon-trash2"></i></div>
            </div>
            ';
            }
            $data.='<script src="assets/frontend/js/cart_increment.js?'.time().'"></script>';
            $total_cart = '<div class="shopping-cart__right">
            <div class="shopping-cart__total">
                <p class="shopping-cart__subtotal"><span>Subtotal</span><span class="price">TK '.$total.'</span></p>
                <p class="shopping-cart__shipping"><span>Delivery Charge</span><span class="price" style="float: right;font-weight:bold">TK '.$delivery_charge.'</span></p>



                <p class="shopping-cart__subtotal"><span><b>TOTAL</b></span><span class="price-total">TK '.$sub_total.'</span></p>

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
            <a class="btn shopping-cart__checkout" href="checkout">Proceed to Checkout</a>
        </div>';


            echo json_encode(['cart_table'=>$data,'cart_total'=>$total_cart]);
    }

    public function cart_update(Request $request)
    {
        if($request->id && $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function get_cart_box()
    {
        $total = 0;
        $cart =session()->get('cart');


        $data =' <div class="mini-cart__products">
        <div class="out-box-cart">
            <div class="triangle-box">
                <div class="triangle"></div>
            </div>
        </div>
        <ul class="list-cart">';


       foreach( $cart as $id => $details)
       {
        $total += $details['price'] * $details['quantity'];

        $data.='
        <li class="cart-item">
        <div class="ps-product--mini-cart"><a href="product-default.html"><img style="min-width:60px" class="ps-product__thumbnail" src="'.$details['photo'].'" alt="alt" /></a>
            <div class="ps-product__content"><a class="ps-product__name" href="product-default.html">'.$details['name'].'</a>
                <p class="ps-product__unit">'.$details['unit'].'</p>

                <p class="ps-product__meta"> <span class="ps-product__price">TK '.$details['price'].'</span><span class="ps-product__quantity">(x'.$details['quantity'].')</span>
                </p>
            </div>
            <div class="ps-product__remove"  onclick = "delete_cart('.$id.')" ><i class="icon-trash2"></i></div>
        </div>
    </li>


        ';


       }
       $data.=' </ul>
       </div>';

       $data.='
       <div class="mini-cart__footer row">
       <div class="col-6 title">TOTAL</div>
       <div class="col-6 text-right total">TK '.$total.'</div>
       <div class="col-12 d-flex"><a class="checkout" href="view_cart">View cart</a></div>
   </div>

       ';



            echo $data;

    }
    public function view_all_product($type)

    {

        $categories = category::get();
        Session::put('type',$type);
        return redirect()->route('view_all_product');
        //return view('frontend.view_all',compact('categories','type'));
    }

    public function view_alll_category_product()

    {

        $categories = category::get();
       $type=  Session::get('type');
        //return redirect()->route('view_all_product');
        return view('frontend.view_all',compact('categories','type'));
    }
    public function get_all_homepage_section($type)
    {
        if (strpos($type, 'section') !== false) {

        $section_category = homepage_section::get();
        file_put_contents('test.txt',json_encode($section_category));
        $data = ' <div class="owl-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="3000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="8" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="5" data-owl-item-lg="8" data-owl-duration="1000"
        data-owl-mousedrag="on">';
        foreach($section_category as $category)
        {
            $data.=' <div class="ps-category__item">
            <a href="shop-categories.html"><img class="ps-categories__thumbnail" style="width:100px;height:100px" src="'.$category->image.'" alt></a><a class="ps-categories__name" href="shop-categories.html">'.$category->section_name.'</a>
        </div>';
        }
        $data.=' </div>';
        $data.='<script src="assets/frontend/js/main.js?'.time().'"></script>';
    }
    if (strpos($type, 'category_prodcut') !== false) {


        $category = explode('-',$type);
        $category_id = $category[1];
        $sub_category = sub_category::where('category_id',$category_id)->get();
      //  file_put_contents('test.txt',json_encode($section_category));
        $data = ' <div class="owl-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="3000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="8" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="5" data-owl-item-lg="8" data-owl-duration="1000"
        data-owl-mousedrag="on">';
        foreach( $sub_category as $category)
        {
            $data.=' <div class="ps-category__item">
            <a href="shop-categories.html"><img class="ps-categories__thumbnail" style="width:100px;height:100px" src="'.$category->image.'" alt></a><a class="ps-categories__name" href="shop-categories.html">'.$category->name.'</a>
        </div>';
        }
        $data.=' </div>';
        $data.='<script src="assets/frontend/js/main.js?'.time().'"></script>';
    }

    if (strpos($type, 'sub_category') !== false) {


        $sub_category = explode('-',$type);
        $sub_category_id = $sub_category[1];
        $category_id = sub_category::where('id',$sub_category_id)->first()->category_id;
        $sub_category = sub_category::where('category_id',$category_id)->get();
      //  file_put_contents('test.txt',json_encode($section_category));
        $data = ' <div class="owl-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="3000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="8" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="5" data-owl-item-lg="8" data-owl-duration="1000"
        data-owl-mousedrag="on">';
        foreach( $sub_category as $category)
        {
            $data.=' <div class="ps-category__item">
            <a href="shop-categories.html"><img class="ps-categories__thumbnail" style="width:100px;height:100px" src="'.$category->image.'" alt></a><a class="ps-categories__name" href="shop-categories.html">'.$category->name.'</a>
        </div>';
        }
        $data.=' </div>';
        $data.='<script src="assets/frontend/js/main.js?'.time().'"></script>';
    }

        echo $data;
    }
    public function get_all_product_view_all($type)
    {
       // file_put_contents('test.txt',$type);
       $data = '';
        if (strpos($type, 'section') !== false) {
            $homepage_section = explode('-',$type);
            $homepage_section_id = $homepage_section[1];
            $home_page_product = homepage_product_list::where('homepage_section_id',$homepage_section_id)->get();
            //file_put_contents('test.txt',$homepage_section_id);

            foreach($home_page_product as $product)
            {
                $discount_price =$product->product->price- floor(($product->product->price*$product->discount_percentage)/100);
                $data.='<div class="col-6 col-md-4 col-lg-2dot4 p-0">
                <div class="ps-product--standard"><a  href="javascript:void(0);" onclick="show_cart_modal('.$product->product->id.')"><img class="ps-product__thumbnail" height="150px"   src="'.$product->product->thumbnail_image.'" alt="alt" /></a><a class="ps-product__expand" href="javascript:void(0);" onclick="show_cart_modal('.$product->product->id.')"><i class="icon-expand"></i></a>
                    <div class="ps-product__content">

                        <h5><a class="ps-product__name" href="javascript:void(0);" onclick="show_cart_modal('.$product->product->id.')" >'.$product->product->name.'</a></h5>
                        <p class="ps-product__unit">'.$product->product->unit->unit_quantity .$product->product->unit->unit_type.'</p>

                        <p class="ps-product-price-block"><span class="ps-product__sale">'.$discount_price.'</span><span class="ps-product__price">TK '.$product->product->price.' </span><span class="ps-product__off">'.$product->discount_percentage.'% Off</span>
                        </p>

                        <p class="ps-product__sold">Stock in Unit: '.$product->product->stock->stock_amount.'</p>
                    </div>
                    <div class="ps-product__footer">
                                    <div class="def-number-input number-input safari_only">
                                        <button class="minus dec" onclick="dec('.$product->product->id.')" ><i class="icon-minus"></i></button>
                                        <input class="quantity quantity-{{ $product_list->product->id }}" value="1" min="0" name="quantity" type="number" id="quantity-'.$product->product->id.'"   />
                                        <input type="hidden" id="input_quantity-'.$product->product->id.'">
                                        <button class="plus inc" onclick="inc('.$product->product->id.')" ><i class="icon-plus"></i></button>
                                    </div>
                        <div class="ps-product__total"></span> </div>
                        <button class="ps-product__addcart" onclick="cart_add('.$product->product->id.')"><i class="icon-cart"></i>Add to cart</button>
                        <div class="ps-product__box"><a class="ps-product__wishlist" href="wishlist.html">Wishlist</a><a class="ps-product__compare" href="wishlist.html">Compare</a></div>
                    </div>
                </div>
            </div>

        ';
            }

        }

        if (strpos($type, 'category_prodcut') !== false) {

            $category = explode('-',$type);
            $category_id = $category[1];
            $sub_category = sub_category::where('category_id',$category_id)->get();
           // file_put_contents('test3.txt',json_encode($sub_category[0]->product));


            // return $category[1]->sub_category;



                //  $response = ["category" =>$data_category,'status_code'=>200];
                //  return response($response, 200);



            foreach($sub_category as  $product_list)
            {

                // $myfile = fopen("test2.txt", "a+") or die("Unable to open file!");
                // fwrite($myfile,sizeof($product_avail)."\n");

                foreach($product_list->product as $product)
                {
                    //   $myfile = fopen("test3.txt", "a+") or die("Unable to open file!");
                    //   fwrite($myfile,json_encode($product)."\n");


               // file_put_contents('test2.txt',json_encode($product->product));
                // $discount_price =$product->product->price- floor(($product->product->price*$product->discount_percentage)/100);
                $data.='<div class="col-6 col-md-4 col-lg-2dot4 p-0">
                <div class="ps-product--standard"><a  href="javascript:void(0);" onclick="show_cart_modal('.$product->id.')"><img class="ps-product__thumbnail" height="150px"   src="'.$product->thumbnail_image.'" alt="alt" /></a><a class="ps-product__expand" href="javascript:void(0);" onclick="show_cart_modal('.$product->id.')"><i class="icon-expand"></i></a>
                    <div class="ps-product__content">

                        <h5><a class="ps-product__name" href="javascript:void(0);" onclick="show_cart_modal('.$product->id.')" >'.$product->name.'</a></h5>
                        <p class="ps-product__unit">'.$product->unit->unit_quantity .$product->unit->unit_type.'</p>

                        <p class="ps-product-price-block"><span class="ps-product__sale">'.$product->price.'</span><span class="ps-product__price">TK '.$product->price.' </span><span class="ps-product__off">'.$product->discount_percentage.'% Off</span>
                        </p>

                        <p class="ps-product__sold">Stock in Unit: '.$product->stock->stock_amount.'</p>
                    </div>
                    <div class="ps-product__footer">
                                    <div class="def-number-input number-input safari_only">
                                        <button class="minus dec" onclick="dec('.$product->id.')" ><i class="icon-minus"></i></button>
                                        <input class="quantity quantity-{{ $product_list->product->id }}" value="1" min="0" name="quantity" type="number" id="quantity-'.$product->id.'"   />
                                        <input type="hidden" id="input_quantity-'.$product->id.'">
                                        <button class="plus inc" onclick="inc('.$product->id.')" ><i class="icon-plus"></i></button>
                                    </div>
                        <div class="ps-product__total"></span> </div>
                        <button class="ps-product__addcart" onclick="cart_add('.$product->id.')"><i class="icon-cart"></i>Add to cart</button>
                        <div class="ps-product__box"><a class="ps-product__wishlist" href="wishlist.html">Wishlist</a><a class="ps-product__compare" href="wishlist.html">Compare</a></div>
                    </div>
                </div>
            </div>

        ';

                }

            }


        }

        if (strpos($type, 'sub_category') !== false) {

            $sub_category = explode('-',$type);
            $sub_category_id = $sub_category[1];
            $product_list = product::where('sub_category_id',$sub_category_id)->get();
           // file_put_contents('test3.txt',json_encode($sub_category[0]->product));


            // return $category[1]->sub_category;



                //  $response = ["category" =>$data_category,'status_code'=>200];
                //  return response($response, 200);



                // $myfile = fopen("test2.txt", "a+") or die("Unable to open file!");
                // fwrite($myfile,sizeof($product_avail)."\n");

                foreach($product_list as $product)
                {
                    //   $myfile = fopen("test3.txt", "a+") or die("Unable to open file!");
                    //   fwrite($myfile,json_encode($product)."\n");


               // file_put_contents('test2.txt',json_encode($product->product));
                // $discount_price =$product->product->price- floor(($product->product->price*$product->discount_percentage)/100);
                $data.='<div class="col-6 col-md-4 col-lg-2dot4 p-0">
                <div class="ps-product--standard"><a  href="javascript:void(0);" onclick="show_cart_modal('.$product->id.')"><img class="ps-product__thumbnail" height="150px"   src="'.$product->thumbnail_image.'" alt="alt" /></a><a class="ps-product__expand" href="javascript:void(0);" onclick="show_cart_modal('.$product->id.')"><i class="icon-expand"></i></a>
                    <div class="ps-product__content">

                        <h5><a class="ps-product__name" href="javascript:void(0);" onclick="show_cart_modal('.$product->id.')" >'.$product->name.'</a></h5>
                        <p class="ps-product__unit">'.$product->unit->unit_quantity .$product->unit->unit_type.'</p>

                        <p class="ps-product-price-block"><span class="ps-product__sale">'.$product->price.'</span><span class="ps-product__price">TK '.$product->price.' </span><span class="ps-product__off">'.$product->discount_percentage.'% Off</span>
                        </p>

                        <p class="ps-product__sold">Stock in Unit: '.$product->stock->stock_amount.'</p>
                    </div>
                    <div class="ps-product__footer">
                                    <div class="def-number-input number-input safari_only">
                                        <button class="minus dec" onclick="dec('.$product->id.')" ><i class="icon-minus"></i></button>
                                        <input class="quantity quantity-{{ $product_list->product->id }}" value="1" min="0" name="quantity" type="number" id="quantity-'.$product->id.'"   />
                                        <input type="hidden" id="input_quantity-'.$product->id.'">
                                        <button class="plus inc" onclick="inc('.$product->id.')" ><i class="icon-plus"></i></button>
                                    </div>
                        <div class="ps-product__total"></span> </div>
                        <button class="ps-product__addcart" onclick="cart_add('.$product->id.')"><i class="icon-cart"></i>Add to cart</button>
                        <div class="ps-product__box"><a class="ps-product__wishlist" href="wishlist.html">Wishlist</a><a class="ps-product__compare" href="wishlist.html">Compare</a></div>
                    </div>
                </div>
            </div>

        ';

                }




        }



    echo $data;
    }
    public function show_cart_modal($id)
    {
        $product = product::find($id);
        $product_in_section = homepage_product_list::where('product_list',$id)->where('status',1)->first();
        $discount_percentage = 0;
        if($product_in_section)
        {
            $discount_percentage = $product_in_section->discount_percentage;


        }
        $unit = $product->unit->unit_quantity." ".$product->unit->unit_type;

        $data ='
        <div class="modal-dialog modal-dialog-centered modal-xl ps-quickview">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid quickview-body">
                    <div class="row">
                        <div class="col-12 col-lg-5">
                            <div >
                                <div class="quickview-carousel" style="margin-top:50px"><img class="carousel__thumbnail" src="'.$product->thumbnail_image.'" alt="alt" /></div>

                            </div>
                        </div>
                        <div class="col-12 col-lg-7">
                            <div class="quickview__product">
                                <div class="product__header">
                                    <div class="product__title">'.$product->name.'</div>

                                </div>
                                <div class="product__content">
                                ';
                                if($discount_percentage==0)
                                {
                                    $data.=' <div class="product__price"><span class="sale">Tk '.$product->price.'</span></div>';
                                }
                                else
                                {
                                    $discount_price =$product->price- floor(($product->price*$discount_percentage)/100);
                                    $data.=' <div class="product__price"><span class="sale">Tk '.$discount_price.'</span><span class="price">TK '.$product->price.'</span><span class="off">'.$discount_percentage.'% Off</span></div>';
                                }
                                $data.='

                                    <p class="product__unit">'.$unit.'.</p>
                                    <div class="alert__success">Availability: <span>'.$product->stock->stock_amount.' in stock</span></div>

                                </div>
                                <div class="product__action">
                                    <label>Quantity: </label>
                                    <div class="def-number-input number-input safari_only">
                                        <button class="minus dec" onclick="dec('.$product->id.')"><i class="icon-minus"></i></button>
                                        <input class="quantity" min="0" name="quantity" value="1" type="number" id="quantity-'.$product->id.'">
                                        <input type="hidden" id="input_quantity">
                                        <button class="plus inc" onclick="inc('.$product->id.')"><i class="icon-plus"></i></button>
                                    </div>
                                    <button class="btn product__addcart"  onclick="cart_add('.$product->id.')"> <i class="icon-cart"></i>Add to cart</button>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/frontend/js/frontend.js?{{ time() }}"></script>



        ';
        echo $data;
    }

    function str_random($length = 16)
    {
         $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
    public function submit_user_information(Request $request)
    {
        $name = $request->name;
        $mobile_number = Session::get('mobile_number');
        $user = new user();
        $user->contact_no = $mobile_number;
        $user->name = $name;
        $user->role = 'customer';
        $user->save();
        Auth::login($user);
        return redirect()->to('/');

        //user::create(['contact_no'=>$mobile_number,'name'=>$name]);
       // user::where('contact_no',$mobile_number)->update(['name'=>$name]);
    }

    public function submit_otp(Request $request)
    {

        $token = Session::get('otp_token');
        $otp = $request->otp;
        $mobile_number = Session::get('mobile_number');
        $check = user_otp::where('token',$token)->where('otp',$otp)->first();

         $user = user::where('contact_no', $mobile_number)->first();


        if($check)
        {

             if($user)
             {
                Auth::login($user);
                return redirect()->to('/');
             }
             else
             {
                return view('auth.save_name');
             }
            //return response($response, 200);

        }
        else
        {
            return redirect()->back()->with('error','Otp Not Matched');
        }

        //return response($response, 200);
    }
    public function checkout()
    {
        $areas = area::where('status',1)->get();

            $sub_total = 0;
            $cart = session()->get('cart');

            foreach( $cart as $id => $details)
            {
                $sub_total += $details['price'] * $details['quantity'];
            }
            $delivery_charge = 20;
            $total = $sub_total+$delivery_charge;

        return view('frontend.checkout',compact('areas','cart','delivery_charge','total','sub_total'));
    }

    public function add_address(Request $request)
    {
        $user_id = Auth::user()->id;
        $request['user_id'] = $user_id;
        user_address::create($request->all());
    }
    public function get_all_address()
    {
        $user_id = Auth::user()->id;
        $datas = user_address::where('user_id',$user_id)->get();
        if(sizeof($datas)>0)
        {
        $response = ' <div class="form-check">
        <input class="form-check-input" type="radio" value='.$datas[0]->id.' name="address_id" id="address_id">
        <label class="form-check-label radio-label" for="flexRadioDefault1">
          '.$datas[0]->address_type.'
        </label>
        <label class="form-check-label radio-label" style="float:right" for="flexRadioDefault1">
        <button type="button" class="btn btn-success" onclick="edit_address_modal('.$datas[0]->id.')"><i class="icon-pencil icon-shop5" style="color:white;font-weight:bold; font-family: Linearicons, Bangla634, sans-serif;"></i></button>
        <button  type="button" class="btn btn-danger" onclick="delete_address('.$datas[0]->id.')" style="background-color:#f10000"><i class="icon-trash2 icon-shop5" style="color:white;font-weight:bold;font-family: Linearicons, Bangla634, sans-serif;"></i></button>
        </label>
        <p>'.$datas[0]->area->name.'<span>,&nbsp'.$datas[0]->address.'</span></p>

        <p>'.$datas[0]->contact_no.'</p>
    </div>';

        }

        for($i=1;$i<sizeof($datas);$i++)
        {
            $response.='  <div class="form-check">
            <input class="form-check-input" type="radio"  value='.$datas[$i]->id.' name="address_id" id="address_id">
            <label class="form-check-label radio-label" for="flexRadioDefault1">
              '.$datas[$i]->address_type.'
            </label>
            <label class="form-check-label radio-label" style="float:right" for="flexRadioDefault1">
            <button type="button" class="btn btn-success" onclick="edit_address_modal('.$datas[$i]->id.')"><i class="icon-pencil icon-shop5" style="color:white;font-weight:bold; font-family: Linearicons, Bangla634, sans-serif;"></i></button>
            <button  type="button" class="btn btn-danger" onclick="delete_address('.$datas[$i]->id.')"  style="background-color:#f10000"><i class="icon-trash2 icon-shop5" style="color:white;font-weight:bold;font-family: Linearicons, Bangla634, sans-serif;"></i></button>
            </label>
            <p>'.$datas[$i]->area->name.'<span>'.$datas[$i]->address.'</span></p>

            <p>'.$datas[$i]->contact_no.'</p>
        </div>';
        }

        return $response;

    }
    public function delete_address($id)
    {
        user_address::where('id',$id)->delete();
    }
    public function update_address(Request $request)
    {
       $id = $request->id;
       user_address::where('id',$id)->update($request->all());
    }
    public function edit_address($id)
    {
        $data = user_address::where('id',$id)->first();
        echo json_encode($data);
    }

    public function send_otp(Request $request)
    {
    //   $validator=  $request->validate([
    //         'mobile_number' => 'required|regex:/01[13-9]\d{8}$/',
    //          ]);
         $validator = Validator::make($request->all(), [
                'mobile_number' => ['required', 'regex:/01[13-9]\d{8}$/'],
             ]);
        if($validator->fails())
        {
            return redirect()->back()->with('errors',collect($validator->errors()->all()));
        }
        $mobile_number = $request->mobile_number;
        $otp = mt_rand(1000,9999);
        $otp_token = $this->str_random(30);
        Session::put('otp_token',$otp_token);
        Session::put('mobile_number',$mobile_number);
       $this->otp($mobile_number,$otp);
        // $check_user = user::where('contact_no',$mobile_number)->first();
        // if(!$check_user)
        // {
        //     $user = new user();
        //     $user->contact_no = $mobile_number;
        //     $user->save();
        // }
        user_otp::create(['token'=>$otp_token,'otp'=>$otp]);
        return view('auth.otp',compact('mobile_number'));
       // $response = ['status_code'=>200,'otp_token'=>$otp_token];
        //return response($response, 200);
    }
    public function otp($mobile_number,$otp)
    {
        $mobile_number = '88'.$mobile_number;
        $url = "http://gsms.pw/smsapi";
  $data = [
    "api_key" => "C20003436040f26e6f69b0.10063984",
    "type" => "text",
    "contacts" => $mobile_number,
    "senderid" => "8809601001329",
    "msg" => "Your GOGO SHO OTP is ".$otp,
  ];
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $response = curl_exec($ch);
  curl_close($ch);
  //return $response;

    }
    public function logout()
    {
        auth()->logout();
        return redirect()->to('/');
    }
}
