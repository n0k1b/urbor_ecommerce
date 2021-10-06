<template>
                        <div class="">
                                <div class="row">
                                    <div v-for="product in products" :key="product.id" class="col-6 col-md-4 col-lg-3 p-0" style="height: 422px">
                                            <div class="ps-product--standard"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/03-Bakery/03_1a.jpg" alt="alt" /></a><a class="ps-product__expand" href="javascript:void(0);" data-toggle="modal" data-target="#popupQuickview"><i class="icon-expand"></i></a>
                                                <div class="ps-product__content">
                                                    <p class="ps-product__type"><i class="icon-store"></i>Shannan Yu</p>
                                                    <h5><a class="ps-product__name" href="product-default.html">{{ product.name }}</a></h5>
                                                    <p class="ps-product__unit">250g</p>

                                                    <p class="ps-product-price-block"><span class="ps-product__price-default">$15.90</span>
                                                    </p>
                                                </div>
                                                <div class="ps-product__footer">
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                        <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                                        <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                                    </div>

                                                    <button class="ps-product__addcart" data-toggle="modal" data-target="#popupAddToCart"><i class="icon-cart"></i>Add to cart</button>

                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </div>
</template>

<script>

export default ({
    data()
    {
       return {
              
                //products:[]
            }
    },
    methods:{
        fetch_product()
        {
            alert('hello')
        }
    },
    created()
    {
         //this.$root.$refs.compname_component = this;
    },

    computed:{
         products()
            {
                return this.$store.getters.getProducts; 
            }
    },  
    methods:{
       
    }
})
</script>

