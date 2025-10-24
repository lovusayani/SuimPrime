<template>
    <div class="layout-wrapper bg-dark text-light">
        <!-- Navbar -->
        <Navbar />

        <!-- Page Content -->
        <main class="main-content">
            <router-view />
        </main>

        <!-- Footer -->
        <footer class="footer">
            <div class="footer-top">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Logo and Description -->
                        <div class="col-xxl-2 col-xl-2 col-sm-6">
                            <div class="footer-logo mb-4">
                                <div class="logo-default">
                                    <router-link
                                        class="navbar-brand text-primary"
                                        to="/"
                                    >
                                        <img
                                            class="img-fluid logo"
                                            :src="logoDarkUrl"
                                            :alt="settings.app_name || 'Logo'"
                                        />
                                    </router-link>
                                </div>
                            </div>
                            <span class="font-size-14">
                                {{
                                    settings.short_description ||
                                    "SuimPrime: Your Ultimate Destination for Unlimited Movies and Shows!"
                                }}
                            </span>

                            <div class="mt-5">
                                <p class="mb-2 font-size-14">
                                    Email us:
                                    <a
                                        :href="
                                            'mailto:' + settings.inquriy_email
                                        "
                                        class="link-body-emphasis"
                                        >{{ settings.inquriy_email }}</a
                                    >
                                </p>
                                <p class="m-0 font-size-14">
                                    Helpline number:
                                    <a
                                        :href="
                                            'tel:' + settings.helpline_number
                                        "
                                        class="link-body-emphasis fw-medium"
                                        >{{ settings.helpline_number }}</a
                                    >
                                </p>
                            </div>
                        </div>

                        <!-- Premium Shows -->
                        <div class="col-xxl-2 col-xl-2 col-sm-6 mt-sm-0 mt-5">
                            <h4 class="footer-title font-size-18 mb-5">
                                Premium shows
                            </h4>
                            <ul class="list-unstyled footer-menu">
                                <li
                                    class="mb-3"
                                    v-for="show in premiumShows"
                                    :key="show.id"
                                >
                                    <router-link
                                        :to="'/tvshow-details/' + show.id"
                                        >{{ show.title }}</router-link
                                    >
                                </li>
                            </ul>
                        </div>

                        <!-- Based on IMDB Rating -->
                        <div class="col-xxl-2 col-xl-2 col-sm-6 mt-xl-0 mt-5">
                            <h4 class="footer-title font-size-18 mb-5">
                                Based on IMDB Rating
                            </h4>
                            <ul class="list-unstyled footer-menu">
                                <li
                                    class="mb-3"
                                    v-for="movie in topMovies"
                                    :key="movie.id"
                                >
                                    <router-link
                                        :to="'/movie-details/' + movie.id"
                                        >{{ movie.title }}</router-link
                                    >
                                </li>
                            </ul>
                        </div>

                        <!-- Useful Links -->
                        <div class="col-xxl-3 col-xl-3 col-sm-6 mt-xl-0 mt-5">
                            <h4 class="footer-title font-size-18 mb-5">
                                Useful links
                            </h4>
                            <ul
                                class="list-unstyled footer-menu column-count-2"
                            >
                                <li class="mb-3">
                                    <router-link to="/privacy-policy"
                                        >Privacy Policy</router-link
                                    >
                                </li>
                                <li class="mb-3">
                                    <router-link to="/terms-conditions"
                                        >Terms & Conditions</router-link
                                    >
                                </li>
                                <li class="mb-3">
                                    <router-link to="/help-and-support"
                                        >Help and Support</router-link
                                    >
                                </li>
                                <li class="mb-3">
                                    <router-link
                                        to="/refund-and-cancellation-policy"
                                        >Refund and Cancellation
                                        Policy</router-link
                                    >
                                </li>
                                <li class="mb-3">
                                    <router-link to="/data-deletation-request"
                                        >Data Deletion Request</router-link
                                    >
                                </li>
                                <li class="mb-3">
                                    <router-link to="/about"
                                        >About Us</router-link
                                    >
                                </li>
                                <li class="mb-3">
                                    <router-link to="/faq">FAQ</router-link>
                                </li>
                            </ul>
                        </div>

                        <!-- Download App -->
                        <div class="col-xxl-3 col-xl-3 col-sm-6 mt-xl-0 mt-5">
                            <h4 class="footer-title font-size-18 mb-5">
                                Download Our App
                            </h4>
                            <p class="mb-5">
                                Download our app for instant access to the best
                                movies and shows!
                            </p>

                            <ul
                                class="app-icon list-inline m-0 p-0 d-flex align-items-center gap-3"
                            >
                                <li v-if="settings.playstore_url">
                                    <a
                                        :href="settings.playstore_url"
                                        class="btn btn-link p-0"
                                        target="_blank"
                                    >
                                        <img
                                            :src="playStoreImage"
                                            alt="play store"
                                            class="img-fluid"
                                            onerror="this.style.display='none'"
                                        />
                                    </a>
                                </li>
                                <li v-if="settings.appstore_url">
                                    <a
                                        :href="settings.appstore_url"
                                        class="btn btn-link p-0"
                                        target="_blank"
                                    >
                                        <img
                                            :src="appStoreImage"
                                            alt="app store"
                                            class="img-fluid"
                                            onerror="this.style.display='none'"
                                        />
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container-fluid">
                    <div class="text-center">
                        © 2025
                        <span class="text-primary">{{
                            settings.app_name || "SuimPrime"
                        }}</span
                        >. All Rights Reserved.
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script setup>
import { ref, onMounted, computed } from "vue";
import Navbar from "../components/Navbar.vue";
import axios from "axios";
import {
    normalizeLogoUrl,
    cacheDarkLogo,
    readCachedDarkLogo,
    DEFAULT_DARK_LOGO,
} from "../helpers/logo";

