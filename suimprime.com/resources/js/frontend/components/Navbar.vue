<template>
    <nav
        class="navbar navbar-expand-xl navbar-dark iq-navbar fixed-top py-xl-2"
        :class="{ scrolled: isScrolled }"
    >
        <div
            class="container-fluid mx-4 px-4 navbar-inner d-flex align-items-center justify-content-between w-100 landing-header"
        >
            <!-- Left Side: Logo -->
            <div class="d-flex align-items-center gap-3">
                <!-- Hamburger Icon (Visible on mobile) -->
                <button
                    class="btn btn-primary rounded-pill d-xl-none toggle-rounded-btn"
                    type="button"
                    @click="toggleMobileMenu"
                >
                    <i class="bi bi-list"></i>
                </button>

                <router-link to="/" class="navbar-brand">
                    <img
                        class="logo-normal dark-normal img-fluid logo"
                        :src="logoUrl"
                        height="30"
                        :alt="settings.app_name || 'Logo'"
                    />
                </router-link>
            </div>

            <!-- Center Menu (Desktop Only) -->
            <div
                class="collapse navbar-collapse d-none d-xl-flex justify-content-left"
                id="navbarMain"
            >
                <ul class="navbar-nav me-auto gap-xl-4">
                    <li
                        class="nav-item"
                        v-for="link in navLinks"
                        :key="link.to"
                    >
                        <router-link class="nav-link" :to="link.to">
                            {{ link.label }}
                        </router-link>
                    </li>
                </ul>
            </div>

            <!-- Right Side -->
            <div class="right-panel">
                <button
                    class="navbar-toggler d-xl-none"
                    type="button"
                    @click="toggleMobileMenu"
                >
                    <span class="navbar-toggler-btn">
                        <span class="navbar-toggler-icon"></span>
                    </span>
                </button>
                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <div
                        class="d-flex flex-md-row flex-column align-items-md-center align-items-end justify-content-end gap-xl-4 gap-0"
                    >
                        <ul
                            class="navbar-nav align-items-center list-inline justify-content-end mt-md-0 mt-3"
                        >
                            <!-- Search -->
                            <li class="flex-grow-1">
                                <div
                                    class="search-box position-relative text-end"
                                >
                                    <a
                                        href="#"
                                        class="nav-link p-0 d-md-inline-block d-none"
                                        @click.prevent="toggleSearch"
                                    >
                                        <div
                                            class="btn-icon btn-sm rounded-pill btn-action"
                                        >
                                            <span class="btn-inner">
                                                <svg
                                                    class="icon-20"
                                                    width="20"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <circle
                                                        cx="11.7669"
                                                        cy="11.7666"
                                                        r="8.98856"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    ></circle>
                                                    <path
                                                        d="M18.0186 18.4851L21.5426 22"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    ></path>
                                                </svg>
                                            </span>
                                        </div>
                                    </a>
                                    <ul
                                        v-if="showSearch"
                                        class="dropdown-menu show p-0 dropdown-search m-0 iq-search-bar"
                                        style="width: 20rem"
                                    >
                                        <li class="p-0">
                                            <div
                                                class="form-group input-group mb-0"
                                            >
                                                <button
                                                    type="submit"
                                                    class="search-submit"
                                                >
                                                    <svg
                                                        class="icon-15"
                                                        width="15"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <circle
                                                            cx="11.7669"
                                                            cy="11.7666"
                                                            r="8.98856"
                                                            stroke="currentColor"
                                                            stroke-width="1.5"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                        ></circle>
                                                        <path
                                                            d="M18.0186 18.4851L21.5426 22"
                                                            stroke="currentColor"
                                                            stroke-width="1.5"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                        ></path>
                                                    </svg>
                                                </button>
                                                <input
                                                    type="text"
                                                    class="form-control border-0"
                                                    placeholder="Search..."
                                                    v-model="searchQuery"
                                                />
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <ul
                            class="navbar-nav align-items-center mb-0 list-inline justify-content-end"
                        >
                            <!-- Subscribe Button -->
                            <li class="nav-item">
                                <router-link
                                    to="/subscription-plan"
                                    class="btn btn-warning-subtle font-size-14 text-uppercase subscribe-btn px-3"
                                >
                                    Subscribe
                                </router-link>
                            </li>

                            <!-- Notifications -->
                            <li
                                class="nav-item dropdown iq-dropdown header-notification"
                            >
                                <a
                                    class="nav-link btn-icon rounded-pill btn-action p-0"
                                    href="#"
                                    @click.prevent="toggleNotifications"
                                >
                                    <div class="iq-sub-card mb-0">
                                        <div class="notification_list">
                                            <span class="btn-inner">
                                                <i class="ph ph-bell fs-5"></i>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                                <ul
                                    v-if="showNotifications"
                                    class="p-0 sub-drop dropdown-menu dropdown-notification dropdown-menu-end show"
                                >
                                    <div
                                        class="m-0 shadow-none card bg-transparent"
                                    >
                                        <div
                                            class="card-header border-bottom p-3"
                                        >
                                            <h5 class="mb-0">
                                                Notification List
                                            </h5>
                                        </div>
                                        <div
                                            class="card-body overflow-auto card-header-border p-0 card-body-list max-17 scroll-thin"
                                        >
                                            <div
                                                class="dropdown-menu-1 overflow-y-auto list-style-1 mb-0 notification-height"
                                            >
                                                <li
                                                    class="list-unstyled dropdown-item-1 float-none p-3"
                                                >
                                                    <div
                                                        class="list-item d-flex justify-content-center align-items-center"
                                                    >
                                                        <div
                                                            class="list-style-detail ml-2 mr-2"
                                                        >
                                                            <h6
                                                                class="font-weight-bold"
                                                            >
                                                                No Notification
                                                                Found
                                                            </h6>
                                                            <p class="mb-0"></p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                    </div>
                                </ul>
                            </li>

                            <!-- User Dropdown / Login -->
                            <li
                                v-if="user"
                                class="nav-item flex-shrink-0 dropdown dropdown-user-wrapper"
                            >
                                <a
                                    class="nav-link dropdown-user"
                                    href="#"
                                    @click.prevent="
                                        showUserDropdown = !showUserDropdown
                                    "
                                    role="button"
                                    :aria-expanded="showUserDropdown"
                                >
                                    <img
                                        src="https://apps.iqonic.design/streamit-laravel/default-image/Default-Image.jpg"
                                        class="img-fluid user-image rounded-circle"
                                        alt="user image"
                                    />
                                </a>
                                <div
                                    :class="[
                                        'dropdown-menu dropdown-menu-end dropdown-user-menu border border-gray-900',
                                        { show: showUserDropdown },
                                    ]"
                                >
                                    <div
                                        class="bg-body p-3 d-flex justify-content-between align-items-center gap-3 rounded mb-4"
                                    >
                                        <div
                                            class="d-inline-flex align-items-center gap-3"
                                        >
                                            <div class="image flex-shrink-0">
                                                <img
                                                    src="https://apps.iqonic.design/streamit-laravel/default-image/Default-Image.jpg"
                                                    class="img-fluid dropdown-user-menu-image"
                                                    alt=""
                                                />
                                            </div>
                                            <div class="content">
                                                <h6 class="mb-1">
                                                    {{ user.name }}
                                                </h6>
                                                <span
                                                    class="font-size-14 dropdown-user-menu-contnet"
                                                    >{{ user.email }}</span
                                                >
                                            </div>
                                        </div>
                                        <div class="link">
                                            <router-link
                                                to="/edit-profile"
                                                class="link-body-emphasis"
                                            >
                                                <i
                                                    class="ph ph-caret-right"
                                                ></i>
                                            </router-link>
                                        </div>
                                    </div>
                                    <ul
                                        class="d-flex flex-column gap-3 list-inline m-0 p-0"
                                    >
                                        <li>
                                            <router-link
                                                to="/watch-list"
                                                class="link-body-emphasis font-size-14"
                                            >
                                                <span
                                                    class="d-flex align-items-center justify-content-between gap-3"
                                                >
                                                    <span class="fw-medium"
                                                        >My Watchlist</span
                                                    >
                                                    <i
                                                        class="ph ph-caret-right"
                                                    ></i>
                                                </span>
                                            </router-link>
                                        </li>
                                        <li>
                                            <router-link
                                                to="/edit-profile"
                                                class="link-body-emphasis font-size-14"
                                            >
                                                <span
                                                    class="d-flex align-items-center justify-content-between gap-3"
                                                >
                                                    <span class="fw-medium"
                                                        >Profile</span
                                                    >
                                                    <i
                                                        class="ph ph-caret-right"
                                                    ></i>
                                                </span>
                                            </router-link>
                                        </li>
                                        <li>
                                            <router-link
                                                to="/subscription-plan"
                                                class="link-body-emphasis font-size-14"
                                            >
                                                <span
                                                    class="d-flex align-items-center justify-content-between gap-3"
                                                >
                                                    <span class="fw-medium"
                                                        >Subscription
                                                        plans</span
                                                    >
                                                    <i
                                                        class="ph ph-caret-right"
                                                    ></i>
                                                </span>
                                            </router-link>
                                        </li>
                                        <li>
                                            <router-link
                                                to="/account-setting"
                                                class="link-body-emphasis font-size-14"
                                            >
                                                <span
                                                    class="d-flex align-items-center justify-content-between gap-3"
                                                >
                                                    <span class="fw-medium"
                                                        >Account Setting</span
                                                    >
                                                    <i
                                                        class="ph ph-caret-right"
                                                    ></i>
                                                </span>
                                            </router-link>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                @click.prevent="logout"
                                                class="link-primary font-size-14"
                                            >
                                                <span
                                                    class="d-flex align-items-center justify-content-between gap-3"
                                                >
                                                    <span class="fw-medium"
                                                        >Logout</span
                                                    >
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li v-else class="nav-item">
                                <router-link
                                    to="/login"
                                    class="btn btn-danger px-3"
                                    >Login</router-link
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Custom Overlay Menu for Mobile -->
        <transition name="fade">
            <div
                v-if="mobileMenuOpen"
                class="mobile-overlay offcanvas-backdrop"
                @click.self="closeMobileMenu"
            >
                <div class="mobile-drawer">
                    <div
                        class="drawer-header d-flex justify-content-between align-items-center"
                    >
                        <h5 class="m-0">Menu</h5>
                        <button
                            class="btn-close btn-close-white"
                            @click="closeMobileMenu"
                        ></button>
                    </div>

                    <ul class="navbar-nav mt-4">
                        <li
                            class="nav-item mb-3"
                            v-for="link in navLinks"
                            :key="link.to + '-mobile'"
                        >
                            <router-link
                                class="nav-link text-white"
                                :to="link.to"
                                @click="closeMobileMenu"
                            >
                                {{ link.label }}
                            </router-link>
                        </li>
                        <!-- Subscribe Button for Mobile -->
                        <li class="nav-item mb-3">
                            <router-link
                                to="/subscription-plan"
                                class="btn btn-warning-subtle w-100 py-2 text-uppercase"
                                @click="closeMobileMenu"
                            >
                                Subscribe
                            </router-link>
                        </li>
                    </ul>

                    <div class="mt-auto pt-4 border-top border-secondary">
                        <!-- Mobile Login / User -->
                        <div v-if="user" class="dropdown mt-2">
                            <button
                                class="btn btn-primary w-100 py-2 dropdown-toggle"
                                type="button"
                                @click.prevent="
                                    showUserDropdown = !showUserDropdown
                                "
                                :aria-expanded="showUserDropdown"
                            >
                                {{ user.name }}
                            </button>
                            <ul
                                :class="[
                                    'dropdown-menu dropdown-menu-end',
                                    { show: showUserDropdown },
                                ]"
                            >
                                <li>
                                    <button
                                        class="dropdown-item"
                                        @click="logout"
                                    >
                                        Logout
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <router-link
                            v-else
                            to="/login"
                            class="btn btn-primary w-100 py-2"
                            >Login</router-link
                        >
                    </div>
                </div>
            </div>
        </transition>
    </nav>
