<template>
    <div class="home-page">
        <!-- Hero Slider Section -->
        <HeroSlider />

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

                <div class="d-flex gap-2" v-if="user">
                    <button
                        class="btn btn-outline-secondary"
                        @click="goToProfile"
                    >
                        <i class="bi bi-person-circle"></i> Profile
                    </button>
                    <button class="btn btn-danger" @click="logout">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </div>
            </div>
        </div>

        <div v-if="loading" class="text-center py-5">
            <div class="spinner-border text-primary" role="status"></div>
        </div>

        <div v-else>
            <!-- Continue Watching Section - Full Width -->
            <div
                class="container-fluid px-4 mb-5"
                v-if="continueWatching.length > 0"
            >
                <div class="section-header mb-4">
                    <h5 class="section-title mb-2">Continue watching</h5>
                    <p class="text-muted mb-0">Pick up where you left off.</p>
                </div>

                <div class="row g-3">
                    <div
                        v-for="movie in continueWatching"
                        :key="'continue-' + movie.id"
                        class="col-6 col-md-4 col-lg-3 col-xl-2"
                    >
                        <div class="movie-card" @click="playMovie(movie)">
                            <div
                                class="ratio ratio-16x9 bg-secondary rounded position-relative"
                            >
                                <img
                                    v-if="
                                        movie.thumbnail_url || movie.poster_url
                                    "
                                    :src="
                                        movie.thumbnail_url || movie.poster_url
                                    "
                                    :alt="movie.title"
                                    class="img-fluid rounded"
                                    style="object-fit: cover"
                                />
                                <!-- Progress bar -->
                                <div class="progress-bar-container">
                                    <div
                                        class="progress-bar-fill"
                                        :style="{
                                            width: movie.watch_progress + '%',
                                        }"
                                    ></div>
                                </div>
                            </div>
                            <div class="movie-info mt-2">
                                <h6 class="movie-title mb-1">
                                    {{ movie.title }}
                                </h6>
                                <small class="text-muted">
                                    {{ Math.round(movie.watch_progress) }}% •
                                    {{ formatDuration(movie.duration) }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recommended Section - Slider -->
            <div class="container-fluid px-4 mb-5">
                <div class="section-header mb-4">
                    <h5 class="section-title mb-2">Recommended for you</h5>
                    <p class="text-muted mb-0">
                        Curated picks based on your preferences.
                    </p>
                </div>

                <Swiper
                    :modules="[Navigation, Pagination]"
                    :slides-per-view="'auto'"
                    :space-between="16"
                    :navigation="true"
                    :pagination="{ clickable: true }"
                    class="recommended-slider"
                >
                    <SwiperSlide
                        v-for="movie in recommended"
                        :key="'rec-' + movie.id"
                        class="slider-slide"
                    >
                        <div class="movie-card" @click="playMovie(movie)">
                            <div
                                class="ratio ratio-16x9 bg-dark rounded position-relative"
                            >
                                <img
                                    v-if="
                                        movie.thumbnail_url || movie.poster_url
                                    "
                                    :src="
                                        movie.thumbnail_url || movie.poster_url
                                    "
                                    :alt="movie.title"
                                    class="img-fluid rounded"
                                    style="object-fit: cover"
                                />
                                <!-- Watchlist button -->
                                <button
                                    v-if="user"
                                    @click.stop="toggleWatchlist(movie)"
                                    class="btn btn-sm btn-outline-light watchlist-btn"
                                >
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                            <div class="movie-info mt-2">
                                <h6 class="movie-title mb-1">
                                    {{ movie.title }}
                                </h6>
                                <small class="text-muted">
                                    <span v-if="movie.imdb_rating">
                                        ⭐ {{ movie.imdb_rating }} •
                                    </span>
                                    {{ formatDuration(movie.duration) }}
                                </small>
                            </div>
                        </div>
                    </SwiperSlide>
                </Swiper>
            </div>

            <!-- Watchlist Section - Only for authenticated users -->
            <div
                class="container-fluid px-4 mb-5"
                v-if="user && watchlist.length > 0"
            >
                <div class="section-header mb-4">
                    <h5 class="section-title mb-2">My Watchlist</h5>
                    <p class="text-muted mb-0">
                        Movies you've saved for later.
                    </p>
                </div>

                <div class="row g-3">
                    <div
                        v-for="movie in watchlist"
                        :key="'watchlist-' + movie.id"
                        class="col-6 col-md-4 col-lg-3 col-xl-2"
                    >
                        <div class="movie-card" @click="playMovie(movie)">
                            <div
                                class="ratio ratio-16x9 bg-dark rounded position-relative"
                            >
                                <img
                                    v-if="
                                        movie.thumbnail_url || movie.poster_url
                                    "
                                    :src="
                                        movie.thumbnail_url || movie.poster_url
                                    "
                                    :alt="movie.title"
                                    class="img-fluid rounded"
                                    style="object-fit: cover"
                                />
                                <!-- Remove from watchlist button -->
                                <button
                                    @click.stop="removeFromWatchlist(movie)"
                                    class="btn btn-sm btn-outline-danger watchlist-btn"
                                >
                                    <i class="bi bi-x"></i>
                                </button>
                            </div>
                            <div class="movie-info mt-2">
                                <h6 class="movie-title mb-1">
                                    {{ movie.title }}
                                </h6>
                                <small class="text-muted">{{
                                    formatDuration(movie.duration)
                                }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recently Added Section - Slider -->
            <div class="container-fluid px-4 mb-5">
                <div class="section-header mb-4">
                    <h5 class="section-title mb-2">Recently Added</h5>
                    <p class="text-muted mb-0">New movies on the platform.</p>
                </div>

                <Swiper
                    :modules="[Navigation, Pagination]"
                    :slides-per-view="'auto'"
                    :space-between="16"
                    :navigation="true"
                    :pagination="{ clickable: true }"
                    class="recently-added-slider"
                >
                    <SwiperSlide
                        v-for="movie in recentlyAdded"
                        :key="'recent-' + movie.id"
                        class="slider-slide"
                    >
                        <div class="movie-card" @click="playMovie(movie)">
                            <div
                                class="ratio ratio-16x9 bg-dark rounded position-relative"
                            >
                                <img
                                    v-if="
                                        movie.thumbnail_url || movie.poster_url
                                    "
                                    :src="
                                        movie.thumbnail_url || movie.poster_url
                                    "
                                    :alt="movie.title"
                                    class="img-fluid rounded"
                                    style="object-fit: cover"
                                />
                                <!-- Watchlist button -->
                                <button
                                    v-if="user"
                                    @click.stop="toggleWatchlist(movie)"
                                    class="btn btn-sm btn-outline-light watchlist-btn"
                                >
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                            <div class="movie-info mt-2">
                                <h6 class="movie-title mb-1">
                                    {{ movie.title }}
                                </h6>
                                <small class="text-muted">{{
                                    formatDuration(movie.duration)
                                }}</small>
                            </div>
                        </div>
                    </SwiperSlide>
                </Swiper>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios, { setAuthToken } from "../axios";
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation, Pagination } from "swiper/modules";
import HeroSlider from "../components/HeroSlider.vue";

const user = ref(null);
const loading = ref(true);
const router = useRouter();

// Movie data
const continueWatching = ref([]);
const recommended = ref([]);
const watchlist = ref([]);
const recentlyAdded = ref([]);

const fetchHomeData = async () => {
    try {
        const res = await axios.get("/api/home");
        if (res.data.success) {
            const data = res.data.data;
            user.value = data.user;
            continueWatching.value = data.continue_watching || [];
            recommended.value = data.recommended || [];
            watchlist.value = data.watchlist || [];
            recentlyAdded.value = data.recently_added || [];
        }
    } catch (err) {
        console.error("Failed to fetch home data:", err);
        if (err.response?.status === 401) {
            router.push({ name: "Login" });
        }
    } finally {
        loading.value = false;
    }
};

const fetchMe = async () => {
    try {
        const res = await axios.get("/api/me");
        user.value = res.data?.user || res.data;
    } catch (err) {
        console.error("Failed to fetch user:", err);
        // Don't redirect on auth error here since home data can work without auth
    }
};

const playMovie = (movie) => {
    // Navigate to movie detail page
    router.push({
        name: "MovieDetail",
        params: { id: movie.id },
    });

    // Update viewing progress (placeholder)
    if (user.value && movie.duration) {
        updateViewingProgress(movie.id, 300, movie.duration * 60); // 5 minutes watched
    }
};

const toggleWatchlist = async (movie) => {
    if (!user.value) {
        router.push({ name: "Login" });
        return;
    }

    try {
        const res = await axios.post("/api/watchlist/add", {
            movie_id: movie.id,
        });

        if (res.data.success) {
            // Add to local watchlist if not already there
            if (!watchlist.value.find((m) => m.id === movie.id)) {
                watchlist.value.unshift(movie);
            }
        }
    } catch (err) {
        console.error("Failed to add to watchlist:", err);
        alert("Failed to add to watchlist");
    }
};

const removeFromWatchlist = async (movie) => {
    try {
        const res = await axios.post("/api/watchlist/remove", {
            movie_id: movie.id,
        });

        if (res.data.success) {
            // Remove from local watchlist
            watchlist.value = watchlist.value.filter((m) => m.id !== movie.id);
        }
    } catch (err) {
        console.error("Failed to remove from watchlist:", err);
        alert("Failed to remove from watchlist");
    }
};

const updateViewingProgress = async (movieId, watchTime, totalDuration) => {
    if (!user.value) return;

    try {
        await axios.post("/api/viewing/progress", {
            movie_id: movieId,
            watch_time: watchTime,
            total_duration: totalDuration,
        });
    } catch (err) {
        console.error("Failed to update viewing progress:", err);
    }
};

const formatDuration = (minutes) => {
    if (!minutes) return "N/A";
    const hours = Math.floor(minutes / 60);
    const mins = minutes % 60;
    return hours > 0 ? `${hours}h ${mins}m` : `${mins}m`;
};

const logout = async () => {
    try {
        await axios.post("/api/logout");
    } catch (e) {
        console.warn(
            "Logout request failed, proceeding to clear local session."
        );
    }

    try {
        setAuthToken(null);
    } catch (e) {}

    router.push({ name: "Login" });
};

const goToProfile = () => {
    alert("Profile page not implemented yet.");
};

onMounted(() => {
    fetchHomeData();
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
    position: relative;
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

.movie-card img {
    transition: transform 0.3s ease;
}

.movie-card:hover img {
    transform: scale(1.05);
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

/* Progress bar for continue watching */
.progress-bar-container {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 4px;
    background-color: rgba(255, 255, 255, 0.3);
}

.progress-bar-fill {
    height: 100%;
    background-color: #e50914;
    transition: width 0.3s ease;
}

/* Watchlist button */
.watchlist-btn {
    position: absolute;
    top: 8px;
    right: 8px;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    backdrop-filter: blur(10px);
    background-color: rgba(0, 0, 0, 0.7);
}

.movie-card:hover .watchlist-btn {
    opacity: 1;
}

.watchlist-btn:hover {
    background-color: rgba(229, 9, 20, 0.8);
    border-color: #e50914;
}

.btn-outline-danger:hover {
    background-color: rgba(220, 53, 69, 0.8);
    border-color: #dc3545;
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

    .watchlist-btn {
        opacity: 1; /* Always show on mobile */
    }
}

/* Loading animation */
@keyframes pulse {
    0%,
    100% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
}

.movie-card .ratio.loading {
    animation: pulse 1.5s ease-in-out infinite;
}

/* Swiper Slider Styles */
.recommended-slider,
.recently-added-slider {
    padding-bottom: 2rem;
}

.slider-slide {
    width: 220px !important;
    height: auto !important;
}

.slider-slide .movie-card {
    height: 100%;
}

.slider-slide .ratio {
    width: 220px;
    height: 320px;
    aspect-ratio: auto !important;
}

/* Swiper Navigation Buttons */
:deep(.swiper-button-next),
:deep(.swiper-button-prev) {
    color: #e50914;
    width: 40px;
    height: 40px;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

:deep(.swiper-button-next::after),
:deep(.swiper-button-prev::after) {
    font-size: 18px;
}

:deep(.swiper-button-next):hover,
:deep(.swiper-button-prev):hover {
    background-color: rgba(229, 9, 20, 0.8);
}

/* Swiper Pagination */
:deep(.swiper-pagination-bullet) {
    background-color: #666;
}

:deep(.swiper-pagination-bullet-active) {
    background-color: #e50914;
}

/* Responsive slider */
@media (max-width: 768px) {
    .slider-slide {
        width: 165px !important;
    }

    .slider-slide .ratio {
        width: 165px;
        height: 240px;
    }

    :deep(.swiper-button-next),
    :deep(.swiper-button-prev) {
        width: 32px;
        height: 32px;
    }

    :deep(.swiper-button-next::after),
    :deep(.swiper-button-prev::after) {
        font-size: 14px;
    }
}
</style>
