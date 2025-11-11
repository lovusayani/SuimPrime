<template>
    <div class="container-fluid">
        <div class="overflow-hidden">
            <section class="recommended-block section-padding-top">
                <div
                    class="d-flex align-items-center justify-content-start px-1 mb-2 pb-1 mb-md-4 pb-md-0"
                >
                    <h4 class="main-title text-capitalize mb-0">Recommended</h4>
                </div>

                <!-- Loading State -->
                <div v-if="loading" class="text-center py-4">
                    <div class="spinner-border text-light" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="text-light mt-2">Loading recommended movies...</p>
                </div>

                <!-- Error State -->
                <div v-else-if="error" class="text-center py-4">
                    <p class="text-danger">{{ error }}</p>
                    <button
                        @click="fetchRecommendedMovies"
                        class="btn btn-outline-light btn-sm"
                    >
                        Try Again
                    </button>
                </div>

                <!-- Movies Slider - Single Line -->
                <div v-else-if="movies.length > 0" class="card-style-slider">
                    <Swiper
                        :modules="[Navigation, Pagination]"
                        :slides-per-view="'auto'"
                        :space-between="16"
                        :navigation="true"
                        :pagination="{ clickable: true }"
                        class="recommended-movies-slider"
                    >
                        <SwiperSlide
                            v-for="movie in movies"
                            :key="movie.id"
                            class="slider-slide"
                        >
                            <div class="movie-card" @click="goToMovie(movie)">
                                <div
                                    class="ratio ratio-16x9 bg-dark rounded position-relative"
                                >
                                    <img
                                        :src="
                                            movie.poster_url ||
                                            '/assets/dummy-images/movie-placeholder.jpg'
                                        "
                                        :alt="movie.title"
                                        class="img-fluid rounded"
                                        style="object-fit: cover"
                                        @error="handleImageError"
                                    />
                                    <!-- Watchlist button -->
                                    <button
                                        @click.stop="addToWatchlist(movie)"
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
                                        <span v-if="movie.rating">
                                            ⭐ {{ movie.rating }} •
                                        </span>
                                        {{ movie.year || "N/A" }}
                                    </small>
                                </div>
                            </div>
                        </SwiperSlide>
                    </Swiper>
                </div>

                <!-- No Movies State -->
                <div v-else class="text-center py-4">
                    <p class="text-light">
                        No recommended movies available at the moment.
                    </p>
                </div>
            </section>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation, Pagination } from "swiper/modules";
import "swiper/swiper-bundle.css";
import axios from "../axios";

const router = useRouter();

const movies = ref([]);
const loading = ref(true);
const error = ref(null);

const fetchRecommendedMovies = async () => {
    try {
        loading.value = true;
        error.value = null;

        // Get recommended movies (you can adjust the endpoint as needed)
        const response = await axios.get("/api/movies/recommended");

        if (response.data && response.data.data) {
            movies.value = response.data.data.map((movie) => ({
                id: movie.id,
                title: movie.title,
                poster_url: movie.poster_url || movie.thumbnail_url,
                is_premium: movie.is_premium || false,
                year: movie.year,
                rating: movie.rating,
                genres: movie.genres || [],
                description: movie.description,
            }));
        }
    } catch (err) {
        console.error("Error fetching recommended movies:", err);
        error.value = "Failed to load recommended movies";
        movies.value = [];
    } finally {
        loading.value = false;
    }
};

const handleImageError = (event) => {
    // Fallback to placeholder image if movie poster fails to load
    event.target.src = "/assets/dummy-images/movie-placeholder.jpg";
};

const goToMovie = (movie) => {
    // Navigate to movie detail page
    router.push(`/movie/${movie.id}`);
};

const addToWatchlist = async (movie) => {
    try {
        const response = await axios.post("/api/watchlist/add", {
            movie_id: movie.id,
        });

        if (response.data.success) {
            // Show success message or update UI
            console.log("Added to watchlist:", movie.title);
            // You could emit an event or show a toast notification here
        }
    } catch (err) {
        console.error("Failed to add to watchlist:", err);
        // Show error message
    }
};

onMounted(() => {
    fetchRecommendedMovies();
});
</script>

<style scoped>
.recommended-block {
    padding: 2rem 0;
}

.section-padding-top {
    padding-top: 2rem;
}

.main-title {
    color: #fff;
    font-weight: 600;
    font-size: 1.75rem;
    border-left: 4px solid #e50914;
    padding-left: 1rem;
}

.card-style-slider {
    width: 100%;
}

/* Movie Card Styles */
.slider-slide {
    width: 220px !important;
    height: auto !important;
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
    width: 220px;
    height: 320px;
    aspect-ratio: auto !important;
}

.movie-card:hover .ratio {
    box-shadow: 0 8px 24px rgba(229, 9, 20, 0.4);
    border-color: rgba(229, 9, 20, 0.5);
}

.movie-card img {
    transition: transform 0.3s ease;
    object-fit: cover;
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
    margin: 0;
}

.text-muted {
    color: #aaa !important;
}

/* Watchlist Button */
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
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.movie-card:hover .watchlist-btn {
    opacity: 1;
}

.watchlist-btn:hover {
    background-color: rgba(229, 9, 20, 0.8);
    border-color: #e50914;
}

/* Swiper Styles */
.recommended-movies-slider {
    padding-bottom: 2rem;
}

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

:deep(.swiper-pagination-bullet) {
    background-color: #666;
}

:deep(.swiper-pagination-bullet-active) {
    background-color: #e50914;
}

/* Responsive Design */
@media (max-width: 768px) {
    .recommended-block {
        padding: 1rem 0;
    }

    .slider-slide {
        width: 165px !important;
    }

    .movie-card .ratio {
        width: 165px;
        height: 240px;
    }

    .main-title {
        font-size: 1.25rem;
    }

    .watchlist-btn {
        opacity: 1; /* Always show on mobile */
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
