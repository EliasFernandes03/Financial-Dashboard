import { createApp } from 'vue';
import Dashboard from './components/Dashboard.vue';  // Caminho relativo correto

const app = createApp({});
app.component('dashboard', Dashboard);
app.mount('#app');