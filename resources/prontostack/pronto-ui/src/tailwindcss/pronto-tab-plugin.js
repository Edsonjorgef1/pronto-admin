const plugin = require('tailwindcss/plugin')

const generateColors = (e, colors, prefix) =>
  Object.keys(colors).reduce((acc, key) => {
    if (typeof colors[key] === 'string') {
      return {
        ...acc,
        [`${prefix}-${e(key)}`]: {
          'background-color': colors[key],
          '--pronto-tab-color': colors[key]
        }
      }
    }

    const innerColors = generateColors(e, colors[key], `${prefix}-${e(key)}`)

    return {
      ...acc,
      ...innerColors
    }
  }, {})

module.exports = plugin.withOptions(({ className = 'tab' } = {}) => {
  return ({ e, addUtilities, theme }) => {
    const colors = theme('colors')

    const tabColors = generateColors(e, colors, `.${className}`)

    addUtilities(tabColors)
  }
})