</template>

<script setup>
import { ref, onMounted, onUnmounted, computed } from "vue";
import { useRouter } from "vue-router";
import axios, { setAuthToken } from "../axios";
import "bootstrap-icons/font/bootstrap-icons.css";
import {
    normalizeLogoUrl,
    cacheDarkLogo,
    readCachedDarkLogo,
    DEFAULT_DARK_LOGO,
} from "../helpers/logo";

const router = useRouter();

const mobileMenuOpen = ref(false); // left drawer
const showSearch = ref(false);
const showNotifications = ref(false);
const searchQuery = ref("");
const isScrolled = ref(false);

// Dropdown state for user menu
const showUserDropdown = ref(false);
const userDropdownRef = ref(null);

// User reactive state
const user = ref(null);

// Settings state
const settings = ref({
    app_name: "SuimPrime",
    // Default fallback points to public/assets/logo which is served at /assets/logo
    dark_logo: "/assets/logo/dark_logo.png",
});

// Normalize logo URL from settings using shared helper
const logoUrl = computed(() => normalizeLogoUrl(settings.value?.dark_logo));

// Fetch settings on mount
onMounted(async () => {
    try {
        const response = await axios.get("/api/settings");
        settings.value = response.data;
        cacheDarkLogo(response?.data?.dark_logo || "");
    } catch (error) {
        console.error("Failed to load settings:", error);
        const cached = readCachedDarkLogo();
        settings.value.dark_logo = cached || DEFAULT_DARK_LOGO;
    }
});

