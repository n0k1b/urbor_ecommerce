<div class="mini-cart__products">
    <div class="out-box-cart">
        <div class="triangle-box">
            <div class="triangle"></div>
        </div>
    </div>
    <ul class="list-cart">


        <li class="cart-item">
            <div class="ps-product--mini-cart"><a href="product-default.html"><img style="min-width:60px" class="ps-product__thumbnail" src="'.$details['photo'].'" alt="alt" /></a>
                <div class="ps-product__content"><a class="ps-product__name" href="product-default.html">'.$details['name'].'</a>

                    <p class="ps-product__meta"> <span class="ps-product__price">TK '.$details['price'].'</span><span class="ps-product__quantity">(x'.$details['quantity'].')</span>
                    </p>
                </div>
                <div class="ps-product__remove"  onclick = "delete_cart('.$id.')" ><i class="icon-trash2"></i></div>
            </div>
        </li>




    </ul>
</div>
<div class="mini-cart__footer row">
<div class="col-6 title">TOTAL</div>
<div class="col-6 text-right total">TK '.$total.'</div>
<div class="col-12 d-flex"><a class="checkout" href="view_cart">View cart</a></div>
</div>
