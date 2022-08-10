import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/auth/login.js',
                'resources/js/auth/register.js'
            ],
            refresh: true,
        }),
    ],
});
