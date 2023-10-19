import './bootstrap';

import { createApp } from 'vue'

import App from './App.vue'
import axios from 'axios'
import router from './router'
import Vuelidate from "@vuelidate/core";

import AlertError from "./components/assets/AlertError.vue";
import Preloader from "./components/assets/Preloader.vue";
import FormEditor from "./components/assets/form/FormEditor.vue"; //Визуальный редактор

const app = createApp(App,App);
app.config.globalProperties.$axios = axios;


app.use(router);
app.use(Vuelidate);
app.component('preloader',Preloader);
app.component('alert-error',AlertError);
app.component('form-editor',FormEditor);
app.mount('#app');
