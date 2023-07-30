import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/react/cotizacion/index.jsx',
                'resources/js/pdf/main.js'
            ],
            refresh: true,
        }),
        react()
    ],
});
