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
                :style="{ backgroundImage: `url(${movie.image})` }"
            >
                <!-- dark overlay -->
                <div class="overlay"></div>

                <!-- gradient bottom overlay -->
                <div class="bottom-gradient"></div>

                <!-- content -->
                <div class="slide-content container">
                    <ul class="tags">
                        <li v-for="(tag, i) in movie.tags" :key="i">
                            {{ tag }}
                        </li>
                    </ul>

                    <h2 class="title">{{ movie.title }}</h2>
                    <p class="desc">{{ movie.description }}</p>

                    <ul class="meta">
                        <li>{{ movie.year }}</li>
                        <li>🌐 {{ movie.language }}</li>
                        <li>⏱️ {{ movie.duration }}</li>
                        <li>⭐ {{ movie.rating }} (IMDB)</li>
                    </ul>

                    <div class="actions">
                        <button
                            class="btn-watchlist"
                            @click="toggleWatchlist(movie)"
                        >
                            <i
                                :class="
                                    movie.inWatchlist ? 'ph-check' : 'ph-plus'
                                "
                            ></i>
                        </button>
                        <a href="#" class="btn-play"> ▶ Play Now </a>
                    </div>
                </div>
            </SwiperSlide>
        </Swiper>
    </section>
</template>

<script setup>
import { ref } from "vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation, Pagination, Autoplay, EffectFade } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/effect-fade";

const movies = ref([
    {
        title: "The Smiling Shadows",
        tags: ["Horror", "Action", "Comedy"],
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/the_smiling_shadows_poster.png",
        description:
            "A chilling tale where sinister smiles hide dark secrets and haunting mysteries.",
        year: 2019,
        language: "English",
        duration: "05h 20m",
        rating: 7.5,
        inWatchlist: false,
    },
    {
        title: "The Daring Player",
        tags: ["Comedy", "Drama"],
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/the_daring_player_poster.png",
        description:
            "A hilarious and bold journey of a player who challenges his own destiny.",
        year: 2019,
        language: "Hindi",
        duration: "02h 50m",
        rating: 6.5,
        inWatchlist: false,
    },
]);

function toggleWatchlist(movie) {
    movie.inWatchlist = !movie.inWatchlist;
}
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
