import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'
import path from 'path'

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true
    }),
    vue({
      template: {
        base: null,
        includeAbolute: false
      }
    })
  ],
  resolve: {
    alias: {
      'ziggy-js': path.resolve('vendor/tightenco/ziggy/dist/vue.es.js')
      // 'vendor/tightenco/ziggy/dist/vue.es.js' if using the Vue plugin
    }
  }
})