// Fetch user from localStorage
onMounted(() => {
    const storedUser = localStorage.getItem("user");
    if (storedUser) user.value = JSON.parse(storedUser);
});

// If no user in storage, try to fetch from backend (supports cookie or token)
onMounted(() => {
    // listen for login events from Login.vue
    window.addEventListener("auth:login", (ev) => {
        const u = ev?.detail?.user;
        if (u) {
            user.value = u;
            try {
                localStorage.setItem("user", JSON.stringify(u));
            } catch (e) {}
        }
    });
});

// close dropdown when clicking outside
const handleDocumentClick = (e) => {
    const el = userDropdownRef?.value;
    if (!el) return;
    if (el.contains(e.target)) return;
    showUserDropdown.value = false;
};

onMounted(() => {
    document.addEventListener("click", handleDocumentClick);
});

onUnmounted(() => {
    document.removeEventListener("click", handleDocumentClick);
});

// Logout method: token-first, clear client state immediately, clear cookies as a fallback
const logout = async () => {
    // Call server to delete token(s). Axios will attach Authorization header if present.
    try {
        await axios.post("/logout", {}, { withCredentials: true });
    } catch (e) {
        // Ignore network errors — we'll still clear client state
        console.warn(
            "Logout request failed",
            e?.response?.status || e?.message
        );
    }

    // Immediately clear client-side token and user so UI updates without reload
    try {
        setAuthToken(null);
    } catch (e) {}
    try {
        localStorage.removeItem("access_token");
    } catch (e) {}
    try {
        localStorage.removeItem("token");
    } catch (e) {}
    try {
        localStorage.removeItem("user");
    } catch (e) {}

    user.value = null;
    showUserDropdown.value = false;

    // As a dev fallback also clear cookies client-side
    try {
        const host = window.location.hostname;
        document.cookie = `suimprime-session=; Path=/; Domain=${host}; Expires=Thu, 01 Jan 1970 00:00:00 GMT;`;
        document.cookie = `XSRF-TOKEN=; Path=/; Domain=${host}; Expires=Thu, 01 Jan 1970 00:00:00 GMT;`;
    } catch (e) {}

    try {
        window.dispatchEvent(new CustomEvent("auth:logout"));
    } catch (e) {}

    // Navigate to Login immediately (no full reload)
    router.push({ name: "Login" });

    // Verify server-side session cleared; if still authenticated, try extra cookie clears and reload
    try {
        const me = await axios.get("/me");
        if (me?.data) {
            // server still returns a user — attempt more aggressive cookie clearing and reload
            try {
                const host = window.location.hostname;
                // common variants
                const domains = [
                    host,
                    "." + host,
                    window.location.hostname.replace(/^www\./, ""),
                ];
                const paths = ["/", ""];
                for (const d of domains) {
                    for (const p of paths) {
                        try {
                            document.cookie = `suimprime-session=; Path=${p}; Domain=${d}; Expires=Thu, 01 Jan 1970 00:00:00 GMT;`;
                        } catch (e) {}
                        try {
                            document.cookie = `XSRF-TOKEN=; Path=${p}; Domain=${d}; Expires=Thu, 01 Jan 1970 00:00:00 GMT;`;
                        } catch (e) {}
                    }
                }
            } catch (e) {}

            // force reload to ensure server session state is reflected
            window.location.reload();
        }
    } catch (e) {
        // expected: 401 or network failure means session cleared
    }
};

