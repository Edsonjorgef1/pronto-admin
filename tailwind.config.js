const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

module.exports = {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/frontend/**/*.vue',
    './resources/prontostack/pronto-ui/**/*.vue'
  ],

  theme: {
    extend: {
      colors: {
        primary: {
          ...colors.violet,
          1000: '#421882'
        },
        success: colors.green,
        warning: colors.yellow,
        danger: colors.red,
        default: colors.slate
      },
      fontFamily: {
        sans: ['Nunito', ...defaultTheme.fontFamily.sans]
      }
    }
  },

  plugins: [
    require('@tailwindcss/forms'),
    require('./resources/prontostack/pronto-ui/src/tailwindcss/pronto-tab-plugin')
  ]
}
