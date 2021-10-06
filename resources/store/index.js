import Vue from 'vue';
import Vuex from 'vuex';
//import VueAxios from 'vue-axios';


Vue.use(Vuex);

const store = new Vuex.Store({
    state:{
        categories: [],
        products:[]
    },
    getters:{
        getCategories:state => { 
            return state.categories;
           
        },
        getProducts:state => { 

            alert('hello')
            return state.products;
           
        }   
    },
    mutations:{
        getCategoriesFromApi(state,payload)
        {
         
           state.categories = payload;
        },
        fetch_product(state,payload)
        {
           
           state.products = payload;
        }

    },
    actions:{

    }
});
export default store;