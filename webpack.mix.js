const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'public/site/assets/css/style-starter.css',
], 'public/css/all.css');

mix.scripts([
    'public/site/assets/js/theme-change.js',
    'public/site/assets/js/owl.carousel.js',
    'public/site/assets/js/bootstrap.min.js',
], 'public/js/all.js');

mix.js('resources/js/app2.js', 'public/js/app2.js')


