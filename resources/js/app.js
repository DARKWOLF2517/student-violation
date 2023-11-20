import './bootstrap';
import { createApp } from 'vue';

import Login from './components/Login.vue';

const app = createApp({});

    app.component('login-form',Login);
app.mount("#app");