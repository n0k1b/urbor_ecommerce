
    $(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        get_all_cart_info()

    })

    function get_all_cart_info()
    {

        $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'get_all_cart_info',
        success: function (data) {
                var cart =JSON.parse(data);
             $("#cart_all").html(cart.cart_table);
             $("#cart_total").html(cart.cart_total);
        }
    })
    }


    function delete_cart(id)
    {
        $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'cart_delete/'+id,
        success: function (data) {
            $('.mini-cart').toggleClass('open');
            get_cart_count();
            var count =  $(".cart_itemt_count").html();
            alert(count);
            if(count>0){
            get_cart_box();
            }


        }
    })
    }


    function get_cart_count()
    {
        $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'get_cart_count',
        success: function (data) {

            $("#cart_itemt_count").text(data);
        }
    })
    }
    function cart_add(id)
    {
       var quantity = $(".quantity-"+id).val()
       var formdata = new FormData();
       formdata.append('id',id);
       formdata.append('quantity',quantity);
        $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        url: 'cart_add',
        data:formdata,
        success: function (data) {
            get_cart_count();
             get_cart_box();

        }
    })
    }

//     function inc(product_id)
// {


//     $(".input_quantity").val(product_id);



// }

// function dec(product_id)
// {

//     $(".input_quantity").val(product_id);



// }

function delete_cart_view_cart(id)

{
    var url = "{{ route('home')}}";
    var count =  $(".cart_itemt_count").html();
    if(count>1)
    {
        $.ajax({
            processData: false,
            contentType: false,
            type: 'GET',
            url: 'cart_delete/'+id,
            success: function (data) {
             get_cart_count();
            get_all_cart_info();


            }
        })
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
            $.ajax({
                processData: false,
                contentType: false,
                type: 'GET',
                url: 'cart_delete/'+id,
                success: function (data) {
                 get_cart_count();
                 document.location.href='home';
               // get_all_cart_info();


                }
            })


        }
      })


    }



}

$(document).on("click", '.inc_view_cart', function(event) {
    //alert('hello');

   // item.val(Math.max(newValue, 1));
    updateValue_view_cart(this, 1);
});

$(document).on("click", '.dec_view_cart', function(event) {
    var item = $(this).parent().find("input[type=number]");
    //var product_id = $(this).parent().find("input[name='hidden_product_id']");

    var newValue = parseInt(item.val(), 10) - 1;
    //alert(newValue)
    if(newValue>0)
    {
    updateValue_view_cart(this, -1);
    }
});

$(document).on("click", '.inc_view_cart_package', function(event) {
    //alert('hello');

    updateValue_view_cart_package(this, 1);
});

$(document).on("click", '.dec_view_cart_package', function(event) {

    var item = $(this).parent().find("input[type=number]");
    //var product_id = $(this).parent().find("input[name='hidden_product_id']");

    var newValue = parseInt(item.val(), 10) - 1;
    //alert(newValue)
    if(newValue>0)
    {
        updateValue_view_cart_package(this, -1);
    }


});


function updateValue_view_cart_package(obj, delta) {


    var item = $(obj).parent().find("input[type=number]");
    var product_id = $(obj).parent().find("input[name='hidden_product_id_package']");

    var newValue = parseInt(item.val(), 10) + delta;
    //alert(newValue)
    item.val(Math.max(newValue, 1));
    //var product_id = $('#input_quantity').val();
    $(".quantity_package-"+product_id.val()).val(newValue);




     var quantity = $(".quantity_package-"+product_id.val()).val()
     //alert(quantity)
        var formdata = new FormData();
        formdata.append('id',product_id.val());
        formdata.append('quantity',quantity);
         $.ajax({
         processData: false,
         contentType: false,
         type: 'POST',
         url: 'cart_update_package',
         data:formdata,
         success: function (data) {

           get_all_cart_info();
         }
     })





 }

function updateValue_view_cart(obj, delta) {

 //alert('hello');
   var item = $(obj).parent().find("input[type=number]");
   var product_id = $(obj).parent().find("input[name='hidden_product_id']");

   var newValue = parseInt(item.val(), 10) + delta;
   //alert(newValue)
   item.val(Math.max(newValue, 1));
   //var product_id = $('#input_quantity').val();
   $(".quantity-"+product_id.val()).val(newValue);




    var quantity = $(".quantity-"+product_id.val()).val()
    //alert(quantity)
       var formdata = new FormData();
       formdata.append('id',product_id.val());
       formdata.append('quantity',quantity);
        $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        url: 'cart_update',
        data:formdata,
        success: function (data) {

          get_all_cart_info();
        }
    })





}
