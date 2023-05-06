import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import './index.css';
import router from "./router/router.js";
import store from "./store/store.js";
import setAxiosDefaults from "./axios.js";
import '@fortawesome/fontawesome-free/css/all.css';


createApp(App)
  .use(store)
  .use(router)
  .mount('#app')

setAxiosDefaults();

