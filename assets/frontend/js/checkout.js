$( document ).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     get_all_address();



});

function get_all_address()
{
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'get_all_address',
        success: function (data) {

            $("#address_list").html(data);
        }
    })
}

function show_address_modal()
{
    $("#add_address").modal('show');
}

function edit_address_modal(id)
{
    $("#hidden_id").val(id);
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'edit_address/'+id,
        success: function (data) {

            var datas = JSON.parse(data);

            $("#edit_address_type").val(datas.address_type);
            $("#edit_address_name").val(datas.address);
            $("#edit_contact_no").val(datas.contact_no);
            $("#edit_address").modal('show');
        }
    })

}

function submit_order()
{
    var radioValue = $("input[name='address_id']:checked").val();
    if(radioValue){
        alert("Your are a - " + radioValue);
    }
}
function delete_address(id)
{
    var conf = confirm('Are you sure?');
    if(conf == true)
    {
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'delete_address/'+id,
        success: function (data) {
            alert('Address Deleted Successfully');
            get_all_address();

        }
    })
}
}

function edit_address()
{
    var address_type = $("#edit_address_type").val();
    var address = $("#edit_address_name").val();
    var contact_no = $("#edit_contact_no").val();

    var area_id = $("#edit_area_id option:selected").val();
  //  alert(area_id);

   var formdata = new FormData();
   formdata.append('id',$("#hidden_id").val());
   formdata.append('area_id',area_id);
   formdata.append('address_type',address_type);
   formdata.append('address',address);
   formdata.append('contact_no',contact_no);



    $.ajax({
    processData: false,
    contentType: false,
    type: 'POST',
    url: 'update_address',
    data:formdata,
    success: function (data) {
        $("#edit_address").modal('hide');

        get_all_address();



    }
})
}


function add_address()
{
    var address_type = $("#address_type").val();
    var address = $("#address").val();
    var contact_no = $("#contact_no").val();

    var area_id = $("#area_id option:selected").val();
  //  alert(area_id);

   var formdata = new FormData();
   formdata.append('area_id',area_id);
   formdata.append('address_type',address_type);
   formdata.append('address',address);
   formdata.append('contact_no',contact_no);



    $.ajax({
    processData: false,
    contentType: false,
    type: 'POST',
    url: 'add_address',
    data:formdata,
    success: function (data) {
        get_all_address();
        $("#add_address").modal('hide');



    }
})
}

