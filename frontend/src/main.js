import { createApp } from 'vue';
import { createPinia } from 'pinia';
import App from './App.vue';
import router from './router';
import axios from 'axios';

import { ApiService } from './utils/ApiService';
ApiService.init();
ApiService.setHeader();

const app = createApp(App);

app.use(createPinia());
app.use(router);

app.mount('#app');
