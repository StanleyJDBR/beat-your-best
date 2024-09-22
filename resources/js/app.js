import { createApp } from 'vue';
import HomePage from './components/HomePage.vue';
import LoginPage from './components/LoginPage.vue';
import RegisterPage from './components/RegisterPage.vue';
import OpenStatus from './components/Status.vue';

const app = createApp({});
app.component('OpenStatus', OpenStatus)

const currentPath = window.location.pathname;

if (currentPath === '/') {
    app.component('homepage', HomePage);
} else if (currentPath === '/login') {
    app.component('loginpage', LoginPage);
} else if (currentPath === '/register') {
    app.component('registerpage', RegisterPage);
}

app.mount('#app');
