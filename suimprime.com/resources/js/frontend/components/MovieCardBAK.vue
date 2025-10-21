<template>
    <div class="movie-card text-center position-relative">
        <!-- Rank Badge -->
        <span v-if="movie.rank" class="rank-number">{{ movie.rank }}</span>

        <img
            :src="movie.image"
            class="img-fluid rounded-3 mb-2"
            :alt="movie.title"
        />
        <h6 class="text-white mb-0">{{ movie.title }}</h6>
        <small class="text-secondary">{{ movie.genre }}</small>
    </div>
</template>

<script setup>
defineProps({ movie: Object });
</script>

<style scoped>
.movie-card {
    flex: 0 0 auto;
    width: 180px;
    position: relative;
}

.movie-card img {
    transition: transform 0.3s ease;
}

.movie-card img:hover {
    transform: scale(1.05);
}

/* Top 10 Rank Number */
.rank-number {
    position: absolute;
    bottom: 10px;
    left: 10px;
    font-size: 3rem;
    font-weight: 700;
    color: rgba(255, 255, 255, 0.2);
    z-index: 2;
    pointer-events: none;
}
</style>
