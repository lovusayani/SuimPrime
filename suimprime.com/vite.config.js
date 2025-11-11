
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    define: {
        __VUE_PROD_HYDRATION_MISMATCH_DETAILS__: 'false',
        __VUE_OPTIONS_API__: 'true',
        __VUE_PROD_DEVTOOLS__: 'false',
    },
     server: {
        host: '127.0.0.1',
        port: 5173,
        hmr: {
            host: '127.0.0.1',
        },
        proxy: {
            // Proxy API and Sanctum CSRF requests to the Laravel backend
            '/api': {
                target: 'http://127.0.0.1:8000',
                changeOrigin: true,
                secure: false,
            },
            '/sanctum': {
                target: 'http://127.0.0.1:8000',
                changeOrigin: true,
                secure: false,
            },
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',        // your backend admin CSS
                'resources/js/app.js',          // your backend JS
                'resources/css/frontend.css',   // ✅ new plain frontend CSS
                'resources/js/frontend/app.js', // ✅ new frontend Vue entry
            ],
            refresh: true,
        }),
        vue(),
    ],
});
