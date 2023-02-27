import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/components/sendForm.js',
                'resources/js/components/swal.js',
                'resources/js/auth/login.js',
                'resources/js/auth/register.js',
                'resources/js/teste.js',
            ],
            refresh: true,
        }),
    ],
});
