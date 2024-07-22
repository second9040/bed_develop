import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    vue(),
  ],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url))
    }
  },
  base: process.env.NODE_ENV === 'production' ? '/bed_develop/' : '/', // 在这里设置 base 路径
  css: {
    preprocessorOptions: {
      scss: {
        // additionalData: `
        //   @import "@/styles/variables.scss";
        //   @import "@/styles/mixins.scss";
        // `
      }
    }
  },
})
