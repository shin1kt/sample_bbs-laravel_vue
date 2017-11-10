
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// Vue Router
import VueRouter from 'vue-router'
Vue.use(VueRouter);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('list',  require('./components/List.vue'));
Vue.component('posts',  require('./components/Posts.vue'));
Vue.component('post-form', require('./components/Form.vue'));


const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/',
      name:'home',
      component: require('./components/HomeIndex.vue')
    },
    {
      path: '/:post_id(\\d+)',
      name: 'description',
      component: require('./components/Description.vue')
    }
  ],
  scrollBehavior (to, from, savedPosition) {
    return {x:0 , y:0}
  }
});
//
// const app = new Vue({
//     el: '#app'
// });

const app = new Vue({
  router
}).$mount('#app');
