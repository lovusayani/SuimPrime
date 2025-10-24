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
            <div class="d-flex align-items-center gap-3">
                <!-- Mobile hamburger instead of actions -->
                <button
                    v-if="!mobileMenuOpen"
                    class="btn btn-action text-light d-xl-none"
                    @click="toggleMobileMenu"
                >
                    <i class="bi bi-list fs-3"></i>
                </button>

                <!-- Desktop actions -->
                <div class="d-none d-xl-flex align-items-center gap-3">
                    <!-- Search -->
                    <div class="search-box position-relative">
                        <button
                            class="btn btn-sm btn-action text-light"
                            @click="toggleSearch"
                        >
                            <i class="bi bi-search fs-5"></i>
                        </button>
                        <div v-if="showSearch" class="dropdown-search">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Search..."
                                v-model="searchQuery"
                            />
                        </div>
                    </div>

                    <!-- Notifications -->
                    <button class="btn btn-sm btn-action text-light">
                        <i class="bi bi-bell fs-5"></i>
                    </button>

                    <!-- User / Login -->
                    <div v-if="user" class="dropdown" ref="userDropdownRef">
                        <button
                            class="btn btn-danger px-3 dropdown-toggle"
                            type="button"
                            id="userMenuButton"
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
                            aria-labelledby="userMenuButton"
                        >
                            <li>
                                <button class="dropdown-item" @click="logout">
                                    Logout
                                </button>
                            </li>
                        </ul>
                    </div>
                    <router-link v-else to="/login" class="btn btn-danger px-3"
                        >Login</router-link
                    >
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
/* ---------- No design changes, kept your original styles ---------- */
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
}
.dropdown-search {
    position: absolute;
    top: 120%;
    right: 0;
    background: #222;
    padding: 0.5rem;
    border-radius: 8px;
    width: 200px;
    z-index: 10;
}
.dropdown-search input {
    background: #333;
    border: none;
    color: white;
}
.dropdown-search input:focus {
    outline: none;
    box-shadow: none;
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
</style>
