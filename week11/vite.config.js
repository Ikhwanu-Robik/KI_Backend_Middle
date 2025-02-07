import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
        port: 5173,
        https: {
            key: 'C:/laragon/etc/ssl/laragon.key',
            cert: 'C:/laragon/etc/ssl/laragon.crt',
        },
        hmr: {
            host: 'week11.test'
        },
    }  
});
