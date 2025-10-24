import { createRouter, createWebHistory } from 'vue-router';
import DefaultLayout from '../components/PageLayout.vue';
import BlankLayout from '../components/LoginLayout.vue';

import Login from "../pages/Login.vue";
import Home from "../pages/Home.vue";
import SignUp from "../pages/SignUp.vue";
import Landing from '../pages/Landing.vue';
import About from '../pages/About.vue';
import Movies from '../pages/Movies.vue';
import PrivacyPolicy from '../pages/PrivacyPolicy.vue';
import HelpAndSupport from '../pages/HelpAndSupport.vue';
import TermsConditions from '../pages/TermsConditions.vue';
import DataDeletionRequest from '../pages/DataDeletionRequest.vue';
import RefundCancellationPolicy from '../pages/RefundCancellationPolicy.vue';
import FAQ from '../pages/FAQ.vue';

const routes = [
    {
        path: '/',
        component: DefaultLayout,
        children: [
            { path: '', name: 'Landing', component: Landing },  // Default landing page
            { path: '/home', name: 'Home', component: Home, meta: { requiresAuth: true } },    // /home route
            { path: '/about', name: 'About', component: About },
            { path: '/movies', name: 'Movies', component: Movies },
            { path: '/privacy-policy', name: 'PrivacyPolicy', component: PrivacyPolicy },
            { path: '/help-and-support', name: 'HelpAndSupport', component: HelpAndSupport },
            { path: '/terms-conditions', name: 'TermsConditions', component: TermsConditions },
            { path: '/data-deletation-request', name: 'DataDeletionRequest', component: DataDeletionRequest },
            { path: '/refund-and-cancellation-policy', name: 'RefundCancellationPolicy', component: RefundCancellationPolicy },
            { path: '/faq', name: 'FAQ', component: FAQ },
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

