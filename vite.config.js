import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        vue({
            template: {
                compilerOptions: {
                    // i am ignorning my custom '<ion-icon>' tag
                    isCustomElement: (tag) => ["ion-icon"].includes(tag),
                },
            },
        }),
        laravel({
            input: [
                'resources/css/scss/main.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    optimizeDeps: {
        // exclude: ['js-big-decimal']
    }
});