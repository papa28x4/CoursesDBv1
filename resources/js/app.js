/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import router from './router';
import store from './store';
import common from './common';
import ViewUI from 'view-design';
import 'view-design/dist/styles/iview.css';

Vue.use(ViewUI);
Vue.mixin(common);
router.beforeEach((to, from, next) => {
    document.title = 'CoursesDB | ' + to.meta.title

    next()
});
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('app', require('./components/App.vue').default);



store.dispatch("fetchCurrentUser").then(response => {
    console.log("Got some data, now lets show something in this component", response)
    const app = new Vue({
        el: '#app',
        router,
        store
    });
    // console.log("Got some data, now lets show something in this component", response.status)
    // if(response.status !== 200){
    //     this.$router.replace('/login')
    // }
    // TODO: stop the ajax spinner, loading is done at this point.
}, error => {
    console.error("Got nothing from server. Prompt user to check internet connection and try again")
})



