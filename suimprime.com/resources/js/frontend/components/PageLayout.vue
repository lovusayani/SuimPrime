<template>
    <div class="layout-wrapper bg-dark text-light">
        <!-- Navbar -->
        <Navbar />

        <!-- Page Content -->
        <main class="main-content">
            <router-view />
        </main>

        <!-- Footer -->
        <footer class="footer">
            <p>© 2025 SUIMPRIME. All rights reserved.</p>
        </footer>
    </div>
</template>

<script setup>
import Navbar from "../components/Navbar.vue";
</script>

<style scoped>
.layout-wrapper {
    /*min-height: 100vh;*/
    display: flex;
    flex-direction: column;
    background-color: #0d0d0d;
}

.main-content {
    flex: 1;
    overflow-x: hidden;
}

/* Footer */
.footer {
    text-align: center;
    padding: 1rem;
    background: #111;
    color: #aaa;
    font-size: 0.9rem;
    border-top: 1px solid rgba(255, 255, 255, 0.05);
}
</style>
