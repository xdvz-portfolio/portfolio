import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';
import { resolve } from 'path';
import autoprefixer from 'autoprefixer';

export default defineConfig({
  plugins: [
    react(),
  ],
  base: '/',
  resolve: {
    alias: {
      '@': resolve(__dirname, 'src'),
    },
  },
  css: {
    preprocessorOptions: {
      scss: {
        // Здесь можно добавить глобальные импорты SCSS при необходимости
      },
    },
    postcss: {
      plugins: [
        autoprefixer(),
      ],
    },
  },
  build: {
    // Обеспечиваем сохранение текущей структуры вывода (критически важно)
    outDir: 'dist',
    emptyOutDir: false, // Не удалять другие файлы в папке dist
    manifest: true, // Создаем manifest.json для отслеживания файлов
    rollupOptions: {
      input: {
        main: resolve(__dirname, 'src/index.js'),
      },
      output: {
        entryFileNames: 'build.js',
        assetFileNames: (assetInfo) => {
          if (assetInfo.name.endsWith('.css')) {
            return 'build.css';
          }
          return 'assets/[name]-[hash].[ext]';
        },
        chunkFileNames: 'chunks/[name]-[hash].js',
      },
    },
    sourcemap: true,
    minify: 'terser',
  },
  server: {
    host: '0.0.0.0',
    port: 3000,
    open: 'http://rshop.local'
  },
}); 