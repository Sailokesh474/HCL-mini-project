'use strict'

const { babel } = require('@rollup/plugin-babel')

const pkg = require('../../package')
const year = new Date().getFullYear()


module.exports = {
  input: 'build/js/AdminLTE.js',
  output: {
    banner,
    file: 'dist/js/adminlte.js',
    format: 'umd',
    globals: {
      jquery: 'jQuery'
    },
    name: 'adminlte'
  },
  external: ['jquery'],
  plugins: [
    babel({
      exclude: 'node_modules/**',
      
      babelHelpers: 'bundled'
    })
  ]
}
