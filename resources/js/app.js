import './bootstrap';
import { createApp } from 'vue';

import Login from './components/Login.vue';
import UsersTable from './components/Users.vue';
import ViolationList from './components/ViolationList.vue';

const app = createApp({});

    app.component('login-form', Login);
    app.component('user-table', UsersTable);
    app.component('violation-list', ViolationList);
app.mount("#app");