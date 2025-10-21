import { createRouter, createWebHistory } from 'vue-router';
import DefaultLayout from '../components/PageLayout.vue';
import BlankLayout from '../components/LoginLayout.vue';

import Login from "../pages/Login.vue";
import Home from "../pages/Home.vue";
import SignUp from "../pages/SignUp.vue";
import Landing from '../pages/Landing.vue';
import About from '../pages/About.vue';
import Movies from '../pages/Movies.vue';

const routes = [
    {
        path: '/',
        component: DefaultLayout,
        children: [
            { path: '', name: 'Landing', component: Landing },  // Default landing page
            { path: '/home', name: 'Home', component: Home, meta: { requiresAuth: true } },    // /home route
            { path: '/about', name: 'About', component: About },
            { path: '/movies', name: 'Movies', component: Movies },
        ],
    },
    {
        path: '/',
        component: BlankLayout,
        children: [
            { path: 'login', name: 'Login', component: Login },
            { path: "signup", name: "SignUp", component: SignUp },
        ],
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

// Simple auth guard using token in localStorage
router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('token');
    if (to.meta?.requiresAuth && !token) {
        return next({ name: 'Login' });
    }
    // prevent visiting login when already authenticated
    if (to.name === 'Login' && token) {
        return next({ name: 'Home' });
    }
    next();
});

export default router;

