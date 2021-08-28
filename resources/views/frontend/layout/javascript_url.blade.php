<script>
    let get_all_category_url = '{{route("get_all_category")}}';
    let get_all_category_mobile_url = '{{route("get_all_category_mobile")}}';
    let get_cart_box_url =  '{{route("get_cart_box")}}';
    let get_cart_count_url  = '{{route("get_cart_count")}}';
    let search_product_url = '{{route("search_product")}}';
    let cart_add_url = '{{route("cart_add")}}';
    let cart_add_package_url = '{{route("cart_add_package")}}';
    let checkout_url = '{{route("checkout")}}';

    function image_asset(image)
    {

        var image_url = '{{ asset('') }}/'+image;
        return image_url;
    }


</script>
