<template>
    <div class="movie-details-section">
        <div class="container-fluid px-4">
            <!-- Actors and Directors Row -->
            <div class="row mb-5">
                <!-- Actors Column -->
                <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                    <div class="section-header mb-4">
                        <h5 class="section-title mb-2">Cast</h5>
                        <p class="text-muted mb-0">Featured actors in this movie.</p>
                    </div>

                    <div v-if="loadingActors" class="text-center py-4">
                        <div class="spinner-border text-light spinner-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>

                    <div v-else-if="actors.length > 0">
                        <Swiper
                            :modules="[Navigation, Pagination]"
                            :slides-per-view="'auto'"
                            :space-between="16"
                            :navigation="true"
                            :pagination="{ clickable: true }"
                            class="actors-slider"
                        >
                            <SwiperSlide
                                v-for="actor in actors"
                                :key="actor.id"
                                class="slider-slide-person"
                            >
                                <div class="person-card">
                                    <div class="person-image rounded-circle mb-3">
                                        <img
                                            v-if="actor.image_url"
                                            :src="actor.image_url"
                                            :alt="actor.name"
                                            class="img-fluid"
                                            @error="handleImageError"
                                        />
                                        <div v-else class="placeholder-image">
                                            <i class="bi bi-person-fill"></i>
                                        </div>
                                    </div>
                                    <h6 class="person-name text-white text-center">
                                        {{ actor.name }}
                                    </h6>
                                    <small class="text-muted d-block text-center">
                                        Actor
                                    </small>
                                </div>
                            </SwiperSlide>
                        </Swiper>
                    </div>

                    <div v-else class="text-center py-4">
                        <p class="text-muted">No actors available.</p>
                    </div>
                </div>

                <!-- Directors Column -->
                <div class="col-12 col-lg-6">
                    <div class="section-header mb-4">
                        <h5 class="section-title mb-2">Directors</h5>
                        <p class="text-muted mb-0">Directors of this movie.</p>
                    </div>

                    <div v-if="loadingDirectors" class="text-center py-4">
                        <div class="spinner-border text-light spinner-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>

                    <div v-else-if="directors.length > 0">
                        <Swiper
                            :modules="[Navigation, Pagination]"
                            :slides-per-view="'auto'"
                            :space-between="16"
                            :navigation="true"
                            :pagination="{ clickable: true }"
                            class="directors-slider"
                        >
                            <SwiperSlide
                                v-for="director in directors"
                                :key="director.id"
                                class="slider-slide-person"
                            >
                                <div class="person-card">
                                    <div class="person-image rounded-circle mb-3">
                                        <img
                                            v-if="director.image_url"
                                            :src="director.image_url"
                                            :alt="director.name"
                                            class="img-fluid"
                                            @error="handleImageError"
                                        />
                                        <div v-else class="placeholder-image">
                                            <i class="bi bi-person-fill"></i>
                                        </div>
                                    </div>
                                    <h6 class="person-name text-white text-center">
                                        {{ director.name }}
                                    </h6>
                                    <small class="text-muted d-block text-center">
                                        Director
                                    </small>
                                </div>
                            </SwiperSlide>
                        </Swiper>
                    </div>

                    <div v-else class="text-center py-4">
                        <p class="text-muted">No directors available.</p>
                    </div>
                </div>
            </div>

            <!-- Similar Movies by Genre Section -->
            <div class="mb-5">
                <div class="section-header mb-4">
                    <h5 class="section-title mb-2">Similar Movies</h5>
                    <p class="text-muted mb-0">More movies in {{ genresList }}.</p>
                </div>

                <div v-if="loadingSimilar" class="text-center py-4">
                    <div class="spinner-border text-light" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <div v-else-if="similarMovies.length > 0">
                    <Swiper
                        :modules="[Navigation, Pagination]"
                        :slides-per-view="'auto'"
                        :space-between="16"
                        :navigation="true"
                        :pagination="{ clickable: true }"
                        class="similar-movies-slider"
                    >
                        <SwiperSlide
                            v-for="movie in similarMovies"
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

                <div v-else class="text-center py-4">
                    <p class="text-muted">No similar movies available.</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted, watch } from "vue";
import { useRouter } from "vue-router";
import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation, Pagination } from "swiper/modules";
import axios from "../axios";

