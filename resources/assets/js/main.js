require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuetify from 'vuetify';

Vue.use(Vuetify);
Vue.use(VueRouter);

import App from './App.vue'
import store from './store';
import routes from './router';

Vue.component('navigation', require('./components/Navigation.vue').default);

const app = new Vue({
  el: '#app',
  vuetify: new Vuetify(),
  store,
  router: new VueRouter(routes),
  components: {
    App,
  },
  render: h => h(App)
})
