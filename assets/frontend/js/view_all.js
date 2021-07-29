$( document ).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    get_product();




});

function get_homepage_section(){
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'get_all_homepage_section/'+type,
        success: function (data) {

            $(".category_list_view_all").html(data);

        }
    })
}
function get_product()
{
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'get_all_product_view_all/'+type,
        success: function (data) {
            setTimeout(() => {
                $(".screen_overlay").css("display", "none");
                $("#product_list").html(data);
                get_homepage_section();//get homepage category
            }, 1000)
        }
    })
}







