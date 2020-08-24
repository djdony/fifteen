require('dotenv').config()

export default {

  mode: 'universal',

  target: 'server',

  head: {
    title: process.env.npm_package_name || '',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: process.env.npm_package_description || '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },

  css: [
  ],

  plugins: [
  ],

  components: true,

  buildModules: [
  ],

  modules: [
    '@nuxtjs/bulma',
    '@nuxtjs/axios',
    '@nuxtjs/auth'
  ],

  build: {
    postcss: {
      preset: {
        features: {
          customProperties: false
        }
      }
    }
  },
  axios: {
    baseURL: process.env.API_URL
  },

  auth: {
    cookie: false,
    strategies: {
      local: {
        endpoints: {
          login: { url: '/login', method: 'post', propertyName: 'token' },
          user: { url: '/user', method: 'get', propertyName: '' },
          logout: { url: '/logout', method: 'post' }
        }
      }
    }
  },
}
