import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({   
    base: '/app/bluebus/public/',
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