const settings = ref({
    app_name: "SuimPrime",
    dark_logo: "/assets/logo/dark_logo.png",
    short_description:
        "SuimPrime: Your Ultimate Destination for Unlimited Movies and Shows!",
    inquriy_email: "hello@suimprime.com",
    helpline_number: "+1234567890",
    playstore_url: "",
    appstore_url: "",
});

const premiumShows = ref([]);
const topMovies = ref([]);

// Computed properties for images to avoid Vite processing them
const playStoreImage = computed(() => "/assets/logo/play_store.png");
const appStoreImage = computed(() => "/assets/logo/app_store.png");

// Normalize logo URL using shared helper
const logoDarkUrl = computed(() => normalizeLogoUrl(settings.value?.dark_logo));

onMounted(async () => {
    try {
        // Fetch settings
        const settingsResponse = await axios.get("/api/settings");
        settings.value = settingsResponse.data;
        cacheDarkLogo(settingsResponse?.data?.dark_logo || "");

        // Fetch premium shows (you can adjust the API endpoint)
        const showsResponse = await axios.get("/api/premium-shows?limit=4");
        premiumShows.value = showsResponse.data.data || [];

        // Fetch top movies (you can adjust the API endpoint)
        const moviesResponse = await axios.get("/api/top-movies?limit=4");
        topMovies.value = moviesResponse.data.data || [];
    } catch (error) {
        console.error("Error loading footer data:", error);
        // Fallbacks if API fails
        const cached = readCachedDarkLogo();
        settings.value.dark_logo = cached || DEFAULT_DARK_LOGO;
    }
});
</script>

<style scoped>
.layout-wrapper {
    /*min-height: 100vh;*/
    display: flex;
    flex-direction: column;
    background-color: #0d0d0d;
}

.main-content {
    flex: 1;
    overflow-x: hidden;
}

/* Footer */
.footer {
    background: #111;
    color: #aaa;
    border-top: 1px solid rgba(255, 255, 255, 0.05);
}

.footer-top {
    padding: 4rem 0 2rem;
}

.footer-logo .logo {
    max-height: 50px;
}

.footer-title {
    color: #fff;
    font-weight: 600;
}

.font-size-14 {
    font-size: 0.875rem;
}

.font-size-18 {
    font-size: 1.125rem;
}

.footer-menu {
    padding-left: 0;
}

.footer-menu li {
    list-style: none;
}

.footer-menu a {
    color: #aaa;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-menu a:hover {
    color: #fff;
}

.link-body-emphasis {
    color: #fff;
    text-decoration: none;
}

.link-body-emphasis:hover {
    color: #e50914;
}

.column-count-2 {
    column-count: 2;
    column-gap: 1rem;
}

.app-icon img {
    max-width: 150px;
    transition: transform 0.3s ease;
}

.app-icon img:hover {
    transform: translateY(-5px);
}

.footer-bottom {
    padding: 1.5rem 0;
    border-top: 1px solid rgba(255, 255, 255, 0.05);
    text-align: center;
}

.text-primary {
    color: #e50914 !important;
}

.fw-medium {
    font-weight: 500;
}

/* Responsive */
@media (max-width: 767px) {
    .footer-top {
        padding: 2rem 0 1rem;
    }

    .column-count-2 {
        column-count: 1;
    }
}
</style>
