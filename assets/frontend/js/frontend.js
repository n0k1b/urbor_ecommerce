$( document ).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     get_all_category();
    get_cart_count();
    get_cart_box();


});



function get_all_category() {

    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'get_all_category',
        success: function (data) {
            $("#category_list").html(data);

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
    //alert('hello')

    var input_value =  $('#search_input_mobile').val();

    var formdata = new FormData();

    formdata.append('input_value',input_value);
     $.ajax({
     processData: false,
     contentType: false,
     type: 'POST',
     url: 'search_product',
     data:formdata,
     success: function (data) {
        $("#search_result_mobile").html(data)

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



function show_cart_modal(id) {

    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'show_cart_modal/'+id,
        success: function (data) {
            $("#cart_modal").html(data);
            $("#cart_modal").modal('show');

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
   var quantity = $("#quantity-"+id).val()
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
         $("#cart_modal").modal('hide');

    }
})
}

// function inc(product_id)
// {

//     updateValue(this, 1);
//     $("#input_quantity").val(product_id);

// }

function dec(product_id)
{
    updateValue(this, -1);
    $("#input_quantity").val(product_id);

}
$(".inc").click(function() {
    updateValue(this, 1);
});
$(".dec").click(function() {
    updateValue(this, -1);
});


function updateValue(obj, delta) {
    var item = $(obj).parent().find("input[type=number]");
    var product_id = $(obj).parent().find("input[name='hidden_product_id']");

    var newValue = parseInt(item.val(), 10) + delta;
    item.val(Math.max(newValue, 0));
    //var product_id = $('#input_quantity').val();
    $("#quantity-"+product_id.val()).val(newValue);




}
