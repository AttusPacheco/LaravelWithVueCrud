import { createApp } from 'vue'
import { createRouter, createWebHashHistory } from 'vue-router'
import axios from 'axios'
import VueAxios from 'vue-axios'

import App from './template/app.vue';
import {routes} from './routes';

const router = createRouter({history: createWebHashHistory(), routes})

export default createApp(App)
    .use(router)
    .use(VueAxios, axios)
    .mount('#app')
