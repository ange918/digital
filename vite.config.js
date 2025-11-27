import { defineConfig } from 'vite'
import { resolve } from 'path'

export default defineConfig({
  root: 'src',
  publicDir: '../public',
  build: {
    outDir: '../dist',
    emptyOutDir: true,
    rollupOptions: {
      input: {
        main: resolve(__dirname, 'src/index.html'),
        about: resolve(__dirname, 'src/about.html'),
        services: resolve(__dirname, 'src/services.html'),
        serviceWeb: resolve(__dirname, 'src/service-web.html'),
        serviceFlyers: resolve(__dirname, 'src/service-flyers.html'),
        serviceChanson: resolve(__dirname, 'src/service-chanson.html'),
        portfolio: resolve(__dirname, 'src/portfolio.html'),
        contact: resolve(__dirname, 'src/contact.html')
      }
    }
  },
  server: {
    host: '0.0.0.0',
    port: 5000,
    allowedHosts: true,
    hmr: {
      clientPort: 443,
      protocol: 'wss'
    }
  },
  preview: {
    host: '0.0.0.0',
    port: 5000
  }
})
