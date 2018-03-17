require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'
import 'vue-loaders/dist/vue-loaders.css';
import * as VueLoaders from 'vue-loaders';
import Velocity from 'velocity-animate'

Vue.use(VueChatScroll)
Vue.use(VueLoaders);
Vue.component('ChatPanel', require('./components/ChatPanel.vue'));
Vue.component('ContactPanel', require('./components/ContactPanel.vue'));
Vue.component('SelectedFriendsPanel', require('./components/SelectedFriendsPanel.vue'));

window.Velocity = window.velocity = Velocity