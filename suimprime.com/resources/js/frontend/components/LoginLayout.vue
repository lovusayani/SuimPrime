<template>
    <div class="login-wrapper bg-dark text-light">
        <div class="auth-header text-center py-4">
            <router-link to="/" class="d-inline-block">
                <img
                    :src="logoUrl"
                    :alt="settings.app_name || 'Logo'"
                    class="logo"
                />
            </router-link>
        </div>
        <router-view />
    </div>
</template>

<script setup>
import { ref, onMounted, computed } from "vue";
import axios from "../axios";
import {
    normalizeLogoUrl,
    cacheDarkLogo,
    readCachedDarkLogo,
    DEFAULT_DARK_LOGO,
} from "../helpers/logo";

const settings = ref({
    app_name: "SuimPrime",
    dark_logo: "/assets/logo/dark_logo.png",
});

onMounted(async () => {
    try {
        const res = await axios.get("/api/settings");
        settings.value = res.data;
        cacheDarkLogo(res?.data?.dark_logo || "");
    } catch (e) {
        console.warn("Failed to load settings in LoginLayout:", e);
        const cached = readCachedDarkLogo();
        settings.value.dark_logo = cached || DEFAULT_DARK_LOGO;
    }
});

const logoUrl = computed(() => normalizeLogoUrl(settings.value?.dark_logo));
</script>

<style scoped>
.layout-wrapper {
    /*min-height: 100vh;*/
    display: flex;
    flex-direction: column;
    background-color: #0d0d0d;
}
.auth-header .logo {
    height: 42px;
}
</style>
