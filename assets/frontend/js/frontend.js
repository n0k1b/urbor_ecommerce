$( document ).ready(function() {

    $('#preloader').fadeOut(1500);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     get_all_category();
     get_all_category_mobile();


    get_cart_count();

    get_cart_box();


    // $(".inc").click(function() {
    //     updateValue(this, 1);
    // });
    // $(".dec").click(function() {
    //     updateValue(this, -1);
    // });



});





function get_all_category() {

    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'get_all_category',
        success: function (data) {
            $(".category_list").html(data);

        }
    })


}
function get_all_category_mobile() {

    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'get_all_category_mobile',
        success: function (data) {
            $(".category_list_mobile").html(data);

        }
    })


}

function search_product()
{
    //alert('hello')

    var input_value =  $('#search_input').val();

    var formdata = new FormData();

    formdata.append('input_value',input_value);
     $.ajax({
     processData: false,
     contentType: false,
     type: 'POST',
     url: 'search_product',
     data:formdata,
     success: function (data) {
        $("#search_result").html(data)

     }
 })
   // alert(input_value);

    var toggle_state = $("#toggle_state").val();
    if(toggle_state == 'close')
    {
   $('.result-search').toggleClass('open');
   $("#toggle_state").val('open');
    }

}

function search_product_mobile()
{
   // alert('hello')

    var input_value =  $('.search_input_mobile').val();

    var formdata = new FormData();

    formdata.append('input_value',input_value);
     $.ajax({
     processData: false,
     contentType: false,
     type: 'POST',
     url: 'search_product',
     data:formdata,
     success: function (data) {
         //alert(data);
       $(".search_result_mobile").html(data)

     }
 })
   // alert(input_value);

//     var toggle_state = $("#toggle_state").val();
//     if(toggle_state == 'close')
//     {
//    $('.mobile-search__result').toggleClass('open');
//    $("#toggle_state").val('open');
//     }





}



function show_cart_modal(id) {

    $.ajax({
        processData: false,
        contentType: false,
        dataType : 'html',
        type: 'GET',
        url: 'show_cart_modal/'+id,
        success: function (data) {
            $("#cart_modal").html(data);
            $("#cart_modal").modal('show');

        }
    })


}


function show_package_modal(id) {


    $.ajax({
        processData: false,
        contentType: false,
        dataType : 'html',
        type: 'GET',
        url: 'show_package_modal/'+id,
        success: function (data) {
            $("#package_modal").html(data);
            $("#package_modal").modal('show');

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
         get_cart_box();

    }
})
}



function get_cart_box()
{
    var count =  $(".cart_itemt_count").text();
    if(count>-1){


    $.ajax({
    processData: false,
    contentType: false,
    type: 'GET',
    url: 'get_cart_box',
    success: function (data) {

        $("#cart_box").html(data);
    }
})
    }
}
function get_cart_count()
{
    $.ajax({
    processData: false,
    contentType: false,
    type: 'GET',
    url: 'get_cart_count',
    success: function (data) {

        $(".cart_itemt_count").text(data);
    }
})
}

function cancel_order(order_no)
{

    swal({
        title: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {


            var formdata = new FormData();

            formdata.append('order_no',order_no);
             $.ajax({
             processData: false,
             contentType: false,
             type: 'POST',
             url: 'cancel_order',
             data:formdata,
             success: function (data) {

                swal("Your order has been canceled", {
                    icon: "success",

                  }).then((value) => {
                    window.location.href = 'order_list';
                  });

             }
         })


        }
      });
}
function modal_close()
{

    // $(".cart_modal").removeClass("in");
    // $(".modal-backdrop").remove();
    // $(".cart_modal").hide();;
    //$(".cart_modal").modal('hide');
}



function cart_add(id)
{


   var quantity = $("#quantity-"+id).val()
   //alert(quantity)
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
      $(".cart_modal").modal('hide');

    }
})
}

function cart_add_package(id)
{

   var quantity = $("#quantity_package-"+id).val()

   //alert(quantity+" "+id)
   var formdata = new FormData();
   formdata.append('id',id);
   formdata.append('quantity',quantity);
    $.ajax({
    processData: false,
    contentType: false,
    type: 'POST',
    url: 'cart_add_package',
    data:formdata,
    success: function (data) {
        get_cart_count();
         get_cart_box();
      $(".package_modal").modal('hide');

    }
})
}


// function inc(product_id)
// {

//     updateValue(this, 1);
//     $("#input_quantity").val(product_id);

// }

// function dec(product_id)
// {
//     updateValue(this, -1);
//     $("#input_quantity").val(product_id);

// }

$(document).on("click", '.inc', function(event) {
   // alert('hell');
    updateValue(this, 1);

});

$(document).on("click", '.dec', function(event) {
    var item = $(this).parent().find("input[type=number]");
    //var product_id = $(this).parent().find("input[name='hidden_product_id']");

    var newValue = parseInt(item.val(), 10) - 1;
    //alert(newValue)
    if(newValue>0)
    {
        updateValue(this, -1);
    }
   // updateValue(this, -1);
});

$(document).on("click", '.inc_package', function(event) {

    updateValue_package(this, 1);
});

$(document).on("click", '.dec_package', function(event) {
    var item = $(this).parent().find("input[type=number]");
    //var product_id = $(this).parent().find("input[name='hidden_product_id']");

    var newValue = parseInt(item.val(), 10) - 1;
    //alert(newValue)
    if(newValue>0)
    {
        updateValue_package(this, -1);
    }

});


function updateValue_package(obj, delta) {
    var item = $(obj).parent().find("input[type=number]");
    var product_id = $(obj).parent().find("input[name='hidden_product_id_package']");

    var newValue = parseInt(item.val(), 10) + delta;

    item.val(Math.max(newValue, 1));
    //var product_id = $('#input_quantity').val();
    $("#quantity_package-"+product_id.val()).val(newValue);




}


function updateValue(obj, delta) {

    var item = $(obj).parent().find("input[type=number]");
    var product_id = $(obj).parent().find("input[name='hidden_product_id']");

    var newValue = parseInt(item.val(), 10) + delta;
    //alert(newValue)
    item.val(Math.max(newValue, 1));
    //var product_id = $('#input_quantity').val();
    $("#quantity-"+product_id.val()).val(newValue);




}
