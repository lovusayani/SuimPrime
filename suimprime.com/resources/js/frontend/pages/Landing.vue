<template>
    <div>
        <HeroSlider />
        <!-- Top 10 Section -->
       <!--  <TopTenMovies /> -->

        <!-- 💸 Pay Per View -->
        <MovieCarousel title="Pay Per View" :movies="payPerView" />

        <!-- 🌟 Popular Movies -->
        <MovieCarousel title="Popular Movies" :movies="popularMovies" />

        <!-- 🆕 Latest Movies -->
        <MovieCarousel title="Latest Movies" :movies="latestMovies" />
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import HeroSlider from "../components/HeroSlider.vue";
import MovieCarousel from "../components/MovieCarousel.vue";
import TopTenMovies from "../components/TopTenMovies.vue";
import axios from "../axios";

// Reactive data
const payPerView = ref([]);
const popularMovies = ref([]);
const latestMovies = ref([]);

// Fetch movies from API
const fetchMovieData = async () => {
    try {
        // Fetch different sections
        const [payPerViewResponse, popularResponse, latestResponse] =
            await Promise.all([
                axios.get("/api/movies/section/recommended?limit=8"), // Using recommended for now
                axios.get("/api/movies/section/recommended?limit=12"),
                axios.get("/api/movies/section/recently-added?limit=12"),
            ]);

        if (payPerViewResponse.data.success) {
            payPerView.value = payPerViewResponse.data.movies.map((movie) => ({
                ...movie,
                image: movie.poster_url || movie.thumbnail_url,
                rent: true,
            }));
        }

        if (popularResponse.data.success) {
            popularMovies.value = popularResponse.data.movies.map((movie) => ({
                ...movie,
                image: movie.poster_url || movie.thumbnail_url,
            }));
        }

        if (latestResponse.data.success) {
            latestMovies.value = latestResponse.data.movies.map((movie) => ({
                ...movie,
                image: movie.poster_url || movie.thumbnail_url,
            }));
        }
    } catch (error) {
        console.error("Failed to fetch movie data:", error);

        // Fallback to sample data if API fails
        const fallbackMovies = [
            {
                id: 1,
                title: "Sample Movie",
                image: "https://via.placeholder.com/300x450/333/fff?text=Sample+Movie",
            },
        ];

        payPerView.value = fallbackMovies;
        popularMovies.value = fallbackMovies;
        latestMovies.value = fallbackMovies;
    }
};

onMounted(() => {
    fetchMovieData();
});
</script>
<style scoped>
.home-page {
    display: flex;
    flex-direction: column;
    gap: 4rem; /* keeps consistent distance between sections */
}
@media (max-height: 700px) {
    .home-page {
        gap: 2rem; /* tighter spacing on small height */
    }
}
</style>
