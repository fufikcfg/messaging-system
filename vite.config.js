import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import { APP_URL } from "./resources/js/src/common/config.js";

export default defineConfig({
    server: {
      hmr: {
          host: APP_URL,
      }
    },
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
