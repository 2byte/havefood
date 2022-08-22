import { defineConfig } from "vitest/config";
import Vue from "@vitejs/plugin-vue";

export default defineConfig({
  plugins: [Vue()],
  test: {
    globals: true,
    environment: "jsdom",
    include: '__tests__/**/*.js',
    watchExclude: [
      '**/node_modules/**',
      '**/vendor/**',
      '**/app/**',
    ],
    watch: true
  },
  root: ".", //Define the root
  resolve: {
    alias: {
      '@': '/resources/scripts',
    },
  }
});