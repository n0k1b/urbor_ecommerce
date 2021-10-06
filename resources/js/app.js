require('./bootstrap');
global.$ = global.jQuery = require('jquery');
import Vue from 'vue'
import Router from 'vue-router'
import VueAxios from 'vue-axios';
import store from '../store/index'

import App from '../component/App';
import category_sidebar from '../component/category_sidebar';
import result_content from '../component/result_content';
Vue.use(Router);
Vue.use(VueAxios, axios);
Vue.component('mainapp',App);
Vue.component('categorySidebar',category_sidebar);
Vue.component('resultContent',result_content);

const app = new Vue({
    el: '#app',
    store,
    render: h => h(App)
});

