import './bootstrap';

import { createApp } from 'vue';
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"
import App from './App.vue';
import router from './router/index.js';

const app = createApp(App);


createApp(App).use(router).mount('#app');
