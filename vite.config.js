import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
// https://vitejs.dev/config/
export default defineConfig(({ command, mode }) => {
  // const base = command === 'serve' ? '/' : '/bed_develop/'
  const base = '/bed_develop/'; // test for preview
  return {
  plugins: [
    vue(),
  ],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url))
    }
  },
  base: base,
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
}
})
