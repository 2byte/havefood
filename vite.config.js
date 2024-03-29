import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scripts/mainApp.js',
                'resources/scripts/admin/adminApp.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    server: {
        watch: {
            //usePolling: true,
            ignored: [
                '/node_modules/**',
                '/vendor/**'
            ]
        }
    },
    resolve: {
        alias: {
            '@': '/resources/scripts',
        },
    },
    define: {
      'process.env': process.env
    }
});
