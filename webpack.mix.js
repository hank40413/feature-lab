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

mix.js('resources/js/app.js', 'public/mix/js')
    .sass('resources/sass/app.scss', 'public/mix/css');
mix.scripts('resources/js/instascan.min.js', 'public/mix/js/instascan.min.js');
mix.scripts('node_modules/sweetalert2/dist/sweetalert2.min.js', 'public/mix/js/sweetalert2.min.js');
mix.styles('node_modules/sweetalert2/dist/sweetalert2.min.css', 'public/mix/css/sweetalert2.min.css');
