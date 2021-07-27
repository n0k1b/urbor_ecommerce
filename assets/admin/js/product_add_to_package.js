$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    show_all_product();


});

function get_product_list()
{
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: '../get_all_product_list/' + package_id,
        success: function(data) {
            $("product_list").html(data);
        }
    })
}

function edit_quantity_modal(unit_quantity,id)
{
   // alert(unit_quantity+" "+id);
  //  $("#unit_quantity").val(unit_quantity);

    $("#update_product_id").val(id);
    $("#edit_quantity_modal").modal('show');
}

function update_quantity()
{
    var product_id  = $("#update_product_id").val();
    var unit_quantity = $("#update_unit_quantity").val();
   // alert(product_id);
    var formdata = new FormData();
    formdata.append('product_id', product_id);
    formdata.append('unit_quantity', unit_quantity);



    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        data: formdata,
        url: '../update-product-to-package',
        success: function(data) {
            $("#edit_quantity_modal").modal('hide');
            show_all_product();


        }
    })

}

function show_all_product()
{



    $.ajax({
        processData: false,
        contentType: false,
        type: 'get',

        url: '../get_all_package_product/' + package_id,
        success: function(data) {
            var all_data = JSON.parse(data);
            $("#all_package_product").html(all_data.section_product);
            $("#product_list").html(all_data.all_product);

        }
    })
}

function delete_product_from_package(id)
{
    var conf = confirm('Are you sure?');
    if (conf == true) {
        $.ajax({
            processData: false,
            contentType: false,
            type: 'GET',
            url: '../delete_product_from_package/' + id,
            success: function(data) {
                alert('Content Delete Successfully')
                show_all_product();
            }
        })
    }

}

function add_product_to_section()
{


    var product_id =  $('#product_id').val();
    var unit_quantity = $('#unit_quantity').val();

    var formdata = new FormData();
    formdata.append('product_id', product_id);
    formdata.append('unit_quantity', unit_quantity);
    formdata.append('package_id', package_id);


    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        data: formdata,
        url: '../add-product-to-package',
        success: function(data) {

            show_all_product();
            $("#product_id").val('');
           $("#unit_quantity").val('');

        }
    })

}
