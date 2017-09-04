
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

// Vue.component('example', require('./components/Example.vue'));
Vue.component('list-tasks', require('./components/ListTasks.vue'));
Vue.component('template-item', require('./components/Template.vue'));

const app = new Vue({
  el: '#app'
});

$(document).ready(function() {
  $(".js-open-form").click(function() {
  	$(this).toggleClass("questions__step--active");
    $(this).next(".js-open-form-pan").slideToggle();
  });
});
