<template>
    <section
        class="movie-carousel my-5"
        :class="{ 'overlap-section': overlap }"
    >
        <!-- Section Header -->
        <div class="section-header">
            <!-- Title -->
            <h4 class="section-title text-white fw-semibold">{{ title }}</h4>

            <!-- View All -->
            <a
                v-if="!showRank"
                href="#"
                class="view-all text-decoration-none text-secondary"
            >
                View All
            </a>
        </div>

        <!-- Movie Slider -->
        <Swiper
            :modules="[Navigation, Pagination, Autoplay]"
            :slides-per-view="7"
            :space-between="20"
            :loop="true"
            :autoplay="{ delay: 2500, disableOnInteraction: false }"
            navigation
            :pagination="{ clickable: true }"
            class="movie-slider"
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
                    v-if="movie.rent"
                    class="position-absolute top-0 start-0 badge bg-success m-2"
                >
                    RENT
                </span>
                <span v-if="showRank" class="top-number">{{ index + 1 }}</span>
            </SwiperSlide>
        </Swiper>
    </section>
</template>

<script setup>
import { useRouter } from "vue-router";
import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation, Pagination, Autoplay } from "swiper/modules";
import "swiper/swiper-bundle.css";

const router = useRouter();

defineProps({
    title: String,
    movies: Array,
    overlap: { type: Boolean, default: false },
    showRank: { type: Boolean, default: false },
});

function handleImageError(event) {
    console.warn("Image failed to load:", event.target.src);
    // Set a fallback image
    event.target.src =
        "https://via.placeholder.com/300x450/333/fff?text=No+Image";
}

function goToMovie(movie) {
    // Navigate to movie detail page
    router.push(`/movie/${movie.id}`);
}
</script>

<style scoped>
.movie-carousel {
    padding: 0 2rem;
    position: relative;
    margin-top: 4rem;
}

.overlap-section {
    margin-top: -120px;
    z-index: 5;
}

/* ✅ Proper header layout */
.section-header {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
    width: 100%;
    margin-bottom: 1.5rem;
}

.section-title {
    color: #fff;
    font-size: 1.6rem;
    font-weight: 600;
    margin: 0;
}

.view-all {
    position: absolute;
    bottom: 0;
    right: 0;
    font-size: 0.95rem;
    color: #bbb;
    transition: color 0.3s ease;
}

.view-all:hover {
    color: #fff;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .section-header {
        height: auto;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    .view-all {
        position: static;
    }
}

/* Swiper + Card styling */
.movie-slider {
    width: 100%;
}

.movie-card {
    position: relative;
    width: 260px;
    height: 380px;
    border-radius: 10px;
    overflow: hidden;
    flex: 0 0 auto;
    transition: transform 0.3s ease;
    cursor: pointer;
}

.movie-card:hover {
    transform: scale(1.05);
}

.movie-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;
}

.top-number {
    position: absolute;
    bottom: 10px;
    left: 10px;
    font-size: 3rem;
    font-weight: 800;
    color: white;
    text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.8);
}

/* Swiper arrows */
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

/* Pagination dots */
.swiper-pagination-bullet {
    background: #fff !important;
    opacity: 0.6;
}

.swiper-pagination-bullet-active {
    background: #ff3d00 !important;
    opacity: 1;
}
</style>
