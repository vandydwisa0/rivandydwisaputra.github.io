/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      extend: {},
      colors: {
      transparent: 'transparent',
      current: 'currentColor',
      'white': '#ffffff',
      'vandy': {
        100: '#84B3BD',
        200: '#568493',
        300: '#375F69',
        400: '#1D3347',
        },
       'dwisa': {
        100: '#8BAA9F',
        200: '#488D7C',
        300: '#397566',
        400: '#46614F',
        500: '#1A3839',
       },
    }
      
    },
    plugins: [
        require('flowbite/plugin')
    ],
  }
