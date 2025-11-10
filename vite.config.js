import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            // Hapus plugin vue dari sini
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        // Hapus vue() dari sini
    ],
});