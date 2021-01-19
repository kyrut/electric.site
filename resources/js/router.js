import vueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(vueRouter);

import Index from './components/views/index';
import Contact from './components/views/contact';

const routes = [
    {
        path: '/',
        component: Index
    },
    {
        path: '/contact',
        component: Contact
    }
];

export default new vueRouter({
    mode: "history",
    routes
});
