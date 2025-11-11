<template>
    <section class="movie-carousel">
        <div
            class="d-flex justify-content-between align-items-center mb-3 px-3"
        >
            <h4 class="text-white fw-semibold">Top 10 Movies</h4>
            <a href="#" class="text-decoration-none text-secondary">View All</a>
        </div>

        <!-- Loading State -->
        <div v-if="loading" class="text-center py-4">
            <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="text-light mt-2">Loading top movies...</p>
        </div>

        <!-- Error State -->
        <div v-else-if="error" class="text-center py-4">
            <p class="text-danger">{{ error }}</p>
            <button
                @click="fetchTopMovies"
                class="btn btn-outline-light btn-sm"
            >
                Try Again
            </button>
        </div>

        <!-- Movies Slider -->
        <div v-else-if="movies.length > 0">
            <Swiper
                :modules="[Navigation, Pagination, Autoplay]"
                :slides-per-view="5"
                :space-between="20"
                :loop="true"
                :autoplay="{ delay: 2500, disableOnInteraction: false }"
                navigation
                :pagination="{ clickable: true }"
                :breakpoints="{
                    320: {
                        slidesPerView: 2,
                        spaceBetween: 10,
                    },
                    480: {
                        slidesPerView: 3,
                        spaceBetween: 15,
                    },
                    768: {
                        slidesPerView: 4,
                        spaceBetween: 15,
                    },
                    1024: {
                        slidesPerView: 5,
                        spaceBetween: 20,
                    },
                }"
                class="top-ten-slider"
            >
                <SwiperSlide
                    v-for="(movie, index) in movies"
                    :key="movie.id"
                    class="position-relative movie-card"
                    @click="goToMovie(movie)"
                >
                    <img
                        :src="movie.image"
                        class="img-fluid rounded-3"
                        :alt="movie.title"
                        @error="handleImageError"
                    />
                    <span
                        class="position-absolute top-0 start-0 badge bg-success m-2"
                        v-if="movie.rent"
                    >
                        RENT
                    </span>
                    <span class="top-number">{{ index + 1 }}</span>
                </SwiperSlide>
            </Swiper>
        </div>

        <!-- No Movies State -->
        <div v-else class="text-center py-4">
            <p class="text-light">No movies available at the moment.</p>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation, Pagination, Autoplay } from "swiper/modules";
import "swiper/swiper-bundle.css";
import axios from "../axios";

const router = useRouter();

const movies = ref([]);
const loading = ref(true);
const error = ref(null);

const fetchTopMovies = async () => {
    try {
        loading.value = true;
        const response = await axios.get("/api/movies/top-movies");

        if (response.data && response.data.data) {
            // Map the API response to match component needs
            movies.value = response.data.data.slice(0, 10).map((movie) => ({
                id: movie.id,
                title: movie.title,
                image:
                    movie.poster_url ||
                    movie.thumbnail_url ||
                    "/assets/dummy-images/movie-placeholder.jpg",
                rent: movie.is_premium || false, // You can adjust this based on your movie model
                year: movie.year,
                rating: movie.rating,
                genres: movie.genres ? movie.genres.map((g) => g.name) : [],
            }));
        }
    } catch (err) {
        console.error("Error fetching top movies:", err);
        error.value = "Failed to load top movies";
        // Fallback to empty array or show error message
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

onMounted(() => {
    fetchTopMovies();
});
</script>

<style scoped>
.movie-carousel {
    padding: 0 2rem;
    margin-top: -80px; /* ✅ Lift the whole carousel upward to overlap */
    position: relative;
    z-index: 5; /* ✅ Keeps it above the hero background */
}
.top-ten-slider {
    width: 100%;
}

.movie-card {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    transition: transform 0.3s ease;
    cursor: pointer;
}
.movie-card:hover {
    transform: scale(1.05);
}

.movie-card img {
    width: 280px;
    height: 360px;
    object-fit: cover;
    border-radius: 10px;
    transition: transform 0.3s ease;
}

.top-number {
    position: absolute;
    bottom: 10px;
    left: 10px;
    font-size: 3rem;
    font-weight: 800;
    color: white;
    text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.7);
}

/* Swiper navigation arrows */
.swiper-button-next,
.swiper-button-prev {
    color: #fff !important;
    background: rgba(0, 0, 0, 0.5);
    width: 40px;
    height: 40px;
    border-radius: 50%;
    transition: background 0.3s;
}
.swiper-button-next:hover,
.swiper-button-prev:hover {
    background: rgba(255, 255, 255, 0.3);
}
.swiper-pagination-bullet {
    background: #fff !important;
    opacity: 0.7;
}
.swiper-pagination-bullet-active {
    background: #ff3d00 !important;
    opacity: 1;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .movie-carousel {
        padding: 0 1.5rem;
    }

    .movie-card img {
        width: 240px;
        height: 320px;
    }

    .top-number {
        font-size: 2.5rem;
    }
}

@media (max-width: 992px) {
    .movie-carousel {
        padding: 0 1rem;
    }

    .movie-card img {
        width: 200px;
        height: 280px;
    }

    .top-number {
        font-size: 2rem;
    }
}

@media (max-width: 768px) {
    .movie-carousel {
        padding: 0 0.5rem;
        margin-top: -60px;
    }

    .movie-card img {
        width: 160px;
        height: 220px;
    }

    .top-number {
        font-size: 1.5rem;
        bottom: 5px;
        left: 5px;
    }

    .swiper-button-next,
    .swiper-button-prev {
        width: 35px;
        height: 35px;
    }
}

@media (max-width: 480px) {
    .movie-carousel {
        padding: 0 0.25rem;
        margin-top: -40px;
    }

    .movie-card img {
        width: 120px;
        height: 180px;
    }

    .top-number {
        font-size: 1.2rem;
        bottom: 3px;
        left: 3px;
    }

    .swiper-button-next,
    .swiper-button-prev {
        width: 30px;
        height: 30px;
        display: none; /* Hide navigation on very small screens */
    }
}
</style>
