<template>
    <FrontendLayout>
        <div class="container py-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="mb-0">
                        Welcome back, {{ user?.name || "Viewer" }}!
                    </h2>
                    <p class="text-muted">
                        Enjoy your personalized recommendations.
                    </p>
                </div>

                <div class="d-flex gap-2">
                    <button
                        v-if="user"
                        class="btn btn-outline-secondary"
                        @click="goToProfile"
                    >
                        <i class="bi bi-person-circle"></i> Profile
                    </button>
                    <button v-if="user" class="btn btn-danger" @click="logout">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                    <a
                        v-else
                        class="btn btn-primary"
                        :href="router.resolve({ name: 'Login' }).href"
                        >Sign in</a
                    >
                </div>
            </div>

            <div v-if="loading" class="text-center py-5">
                <div class="spinner-border text-primary" role="status"></div>
            </div>

            <div v-else>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Continue watching</h5>
                        <p class="card-text text-muted">
                            Pick up where you left off.
                        </p>

                        <div class="row">
                            <div
                                v-for="n in 4"
                                :key="n"
                                class="col-6 col-md-3 mb-3"
                            >
                                <div class="card h-100">
                                    <div
                                        class="ratio ratio-16x9 bg-secondary"
                                    ></div>
                                    <div class="card-body p-2">
                                        <h6 class="mb-1">
                                            Sample Title {{ n }}
                                        </h6>
                                        <small class="text-muted"
                                            >Episode 1 • 1h 32m</small
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recommended for you</h5>
                        <p class="text-muted">
                            Curated picks based on your viewing history.
                        </p>

                        <div class="row">
                            <div
                                v-for="n in 8"
                                :key="'rec-' + n"
                                class="col-6 col-sm-4 col-md-3 mb-3"
                            >
                                <div class="card h-100">
                                    <div class="ratio ratio-16x9 bg-dark"></div>
                                    <div class="card-body p-2">
                                        <h6 class="mb-1">
                                            Recommendation {{ n }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </FrontendLayout>
</template>

<script setup>
import FrontendLayout from "../components/App.vue";
import axios, { setAuthToken } from "../axios";
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";

const user = ref(null);
const loading = ref(true);
const router = useRouter();

const movies = ref([]);

const fetchMe = async () => {
    try {
        // Use cookie-based Sanctum session: call backend /me
        const res = await axios.get("/me");
        // Some backends return the user directly, others wrap it as { user: {...} }
        user.value = res.data?.user || res.data;
    } catch (err) {
        console.error("Failed to fetch user:", err);
        router.push({ name: "Login" });
    } finally {
        loading.value = false;
    }
};

const fetchMovies = async () => {
    try {
        const res = await axios.get("/admin/videos");
        movies.value = res.data || [];
    } catch (err) {
        console.warn("Failed to fetch movies:", err);
    }
};

const logout = async () => {
    try {
        await axios.post("/logout");
    } catch (e) {
        console.warn(
            "Logout request failed, proceeding to clear local session."
        );
    }

    // Clear token locally as well
    try {
        setAuthToken(null);
    } catch (e) {}

    router.push({ name: "Login" });
};

const goToProfile = () => {
    // Placeholder: navigate to profile route if exists
    // router.push({ name: 'Profile' });
    alert("Profile page not implemented yet.");
};

onMounted(() => {
    fetchMe();
    fetchMovies();
});
</script>
