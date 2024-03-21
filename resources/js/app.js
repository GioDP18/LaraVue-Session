import './bootstrap';
import 'bootstrap/dist/css/bootstrap.css'
import { createApp } from 'vue';
import app from './Components/App.vue';
import router from './Routes/router.js';

createApp(app)
.use(router)
.mount('#app')

import 'bootstrap/dist/js/bootstrap.js';