const props = defineProps({
    movieId: {
        type: [String, Number],
        required: true,
    },
    movie: {
        type: Object,
        required: true,
    },
});

const router = useRouter();

// Data
const actors = ref([]);
const directors = ref([]);
const similarMovies = ref([]);

// Loading states
const loadingActors = ref(false);
const loadingDirectors = ref(false);
const loadingSimilar = ref(false);

// Computed properties
const genresList = computed(() => {
    if (props.movie?.genres && props.movie.genres.length > 0) {
        return props.movie.genres.map((g) => g.name).join(", ");
    }
    return "this genre";
});

// Fetch actors
const fetchActors = async () => {
    try {
        loadingActors.value = true;
        const response = await axios.get(`/api/movies/${props.movieId}/actors`);
        if (response.data && response.data.data) {
            actors.value = response.data.data;
        }
    } catch (err) {
        console.error("Error fetching actors:", err);
        actors.value = [];
    } finally {
        loadingActors.value = false;
    }
};

// Fetch directors
const fetchDirectors = async () => {
    try {
        loadingDirectors.value = true;
        const response = await axios.get(
            `/api/movies/${props.movieId}/directors`
        );
        if (response.data && response.data.data) {
            directors.value = response.data.data;
        }
    } catch (err) {
        console.error("Error fetching directors:", err);
        directors.value = [];
    } finally {
        loadingDirectors.value = false;
    }
};

// Fetch similar movies by genre
const fetchSimilarMovies = async () => {
    try {
        loadingSimilar.value = true;

        // Get genre IDs from the movie
        const genreIds = props.movie?.genres
            ?.map((g) => g.id)
            .join(",") || "";

        if (!genreIds) {
            similarMovies.value = [];
            return;
        }

        const response = await axios.get("/api/movies/by-genres", {
            params: {
                genres: genreIds,
                limit: 10,
                exclude: props.movieId, // Exclude current movie
            },
        });

        if (response.data && response.data.data) {
            similarMovies.value = response.data.data;
        }
    } catch (err) {
        console.error("Error fetching similar movies:", err);
        similarMovies.value = [];
    } finally {
        loadingSimilar.value = false;
    }
};

// Handle image errors
const handleImageError = (event) => {
    event.target.src = "/assets/dummy-images/movie-placeholder.jpg";
};

// Navigate to movie detail
const goToMovie = (movie) => {
    router.push(`/movie/${movie.id}`);
};

// Add to watchlist
const addToWatchlist = async (movie) => {
    try {
        const response = await axios.post("/api/watchlist/add", {
            movie_id: movie.id,
        });
        if (response.data.success) {
            console.log("Added to watchlist:", movie.title);
        }
    } catch (err) {
        console.error("Failed to add to watchlist:", err);
    }
};

// Watch for movie ID changes
watch(
    () => props.movieId,
    () => {
        fetchActors();
        fetchDirectors();
        fetchSimilarMovies();
    }
);

// Initial fetch
onMounted(() => {
    fetchActors();
    fetchDirectors();
    fetchSimilarMovies();
});
</script>

<style scoped>
.movie-details-section {
    background-color: #0d0d0d;
    color: #fff;
    padding: 2rem 0;
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

/* Person Card Styles */
.slider-slide-person {
    width: 150px !important;
    height: auto !important;
}

.person-card {
    text-align: center;
    transition: transform 0.3s ease;
}

.person-card:hover {
    transform: translateY(-8px);
}

.person-image {
    width: 150px;
    height: 150px;
    margin-left: auto;
    margin-right: auto;
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
    border: 2px solid rgba(229, 9, 20, 0.3);
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}

.person-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.person-card:hover .person-image img {
    transform: scale(1.05);
}

.placeholder-image {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
    color: #666;
    font-size: 3rem;
}

.person-name {
    font-size: 0.95rem;
    font-weight: 500;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
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
.actors-slider,
.directors-slider,
.similar-movies-slider {
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
    .section-title {
        font-size: 1.25rem;
    }

    .slider-slide-person {
        width: 120px !important;
    }

    .person-image {
        width: 120px;
        height: 120px;
    }

    .slider-slide {
        width: 165px !important;
    }

    .movie-card .ratio {
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
