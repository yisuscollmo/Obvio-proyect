import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import axios from "axios";
import VueAxios from "vue-axios";

axios.defaults.baseURL = "http://127.0.0.1:8000";
// localStorage.clear();



createApp(App)
.use(router)
.use(VueAxios, axios)
.mount("#app")
