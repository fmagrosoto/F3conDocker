const { series, src, dest, watch } = require('gulp')
const header = require('gulp-header')
const pkg = require('./package.json')
const rename = require('gulp-rename')
const sass = require('gulp-sass')(require('sass'))
sass.compiler = require('sass')
const terser = require('gulp-terser-js')
const browserSync = require('browser-sync').create()
const banner = ['/*!\n',
  ' * <%= pkg.description %> v<%= pkg.version %> (<%= pkg.homepage %>)\n',
  ' * Copyright ' + (new Date()).getFullYear(), '\n',
  ' * Este es otro proyecto de dIGITAE \n',
  ' */\n\n\n\n\n',
  ''
].join('')

/**
 * TRATA ARCHIVOS SCSS
 *
 * Esta función sirve para transpilar, minificar, grabar y renombrar archivos de SCSS
 * a CSS. Pasando por la carpeta SOURCE hacia la carpeta estática de CSS del proyecto.
 * @author Fernando Magrosoto V. <fmagrosoto@gmail.com>
 * @since 0.0.1
 * @copyright 2021, Fernando G. Magrosoto Vásquez
 */
function css () {
  return src('./source/scss/**/*.scss')
    .pipe(sass({
      outputStyle: 'compressed'
    }).on('error', sass.logError))
    .pipe(header(banner, { pkg }))
    .pipe(rename({ extname: '.min.css' }))
    .pipe(dest('./html/css'))
}

/**
 * TRATAR ARCHIVOS JS
 *
 * Función para minimizar, grabar y renombrar archivos JS.
 * @author Fernando Magrosoto V. <fmagrosoto@gmail.com>
 * @since 0.0.1
 * @copyright 2021, Fernando G. Magrosoto Vásquez
 */
function js () {
  return src('./source/js/**/*.js')
    .pipe(terser({
      mangle: {
        toplevel: true
      }
    }))
    .on('error', function (error) {
      console.error(error)
      this.emit('end')
    })
    .pipe(header(banner, { pkg }))
    .pipe(rename({ extname: '.min.js' }))
    .pipe(dest('./html/js'))
}

/**
 * ACTIVAR BROWSERSYNC
 *
 * Y poder abrir el navegador por default con la página del proyecto.
 * Nota que estamos usando PROXY porque el sitio es dinámico.
 * @example http://localhost:5151
 * @see https://coder-coder.com/quick-guide-to-browsersync-gulp-4/
 * @since 0.0.1
 * @param {Function} cb Función para callback
 */
function server (cb) {
  browserSync.init({
    proxy: 'localhost:8000',
    port: 8080
  })
  cb()
}

/**
 * REFRESCAR EL NAVEGADOR CUANDO ALGO SUCEDA
 *
 * Cada vez que haya un HTML, CSS o JS modificado, el explorador se refrescará y
 * mostrará los cambios... justo frente a tus ojos.
 * @since 0.0.1
 * @see https://coder-coder.com/quick-guide-to-browsersync-gulp-4/
 * @param {Function} cb Función para callback
 */
function browsersyncReload (cb) {
  browserSync.reload()
  cb()
}

/**
 * FUNCIÓN PARA DECLARAR LAS TAREAS QUE GULP ESTARÁ A LA ESCUCHA
 *
 * @author Fernando Magrosoto V. <fmagrosoto@gmail.com>
 * @since 0.0.1
 * @copyright 2021, Fernando G. Magrosoto Vásquez
 */
function watchfiles () {
  watch('./html/app/views/**/*.html', browsersyncReload)
  watch('./html/app/**/*.php', browsersyncReload)
  watch('./source/scss/**/*.scss', series(css, browsersyncReload))
  watch('./source/js/**/*.js', series(js, browsersyncReload))
}

exports.watcher = series(server, watchfiles)
exports.default = series(js, css)
