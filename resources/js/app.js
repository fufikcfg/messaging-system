import { createApp } from 'vue'
import App from './src/App.vue'
import 'bootstrap/dist/css/bootstrap.css';
import Router from "./src/router/index.js";

createApp(App)
    .use(Router)
    .mount('#app')
