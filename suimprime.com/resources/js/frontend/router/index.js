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

// Token-only auth: rely on stored access_token
function isAuthenticated() {
    const token = localStorage.getItem('access_token');
    return !!token;
}

router.beforeEach(async (to, from, next) => {
    const auth = await isAuthenticated();
    if (to.meta?.requiresAuth && !auth) {
        return next({ name: 'Login' });
    }
    // prevent visiting login when already authenticated
    if (to.name === 'Login' && auth) {
        return next({ name: 'Home' });
    }
    next();
});

export default router;

