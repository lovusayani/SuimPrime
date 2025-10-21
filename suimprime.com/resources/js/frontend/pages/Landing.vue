<template>
    <div>
        <HeroSlider />
        <!-- Top 10 Section -->
        <MovieCarousel
            title="Top 10 Movies"
            :movies="topMovies"
            :show-rank="true"
            :overlap="true"
        />

         <!-- 💸 Pay Per View -->
        <MovieCarousel title="Pay Per View" :movies="payPerView" />

        <!-- 🌟 Popular Movies -->
        <MovieCarousel title="Popular Movies" :movies="popularMovies" />

        <!-- 🆕 Latest Movies -->
        <MovieCarousel title="Latest Movies" :movies="latestMovies" />
    </div>
</template>

<script setup>
import HeroSlider from "../components/HeroSlider.vue";
import MovieCarousel from "../components/MovieCarousel.vue";

const topMovies = [
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
        title: "Broken Sanctuary",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/broken_sanctuary_poster.png",
    },
    {
        id: 7,
        title: "Vengeance in the Wild",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/vengeance_in_the_wild_poster.png",
        rent: true,
    },
    {
        id: 8,
        title: "The Charlie Game",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/the_charlie_game_shadows_unleashed_poster.png",
    },
    {
        id: 9,
        title: "Family Feud Fiasco",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/family_feud_fiasco_poster.png",
    },
    {
        id: 10,
        title: "Hearts of Valor",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/hearts_of_valor_poster.png",
    },
];
const payPerView = [
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
        title: "Broken Sanctuary",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/broken_sanctuary_poster.png",
    },
    {
        id: 7,
        title: "Vengeance in the Wild",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/vengeance_in_the_wild_poster.png",
        rent: true,
    },
    {
        id: 8,
        title: "The Charlie Game",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/the_charlie_game_shadows_unleashed_poster.png",
    },
    {
        id: 9,
        title: "Family Feud Fiasco",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/family_feud_fiasco_poster.png",
    },
    {
        id: 10,
        title: "Hearts of Valor",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/hearts_of_valor_poster.png",
    },
];
const popularMovies = [
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
        title: "Broken Sanctuary",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/broken_sanctuary_poster.png",
    },
    {
        id: 7,
        title: "Vengeance in the Wild",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/vengeance_in_the_wild_poster.png",
        rent: true,
    },
    {
        id: 8,
        title: "The Charlie Game",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/the_charlie_game_shadows_unleashed_poster.png",
    },
    {
        id: 9,
        title: "Family Feud Fiasco",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/family_feud_fiasco_poster.png",
    },
    {
        id: 10,
        title: "Hearts of Valor",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/hearts_of_valor_poster.png",
    },
];
const latestMovies = [
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
        title: "Broken Sanctuary",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/broken_sanctuary_poster.png",
    },
    {
        id: 7,
        title: "Vengeance in the Wild",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/vengeance_in_the_wild_poster.png",
        rent: true,
    },
    {
        id: 8,
        title: "The Charlie Game",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/the_charlie_game_shadows_unleashed_poster.png",
    },
    {
        id: 9,
        title: "Family Feud Fiasco",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/family_feud_fiasco_poster.png",
    },
    {
        id: 10,
        title: "Hearts of Valor",
        image: "https://apps.iqonic.design/streamit-laravel/storage/streamit-laravel/hearts_of_valor_poster.png",
    },
];
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
