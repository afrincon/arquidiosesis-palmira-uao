let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
<<<<<<< HEAD
   .browserSync('proyecto.test:8098');
=======
   .browserSync('proyecto.io:8080');
>>>>>>> 9634254d5633c363211b2ce6de5789fce1bb362e
