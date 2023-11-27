import './bootstrap';
import { createApp } from 'vue';

import Login from './components/Login.vue';
import UsersTable from './components/Users.vue';

const app = createApp({});

    app.component('login-form', Login);
    app.component('user-table', UsersTable);
app.mount("#app");