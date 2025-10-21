<template>
    <section class="movie-carousel">
        <Swiper
            :modules="[Navigation, Pagination, Autoplay]"
            :slides-per-view="5"
            :space-between="20"
            :loop="true"
            :autoplay="{ delay: 2500, disableOnInteraction: false }"
            navigation
            :pagination="{ clickable: true }"
            class="top-ten-slider"
        >
            <SwiperSlide
                v-for="(movie, index) in movies"
                :key="movie.id"
                class="position-relative movie-card"
            >
                <img
                    :src="movie.image"
                    class="img-fluid rounded-3"
                    :alt="movie.title"
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
          <div
            class="d-flex justify-content-between align-items-center mb-3 px-3"
        >

            <h4 class="text-white fw-semibold">Top 10 Movies</h4>
        
            <a href="#" class="text-decoration-none text-secondary">View All</a>
        </div>
    </section>
</template>

<script setup>
import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation, Pagination, Autoplay } from "swiper/modules";
import "swiper/swiper-bundle.css";

const movies = [
    {
        id: 1,
        title: "Broken Sanctuary",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/broken_sanctuary_poster.png",
    },
    {
        id: 2,
        title: "Vengeance in the Wild",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/vengeance_in_the_wild_poster.png",
        rent: true,
    },
    {
        id: 3,
        title: "The Charlie Game",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/the_charlie_game_shadows_unleashed_poster.png",
    },
    {
        id: 4,
        title: "Family Feud Fiasco",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/family_feud_fiasco_poster.png",
    },
    {
        id: 5,
        title: "Hearts of Valor",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/hearts_of_valor_poster.png",
    },
    {
        id: 6,
        title: "Charlotte's Curse",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/charlottes_curse_poster.png",
    },
    {
        id: 7,
        title: "Beneath the Surface",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/beneath_the_surface_poster.png",
    },
    {
        id: 8,
        title: "Beneath the Surface",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/beneath_the_surface_poster.png",
    },

    {
        id: 9,
        title: "Beneath the Surface",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/beneath_the_surface_poster.png",
    },

    {
        id: 10,
        title: "Beneath the Surface",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/beneath_the_surface_poster.png",
    },
];
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
</style>
