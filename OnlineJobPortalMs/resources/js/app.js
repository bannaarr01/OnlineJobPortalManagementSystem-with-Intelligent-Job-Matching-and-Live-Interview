/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue').default;
var VueStarRating = require('./VueStarRating.umd.min');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */


Vue.component('apply-component', require('./components/ApplyComponent.vue').default);
Vue.component('favourite-component', require('./components/FavouriteComponent.vue').default);
Vue.component('search-component', require('./components/SearchComponent.vue').default);
Vue.component('rating-component', require('./components/RatingComponent.vue').default);
Vue.component('searchuser-component', require('./components/SearchUserComponent.vue').default);
Vue.component('star-rating', VueStarRating.default);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
