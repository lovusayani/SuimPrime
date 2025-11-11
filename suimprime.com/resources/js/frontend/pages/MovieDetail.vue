<template>
    <div class="movie-detail-page">
        <!-- Loading State -->
        <div v-if="loading" class="loading-container">
            <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="text-light mt-3">Loading movie...</p>
        </div>

        <!-- Error State -->
        <div v-else-if="error" class="error-container">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Error</h4>
                <p>{{ error }}</p>
                <hr />
                <button @click="$router.go(-1)" class="btn btn-outline-light">
                    ← Go Back
                </button>
            </div>
        </div>

        <!-- Movie Content -->
        <div v-else-if="movie" class="movie-content">
            <!-- Video Player Section -->
            <div class="player-container">
                <div class="player-wrapper">
                    <!-- YouTube Player -->
                    <div v-if="movie.youtube_url" class="youtube-player">
                        <iframe
                            :src="getYouTubeEmbedUrl(movie.youtube_url)"
                            frameborder="0"
                            allowfullscreen
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            class="video-player"
                        ></iframe>
                    </div>

                    <!-- Fallback if no YouTube URL -->
                    <div v-else class="no-video">
                        <div class="no-video-content">
                            <i
                                class="ph ph-video-camera ph-5x text-muted mb-3"
                            ></i>
                            <h4 class="text-muted">Video not available</h4>
                            <p class="text-muted">
                                This movie doesn't have a video source
                                available.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Player Controls Overlay -->
                <div class="player-controls">
                    <button
                        @click="$router.go(-1)"
                        class="btn btn-outline-light back-btn"
                    >
                        <i class="ph ph-arrow-left"></i> Back
                    </button>

                    <div class="movie-info-overlay">
                        <h1 class="movie-title">{{ movie.title }}</h1>
                        <div class="movie-meta">
                            <span v-if="movie.year" class="year">{{
                                movie.year
                            }}</span>
                            <span v-if="movie.duration" class="duration">{{
                                formatDuration(movie.duration)
                            }}</span>
                            <span v-if="movie.rating" class="rating">
                                <i class="ph ph-star-fill text-warning"></i>
                                {{ movie.rating }}
                            </span>
                        </div>
                        <p v-if="movie.description" class="movie-description">
                            {{ movie.description }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Movie Details Section - Actors, Directors, Similar Movies -->
            <MovieDetailsSection :movieId="movieId" :movie="movie" />

            <!-- Recommended Movies Section - After Player -->
            <RecommendedMovies />
        </div>

        <!-- No Movie Found -->
        <div v-else class="no-movie-container">
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Movie Not Found</h4>
                <p>The requested movie could not be found.</p>
                <hr />
                <button @click="$router.push('/')" class="btn btn-primary">
                    ← Go to Home
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import axios from "../axios";
import RecommendedMovies from "../components/RecommendedMovies.vue";
import MovieDetailsSection from "../components/MovieDetailsSection.vue";

const route = useRoute();
const router = useRouter();

// Reactive data
const movie = ref(null);
const loading = ref(true);
const error = ref(null);

// Get movie ID from route params
const movieId = route.params.id;

// Fetch movie details
const fetchMovieDetails = async () => {
    try {
        loading.value = true;
        const response = await axios.get(`/api/movies/${movieId}`);

        if (response.data && response.data.data) {
            movie.value = response.data.data;
        } else {
            error.value = "Movie not found";
        }
    } catch (err) {
        console.error("Error fetching movie details:", err);

        if (err.response?.status === 401) {
            error.value = "Please login to watch this movie";
            // Redirect to login after 3 seconds
            setTimeout(() => {
                router.push("/login");
            }, 3000);
        } else if (err.response?.status === 403) {
            error.value = "This movie requires an active subscription";
            // Redirect to subscription page after 3 seconds
            setTimeout(() => {
                router.push("/subscription-plan");
            }, 3000);
        } else {
            error.value = "Failed to load movie details";
        }
    } finally {
        loading.value = false;
    }
};

// Convert YouTube URL to embed URL
const getYouTubeEmbedUrl = (url) => {
    if (!url) return "";

    // Extract video ID from various YouTube URL formats
    let videoId = "";

    if (url.includes("youtube.com/watch?v=")) {
        videoId = url.split("v=")[1].split("&")[0];
    } else if (url.includes("youtu.be/")) {
        videoId = url.split("youtu.be/")[1].split("?")[0];
    } else if (url.includes("youtube.com/embed/")) {
        videoId = url.split("embed/")[1].split("?")[0];
    }

    if (videoId) {
        return `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&modestbranding=1&controls=1&fs=1`;
    }

    return url;
};

// Format duration (assuming it's in minutes)
const formatDuration = (duration) => {
    if (!duration) return "";

    const hours = Math.floor(duration / 60);
    const minutes = duration % 60;

    if (hours > 0) {
        return `${hours}h ${minutes}m`;
    }
    return `${minutes}m`;
};

// Lifecycle
onMounted(() => {
    if (movieId) {
        fetchMovieDetails();
    } else {
        error.value = "No movie ID provided";
        loading.value = false;
    }
});
</script>

<style scoped>
.movie-detail-page {
    min-height: 100vh;
    background: #000;
    color: #fff;
}

.loading-container,
.error-container,
.no-movie-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    padding: 2rem;
    text-align: center;
}

