<template>
    <div class="home-page">
        <!-- Header Section with spacing from navbar -->
        <div class="container-fluid px-4 pt-5 mt-4">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div>
                    <h2 class="mb-2">
                        Welcome back, {{ user?.name || "Viewer" }}!
                    </h2>
                    <p class="text-muted mb-0">
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
        </div>

        <div v-if="loading" class="text-center py-5">
            <div class="spinner-border text-primary" role="status"></div>
        </div>

        <div v-else>
            <!-- Continue Watching Section - Full Width -->
            <div class="container-fluid px-4 mb-5">
                <div class="section-header mb-4">
                    <h5 class="section-title mb-2">Continue watching</h5>
                    <p class="text-muted mb-0">Pick up where you left off.</p>
                </div>

                <div class="row g-3">
                    <div
                        v-for="n in 4"
                        :key="n"
                        class="col-6 col-md-4 col-lg-3 col-xl-2"
                    >
                        <div class="movie-card">
                            <div
                                class="ratio ratio-16x9 bg-secondary rounded"
                            ></div>
                            <div class="movie-info mt-2">
                                <h6 class="movie-title mb-1">
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

            <!-- Recommended Section - Full Width -->
            <div class="container-fluid px-4 mb-5">
                <div class="section-header mb-4">
                    <h5 class="section-title mb-2">Recommended for you</h5>
                    <p class="text-muted mb-0">
                        Curated picks based on your viewing history.
                    </p>
                </div>

                <div class="row g-3">
                    <div
                        v-for="n in 8"
                        :key="'rec-' + n"
                        class="col-6 col-md-4 col-lg-3 col-xl-2"
                    >
                        <div class="movie-card">
                            <div class="ratio ratio-16x9 bg-dark rounded"></div>
                            <div class="movie-info mt-2">
                                <h6 class="movie-title mb-1">
                                    Recommendation {{ n }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
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

<style scoped>
.home-page {
    min-height: 100vh;
    background-color: #0d0d0d;
}

.section-header {
    border-left: 4px solid #e50914;
    padding-left: 1rem;
}

.section-title {
    color: #fff;
    font-weight: 600;
    font-size: 1.5rem;
    margin: 0;
}

.movie-card {
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.movie-card:hover {
    transform: translateY(-8px);
}

.movie-card .ratio {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
    border: 1px solid rgba(255, 255, 255, 0.1);
    overflow: hidden;
}

.movie-card:hover .ratio {
    box-shadow: 0 8px 24px rgba(229, 9, 20, 0.4);
    border-color: rgba(229, 9, 20, 0.5);
}

.movie-info {
    padding: 0.5rem 0;
}

.movie-title {
    color: #fff;
    font-size: 0.95rem;
    font-weight: 500;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.text-muted {
    color: #aaa !important;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .home-page .container-fluid {
        padding-left: 1rem !important;
        padding-right: 1rem !important;
    }

    .section-title {
        font-size: 1.25rem;
    }
}
</style>
