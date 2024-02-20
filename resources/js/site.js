import './bootstrap';

import { createApp } from 'vue'

import SiteShopCart from "./components/site/shop/SiteShopCart.vue";


const app = createApp({});
app.component('site-shop-cart', SiteShopCart);
app.mount('#app');
