<template>
                    <div class="sidebar__category">
                                <div class="sidebar__title">ALL CATEGORIES</div>
                                <ul class="menu--mobile">


                                    <!-- <li v-for="category in categories" :key="category.id"  class="category-item">

                                         <a v-if="category.subcategory.id" href="shop-categories.html">{{ category.name }}</a>
                                         </li> -->


                                    <li v-for="category in categories" :key="category.id"  class="menu-item-has-children category-item "><a href="#">{{ category.name }}</a><span class="sub-toggle"><i v-show="category.sub_category.length>0" class="icon-chevron-down"></i></span>

                                        <ul class="sub-menu">
                                            <li v-for="sub_category in category.sub_category" :key="sub_category.id"> <a @click="fetchProduct(sub_category.id,'sub')">{{ sub_category.name }}</a>
                                            </li>

                                        </ul>
                                    </li>

                                </ul>
                            </div>
</template>


<script>

export default {

    data() {
            return {
              
                all_category:[]
            }
        },

        
       

        created() {
           
            this.getCategoryFromApi();
           // this.all_category =  this.categories();
           //console.log(  this.all_category)
           
        },

        computed:{
        categories()
            {
                //alert(this.$store.getters.getCategories+"hello");
              return this.$store.getters.getCategories; 
            
            },
           
        },
        

        methods:{
            
            getCategoryFromApi()
            {
                 this.axios
            .get('http://localhost/urbor_ecommerce/api/fetch_category/')
            .then(response => {
                this.$store.commit("getCategoriesFromApi", response.data);
            });
              
            },

            fetchProduct(id,type)
            {
                const data = {id:id,type:type};
                
                 this.axios
            .post('http://localhost/urbor_ecommerce/api/fetch_product',data)
            .then(response => {
                //console.log(response.data)
                this.$store.commit("fetch_product", response.data);
            });
                    
                 //this.$store.commit("fetch_product");
            }

            



		},





  }
</script>
