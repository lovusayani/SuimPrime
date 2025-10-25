<template>
    <section id="banner-section" class="relative">
        <Swiper
            :modules="[Navigation, Pagination, Autoplay, EffectFade]"
            :slides-per-view="1"
            :loop="true"
            :autoplay="{ delay: 4000, disableOnInteraction: false }"
            :pagination="{ clickable: true }"
            :navigation="true"
            effect="fade"
            class="hero-swiper"
        >
            <SwiperSlide
                v-for="(movie, index) in movies"
                :key="index"
                class="hero-slide"
                :style="{
                    backgroundImage: `url(${
                        movie.poster_url || movie.thumbnail_url
                    })`,
                }"
            >
                <!-- dark overlay -->
                <div class="overlay"></div>

                <!-- gradient bottom overlay -->
                <div class="bottom-gradient"></div>

                <!-- content -->
                <div class="slide-content container">
                    <ul class="tags">
                        <li v-for="genre in movie.genres" :key="genre.id">
                            {{ genre.name }}
                        </li>
                    </ul>

                    <h2 class="title">{{ movie.title }}</h2>
                    <p class="desc">{{ movie.description }}</p>

                    <ul class="meta">
                        <li>
                            {{
                                new Date(movie.release_date).getFullYear() ||
                                "N/A"
                            }}
                        </li>
                        <li>🌐 English</li>
                        <li>⏱️ {{ formatDuration(movie.duration) }}</li>
                        <li v-if="movie.imdb_rating">
                            ⭐ {{ movie.imdb_rating }} (IMDB)
                        </li>
                    </ul>

                    <div class="actions">
                        <button
                            class="btn-watchlist"
                            @click="toggleWatchlist(movie)"
                        >
                            <PhCheck v-if="movie.inWatchlist" :size="20" />
                            <PhPlus v-else :size="20" />
                        </button>
                        <a href="#" class="btn-play"> ▶ Play Now </a>
                    </div>
                </div>
            </SwiperSlide>
        </Swiper>
    </section>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation, Pagination, Autoplay, EffectFade } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/effect-fade";
import { PhCheck, PhPlus } from "@phosphor-icons/vue";
import axios from "../axios";

const movies = ref([]);

const fetchHeroMovies = async () => {
    try {
        const response = await axios.get("/api/movies/section/recommended");
        if (response.data.success) {
            // Take first 3 movies for hero slider
            movies.value = response.data.movies.slice(0, 3).map((movie) => ({
                ...movie,
                inWatchlist: false, // Initialize watchlist status
            }));
        }
    } catch (error) {
        console.error("Failed to fetch hero movies:", error);
        // Fallback to sample data if API fails
        movies.value = [
            {
                id: 1,
                title: "Featured Movie",
                description: "Discover amazing content on our platform.",
                poster_url:
                    "https://via.placeholder.com/1920x1080/333/fff?text=Featured+Movie",
                release_date: "2024-01-01",
                genres: [{ id: 1, name: "Action" }],
                inWatchlist: false,
            },
        ];
    }
};

const formatDuration = (minutes) => {
    if (!minutes) return "N/A";
    const hours = Math.floor(minutes / 60);
    const mins = minutes % 60;
    return hours > 0 ? `${hours}h ${mins}m` : `${mins}m`;
};

function toggleWatchlist(movie) {
    movie.inWatchlist = !movie.inWatchlist;
    // TODO: Add API call to add/remove from watchlist
}

onMounted(() => {
    fetchHeroMovies();
});
</script>

<style scoped>
.hero-slide::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 150px;
    background: linear-gradient(to bottom, transparent, #000);
    z-index: 2;
}
.hero-swiper {
    width: 100%;
    height: 90vh;
    position: relative;
}

.hero-slide {
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    position: relative;
    display: flex;
    align-items: flex-end;
    justify-content: flex-start;
}

.overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.6);
    z-index: 1;
}

.bottom-gradient {
    position: absolute;
    bottom: 0;
    height: 40%;
    width: 100%;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent);
    z-index: 2;
}

.slide-content {
    position: relative;
    z-index: 3;
    color: #fff;
    padding: 0 4rem 6rem;
    max-width: 650px;
}

.tags {
    display: flex;
    gap: 1rem;
    margin-bottom: 0.75rem;
    font-size: 0.9rem;
    list-style: none;
    padding: 0;
}

.tags li {
    text-transform: uppercase;
    color: #ddd;
    position: relative;
}

.tags li:not(:last-child)::after {
    content: "•";
    margin-left: 1rem;
    color: #aaa;
}

.title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.desc {
    color: #ccc;
    font-size: 1rem;
    margin-bottom: 1rem;
    line-height: 1.6;
}

.meta {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    font-size: 0.9rem;
    color: #aaa;
    margin-bottom: 1.5rem;
}

.actions {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.btn-watchlist {
    background: rgba(255, 255, 255, 0.15);
    border: none;
    color: #fff;
    width: 42px;
    height: 42px;
    border-radius: 50%;
    font-size: 1.2rem;
    cursor: pointer;
}

.btn-play {
    background: #e50914;
    color: #fff;
    padding: 0.7rem 1.6rem;
    border-radius: 4px;
    text-decoration: none;
    font-weight: 600;
}

.swiper-button-next,
.swiper-button-prev {
    color: #fff;
    opacity: 0.8;
    transition: 0.3s;
}

.swiper-button-next:hover,
.swiper-button-prev:hover {
    opacity: 1;
}

.swiper-pagination-bullet {
    background: #fff;
    opacity: 0.6;
}

.swiper-pagination-bullet-active {
    background: #e50914;
    opacity: 1;
}
</style>
