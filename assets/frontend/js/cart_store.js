
var shoppingCart = (function() {
    // =============================
    // Private methods and propeties
    // =============================
    cart = [];

    // Constructor
    function Item(name, price, count, image,id,unit,type) {
      this.name = name;
      this.price = price;
      this.count = count;
      this.image = image;
      this.id = id;
      this.unit = unit;
      this.type = type;
    }

    // Save cart
    function saveCart() {
      sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
    }

      // Load cart
    function loadCart() {
      cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
    }
    if (sessionStorage.getItem("shoppingCart") != null) {
      loadCart();
    }


    // =============================
    // Public methods and propeties
    // =============================
    var obj = {};

    obj.addItemToCartFromAll = function(id) {
        for(var item in cart) {
          if(cart[item].id == id) {

            cart[item].count ++;
            saveCart();
            return;
          }
        }
    }

    // Add to cart
    obj.addItemToCart = function(name, price, count, image,id,unit,type) {
      for(var item in cart) {
        if(cart[item].id == id) {

          cart[item].count ++;
          saveCart();
          return;
        }
      }
      //alert('hello');
      var item = new Item(name, price, count,image,id,unit,type);
      cart.push(item);
      saveCart();
    }
    // Set count from item
    obj.setCountForItem = function(id, count) {
      for(var i in cart) {
        if (cart[i].id === id) {
          cart[i].count = count;
          break;
        }
      }
    };
    // Remove item from cart
    obj.removeItemFromCart = function(id) {
        for(var item in cart) {
          if(cart[item].id === id) {
            cart[item].count --;
            if(cart[item].count === 0) {
              cart.splice(item, 1);
            }
            break;
          }
      }
      saveCart();
    }

    // Remove all items from cart
    obj.removeItemFromCartAll = function(id) {
      for(var item in cart) {
        if(cart[item].id === id) {
          cart.splice(item, 1);
          break;
        }
      }
      saveCart();
    }

    // Clear cart
    obj.clearCart = function() {
      cart = [];
      saveCart();
    }

    // Count cart
    obj.totalCount = function() {
      var totalCount = 0;
      for(var item in cart) {
        totalCount += cart[item].count;
      }
      return totalCount;
    }

    // Total cart
    obj.totalCart = function() {
      var totalCart = 0;
      for(var item in cart) {
        totalCart += cart[item].price * cart[item].count;
      }
      return Number(totalCart.toFixed(2));
    }

    // List cart
    obj.listCart = function() {
      var cartCopy = [];
      for(i in cart) {
        item = cart[i];
        itemCopy = {};
        for(p in item) {
          itemCopy[p] = item[p];

        }
        itemCopy.total = Number(item.price * item.count).toFixed(2);
        cartCopy.push(itemCopy)
      }
      return cartCopy;
    }

    // cart : Array
    // Item : Object/Class
    // addItemToCart : Function
    // removeItemFromCart : Function
    // removeItemFromCartAll : Function
    // clearCart : Function
    // countCart : Function
    // totalCart : Function
    // listCart : Function
    // saveCart : Function
    // loadCart : Function
    return obj;
  })();


  // *****************************************
  // Triggers / Events
  // *****************************************
  // Add item
  //shoppingCart.clearCart();




 $(document).on("click", '.add-to-cart', function(event) {


    event.preventDefault();
    var name = $(this).data('name');
    var price = Number($(this).data('price'));
    var id = Number($(this).data('id'));
    var type = $(this).data('type');
    if(type == 'product')
    var count = Number($("#quantity-"+id).val())
    else
    var count = Number($("#quantity_package-"+id).val())
    var image = $(this).data('image');
    var unit = $(this).data('unit');
    var type = $(this).data('type');
    shoppingCart.addItemToCart(name, price, count,image,id,unit,type);
    displayCart();
  });

  // Clear items
  $('.clear-cart').click(function() {
    shoppingCart.clearCart();
    displayCart();
  });

  function displayAll()
  {
    var cartArray = shoppingCart.listCart();
    var output = "";
    for(var i in cartArray) {
      output += '<div class="show-cart shopping-cart-row">'
      +'<div class="cart-product">'
      +'<div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src='+ cartArray[i].image +' alt="alt" /></a>'
      +'<div class="ps-product__content">'
      +'<h5><a class="ps-product__name" href="#">'+ cartArray[i].name +'</a></h5>'
      +'<p class="ps-product__unit">'+ cartArray[i].unit +'</p>'

      +'<p class="ps-product__meta">Price: <span class="ps-product__price">TK '+ cartArray[i].price +'</span></p>'
      +'<div class="def-number-input number-input safari_only">'
      +'<button class="minus minus-item" data-id=' + cartArray[i].id + '> ><i class="icon-minus"></i></button>'
      +'<input type="hidden" class="input_quantity">'
      +'<input type="hidden" name="hidden_product_id" value='+ cartArray[i].id +'>'
      +'<input class="quantity quantity-'+ cartArray[i].id +'" min="0" name="quantity" value="'+ cartArray[i].count +'" type="number" id="quantity-'+ cartArray[i].id +'" readonly="readonly"/>'
      +'<button class="plus-item" data-id=' + cartArray[i].id + '><i class="icon-plus"></i></button>'
      +'</div><span class="ps-product__total">Total: <span>TK '+ cartArray[i].price * cartArray[i].count+' </span></span>'
      +'</div>'
      +'<div class="delete-item ps-product__remove" data-id = ' + cartArray[i].id + '><i class="icon-trash2"></i></div>'
      +'</div>'
      +'</div>'
      +'<div class="cart-price"><span class="ps-product__price">TK '+ cartArray[i].price +'</span>'
      +'</div>'
      +'<div class="cart-quantity">'
      +'<div class="def-number-input number-input safari_only">'
      +'<button class="minus minus-item" data-id=' + cartArray[i].id + ' ><i class="icon-minus"></i></button>'
      +'<input type="hidden" class="input_quantity">'
      +'<input type="hidden" name="hidden_product_id" value="'+ cartArray[i].id +'">'
      +'<input class="quantity quantity-'+ cartArray[i].id +'" min="0" name="quantity" value="'+ cartArray[i].count +'" type="number" id="quantity-'+ cartArray[i].id +'" readonly="readonly"/>'
      +'<button class="plus-item" data-id=' + cartArray[i].id + ' ><i class="icon-plus"></i></button>'
      +'</div>'
      +'</div>'
      +'<div class="cart-total"> <span class="ps-product__total">TK '+ cartArray[i].price * cartArray[i].count+'</span>'
      +'</div>'
      +'<div class="delete-item cart-action" data-id = ' + cartArray[i].id + ' > <i class="icon-trash2"></i></div>'
      +'</div>';
    }
    $('.show-cart-all').html(output);
    $('.total-cart').html(shoppingCart.totalCart()+' TK');
    let delivery_charge = Number($('.delivery_charge').html());
    //$('.delivery_charge').html(delivery_charge+" TK")
   $('.price-total').html(shoppingCart.totalCart()+delivery_charge+' TK');
    //alert(delivery_charge)
    $('.total-count').html(shoppingCart.totalCount());
  }

  function displayCart() {
    var cartArray = shoppingCart.listCart();
    var output = "";
    for(var i in cartArray) {

      output += '<li class="cart-item">'
      +'<div class="ps-product--mini-cart">'
         +'<a href="product-default.html"><img style="min-width:60px" class="ps-product__thumbnail" src='+ image_asset(cartArray[i].image) +' alt="alt" /></a>'
        + '<div class="ps-product__content">'
            +'<a class="ps-product__name" href="#">'+cartArray[i].name+'</a>'
            +'<p class="ps-product__unit">'+cartArray[i].unit+'</p>'
            +'<p class="ps-product__meta"> <span class="ps-product__price">TK '+ cartArray[i].price +' </span><span class="ps-product__quantity">(x'+ cartArray[i].count +')</span>'
            +'</p>'
         +'</div>'
         +'<div class="delete-item ps-product__remove" data-id = ' + cartArray[i].id + ' ><i class="icon-trash2"></i></div>'
      +'</div>'
   +'</li>';
    }
    $('.show-cart').html(output);
    $('.total-cart').html(shoppingCart.totalCart());
    $('.total-count').html(shoppingCart.totalCount());
  }

  // Delete item button

  $(document).on("click", '.show-cart', function(event) {


    var id = $(this).data('id');
    //alert(id);
    shoppingCart.removeItemFromCartAll(id);
    $('.mini-cart').toggleClass('open');
    displayCart();
    displayAll();

  })

  $('.show-cart-all').on("click", ".delete-item", function(event) {

    var count = $('.total-count').html();
    if(count>1)
    {
        var id = $(this).data('id');
        //alert(id);
        shoppingCart.removeItemFromCartAll(id);

        //$('.mini-cart').toggleClass('open');
        displayCart();
        displayAll();
    }
    else
    {
        swal({
            title: "Are you sure?",
            text: "This is the last item of your cart. If you remove it,you will redirect to homepage",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

                var id = $(this).data('id');
                shoppingCart.removeItemFromCartAll(id);
                displayCart();
                displayAll();
                document.location.href='home';

            }
          })
    }


  })



  // -1
  $('.show-cart-all').on("click", ".minus-item", function(event) {


    var count = $('.total-count').html();
    if(count>1)
    {
        var id = $(this).data('id');
        //alert(id);
        shoppingCart.removeItemFromCart(id);

        //$('.mini-cart').toggleClass('open');
        displayCart();
        displayAll();
    }
    else
    {
        swal({
            title: "Are you sure?",
            text: "This is the last item of your cart. If you remove it,you will redirect to homepage",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

                var id = $(this).data('id');
                shoppingCart.removeItemFromCart(id);
                displayCart();
                displayAll();
                document.location.href='home';

            }
          })
    }


  })
  // +1
  $('.show-cart-all').on("click", ".plus-item", function(event) {
    //alert('hello')
    var id = $(this).data('id')
    //alert(id)
    shoppingCart.addItemToCartFromAll(id);
    //displayCart();
    displayAll();

  })

  // Item count input

  $('.show-cart').on("change", ".item-count", function(event) {
     var id = $(this).data('id');
     var count = Number($(this).val());
    shoppingCart.setCountForItem(id, count);
   // displayCart();
   displayAll();


  });


  displayCart();
  displayAll();



  function checkout()
  {

    var final_cart = JSON.stringify(cart);
    var sub_total = shoppingCart.totalCart();
    //alert(total);
    var formdata = new FormData();
   // alert(final_cart);
    formdata.append('cart',final_cart);
    formdata.append('sub_total',sub_total);
     $.ajax({
     processData: false,
     contentType: false,
     type: 'POST',
     url: checkout_url,
     data:formdata,
     success: function (data) {
        location.href = 'checkout';

     }
 })
  }