.movie-content {
    position: relative;
    min-height: 100vh;
    background: #000;
}

.player-container {
    position: relative;
    width: 100%;
    height: 100vh;
    background: #000;
}

.player-wrapper {
    position: relative;
    width: 100%;
    height: 100%;
}

.youtube-player {
    width: 100%;
    height: 100%;
}

.video-player {
    width: 100%;
    height: 100%;
    border: none;
}

.no-video {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
}

.no-video-content {
    text-align: center;
    padding: 2rem;
}

.player-controls {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(
        to bottom,
        rgba(0, 0, 0, 0.7) 0%,
        rgba(0, 0, 0, 0) 20%,
        rgba(0, 0, 0, 0) 80%,
        rgba(0, 0, 0, 0.8) 100%
    );
    pointer-events: none;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 2rem;
}

.back-btn {
    position: absolute;
    top: 2rem;
    left: 2rem;
    pointer-events: all;
    z-index: 10;
    border-radius: 50px;
    padding: 0.5rem 1rem;
    backdrop-filter: blur(10px);
    background: rgba(0, 0, 0, 0.5);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
}

.back-btn:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.3);
    transform: translateY(-2px);
}

.movie-info-overlay {
    position: absolute;
    bottom: 2rem;
    left: 2rem;
    right: 2rem;
    pointer-events: none;
    max-width: 600px;
}

.movie-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
    line-height: 1.2;
}

.movie-meta {
    display: flex;
    gap: 1.5rem;
    margin-bottom: 1rem;
    align-items: center;
    flex-wrap: wrap;
}

.movie-meta span {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #ccc;
    font-size: 1rem;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
}

.movie-description {
    font-size: 1.1rem;
    line-height: 1.6;
    color: #ddd;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
    max-width: 500px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    line-clamp: 3;
    -webkit-box-orient: vertical;
}

/* Responsive Design */
@media (max-width: 768px) {
    .player-controls {
        padding: 1rem;
    }

    .back-btn {
        top: 1rem;
        left: 1rem;
        padding: 0.4rem 0.8rem;
        font-size: 0.9rem;
    }

    .movie-info-overlay {
        bottom: 1rem;
        left: 1rem;
        right: 1rem;
    }

    .movie-title {
        font-size: 2rem;
    }

    .movie-meta {
        gap: 1rem;
    }

    .movie-meta span {
        font-size: 0.9rem;
    }

    .movie-description {
        font-size: 1rem;
    }
}

@media (max-width: 480px) {
    .movie-title {
        font-size: 1.5rem;
    }

    .movie-meta {
        gap: 0.75rem;
    }

    .movie-meta span {
        font-size: 0.8rem;
    }

    .movie-description {
        font-size: 0.9rem;
        -webkit-line-clamp: 2;
        line-clamp: 2;
    }
}

/* Animation for smooth entry */
.movie-content {
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
</style>
