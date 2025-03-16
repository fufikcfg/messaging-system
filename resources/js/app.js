import { createApp } from 'vue'
import App from './src/App.vue'
import 'bootstrap/dist/css/bootstrap.css';
import Store from "./src/store/modules/index.js";
import Router from "./src/router/index.js";

createApp(App)
    .use(Store)
    .use(Router)
    .mount('#app')
