export default {
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'frontend',
    htmlAttrs: {
      lang: 'en'
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
      { name: 'format-detection', content: 'telephone=no' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: ['~/plugins/axios.js'],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
  ],
  axios: {
    // baseURL: 'http://nuxt-api.local:8888//api/',
    credentials: true, // this says that in the request the httponly cookie should be sent
    proxy: true,

  },
  proxy: {
      '/api/login':
      { target: 'http://nuxt-api.local:8888//api/login',pathRewrite: {'^/api/login': ''},  changeOrigin: true },
      '/api/register':
      { target: 'http://nuxt-api.local:8888//api/register',pathRewrite: {'^/api/register': ''},  changeOrigin: true },

      '/api/basic_location':
      { target: 'http://nuxt-api.local:8888//api/basic_location',pathRewrite: {'^/api/basic_location': ''},  changeOrigin: true },

      '/api/current_location':
      { target: 'http://nuxt-api.local:8888//api/current_location',pathRewrite: {'^/api/current_location': ''},  changeOrigin: true },
      '/api/trolleys': { target: 'http://nuxt-api.local:8888//api/trolleys',pathRewrite: {'^/api/trolleys': ''},  changeOrigin: true },
  },

  router: {
    middleware: 'refreshToken',
  },
  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/buefy
    'nuxt-buefy',
    '@nuxtjs/axios',
    '@nuxtjs/auth-next',
    '@nuxtjs/proxy',
    'cookie-universal-nuxt',
  ],

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
  },
  server: {
    host: "192.168.88.34",
    // port: 8000 // default: 3000
  }
}
