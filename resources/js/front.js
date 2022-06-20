window.Vue = require('vue');

import Vue from 'vue';
import App from './components/App.vue';

const root = new Vue({
    el: '#root',
    render: h => h(App)
});