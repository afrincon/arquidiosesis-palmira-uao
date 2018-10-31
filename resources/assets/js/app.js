
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');



window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('tabla-usuarios', require('./components/TableUsersComponent.vue'));
Vue.component('tabla-iglesias', require('./components/TableIglesiasComponent.vue'));
Vue.component('tabla-beneficiarios', require('./components/TableBeneficiariosComponent.vue'));
Vue.component('tabla-ayudas', require('./components/TableAyudasComponent.vue'));
Vue.component('select-generico', require('./components/GenericSelectComponent.vue'));
Vue.component('lista-generica', require('./components/GenericDataListComponent.vue'));
Vue.component('tiles-generico', require('./components/TilesDashComponent.vue'));



const app = new Vue({
    el: '#app'
});
