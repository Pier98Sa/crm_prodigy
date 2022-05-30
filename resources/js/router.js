import Vue  from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import About from './pages/About';
import Contact from './pages/Contact';
import Products from './pages/Products';
import Home from './pages/Home';
import NotFound from './pages/NotFound';

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/about-us',
            name: 'about',
            component: About
        },
        {
            path: '/products',
            name: 'products',
            component: Products
        },
        {
            path: '/contact-us',
            name: 'contact',
            component: Contact
        },
        {
            path: '/*',
            name: 'not-found',
            component: NotFound
        }
    ],    
});

export default router