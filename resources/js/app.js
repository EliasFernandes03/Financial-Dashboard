import '../css/app.css';
import { createApp } from 'vue';
import Dashboard from './components/Dashboard.vue';

const app = createApp({});
app.component('dashboard', Dashboard);
app.mount('#app');