// Navbar methods
const toggleSearch = () => (showSearch.value = !showSearch.value);
const toggleNotifications = () =>
    (showNotifications.value = !showNotifications.value);
const toggleMobileMenu = () => (mobileMenuOpen.value = !mobileMenuOpen.value);
const closeMobileMenu = () => (mobileMenuOpen.value = false);

const handleScroll = () => {
    isScrolled.value = window.scrollY > 50;
};

onMounted(() => {
    window.addEventListener("scroll", handleScroll);
});
onUnmounted(() => {
    window.removeEventListener("scroll", handleScroll);
});

const navLinks = [
    { to: "/", label: "Home" },
    { to: "/movies", label: "Movies" },
    { to: "/tv-shows", label: "TV Shows" },
    { to: "/videos", label: "Videos" },
    { to: "/comingsoon", label: "Coming Soon" },
    { to: "/livetv", label: "Live TV" },
];
</script>

<style scoped>
/* ---------- Updated styles for new navbar design ---------- */
.offcanvas {
    background-color: #000 !important;
    color: white;
    width: 70% !important;
}
.offcanvas-backdrop.show {
    background-color: rgba(0, 0, 0, 0.85) !important;
}
.navbar {
    background: transparent;
    transition: background-color 0.4s ease, box-shadow 0.4s ease;
    z-index: 999;
    backdrop-filter: blur(10px);
}
.navbar.scrolled {
    background: rgba(0, 0, 0, 0.95);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(6px);
}
.nav-link {
    color: #bbb !important;
    font-weight: 500;
    transition: color 0.3s ease;
}
.nav-link:hover,
.nav-link.router-link-active {
    color: #fff !important;
}
.logo {
    height: 40px;
}
.btn-action {
    background: transparent;
    border: none;
    color: #fff;
}
.btn-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.5rem;
}
.icon-20 {
    width: 20px;
    height: 20px;
}
.icon-15 {
    width: 15px;
    height: 15px;
}
.dropdown-search {
    position: absolute;
    top: 120%;
    right: 0;
    background: #222;
    padding: 0;
    border-radius: 8px;
    min-width: 20rem;
    z-index: 10;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
}
.dropdown-search input {
    background: #333;
    border: none;
    color: white;
    padding: 0.75rem 1rem;
}
.dropdown-search input:focus {
    outline: none;
    box-shadow: none;
}
.search-submit {
    background: transparent;
    border: none;
    padding: 0.5rem 1rem;
    color: #999;
    cursor: pointer;
}
.dropdown-notification {
    position: absolute !important;
    top: 100% !important;
    right: 0 !important;
    min-width: 350px;
    max-height: 400px;
    background: #1a1a1a !important;
    border: 1px solid #333 !important;
    border-radius: 8px;
    margin-top: 0.5rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
    z-index: 1050;
}
.dropdown-notification .card {
    background: #1a1a1a !important;
    color: #fff !important;
}
.dropdown-notification .card-header {
    background: #222 !important;
    border-bottom: 1px solid #333 !important;
}
.dropdown-notification .card-header h5 {
    color: #fff !important;
}
.dropdown-notification .card-body {
    background: #1a1a1a !important;
}
.dropdown-notification h6 {
    color: #fff !important;
}
.notification-height {
    max-height: 300px;
}
.dropdown-user-wrapper {
    position: relative;
}
.dropdown-user-menu {
    position: absolute !important;
    top: 100% !important;
    right: 0 !important;
    min-width: 320px;
    background: #1a1a1a !important;
    padding: 1rem;
    border-radius: 8px;
    margin-top: 0.5rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
    z-index: 1050;
}
.dropdown-user-menu h6 {
    color: #fff !important;
}
.dropdown-user-menu-image {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
}
.dropdown-user-menu-contnet {
    color: #aaa !important;
}
.user-image {
    width: 40px;
    height: 40px;
    border: 2px solid #e50914;
    cursor: pointer;
}
.font-size-14 {
    font-size: 14px;
    color: #fff !important;
}
.link-body-emphasis {
    color: #fff !important;
    text-decoration: none;
}
.link-body-emphasis:hover {
    color: #e50914 !important;
}
.link-primary {
    color: #e50914 !important;
    text-decoration: none;
}
.link-primary:hover {
    color: #ff1a1a !important;
}
.bg-body {
    background-color: #222 !important;
}
.border-gray-900 {
    border-color: #333 !important;
}
.fw-medium {
    color: #fff !important;
}
.btn-warning-subtle {
    background-color: rgba(255, 193, 7, 0.1);
    color: #ffc107;
    border: 1px solid rgba(255, 193, 7, 0.3);
    font-weight: 600;
    transition: all 0.3s ease;
}
.btn-warning-subtle:hover {
    background-color: #ffc107;
    color: #000;
    border-color: #ffc107;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(255, 193, 7, 0.3);
}
.subscribe-btn {
    padding: 0.5rem 1.25rem;
    font-size: 12px;
    letter-spacing: 0.5px;
}
.navbar-toggler {
    border: none;
    padding: 0.5rem;
}
.navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.85%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}
.mobile-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.8);
    z-index: 2000;
    display: flex;
    justify-content: flex-start;
}
.mobile-drawer {
    width: 70%;
    max-width: 300px;
    height: 100%;
    background: #111;
    color: white;
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease-in-out;
    animation: slideIn 0.3s ease forwards;
}
.drawer-header h5 {
    color: #fff;
}
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
@keyframes slideIn {
    from {
        transform: translateX(-100%);
    }
    to {
        transform: translateX(0);
    }
}

@media (max-width: 1199px) {
    .right-panel .navbar-collapse {
        display: none !important;
    }
}
@media (min-width: 1200px) {
    .right-panel .navbar-collapse {
        display: flex !important;
    }
}
</style>
