import './../bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css'
import "bootstrap-icons/font/bootstrap-icons.css";
import 'swiper/css'
import { createApp } from 'vue';
import router from './router/index.js';
import App from './components/App.vue';

const app = createApp(App);
app.use(router);
app.mount('#frontend-app');

console.log('✅ LMAX Frontend mounted');
