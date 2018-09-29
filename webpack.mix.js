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

 mix.js('resources/assets/js/app.js', 'public/bundled/app.js')
 .js('resources/assets/js/viewer.js', 'public/bundled/viewer.js')
 .sass('resources/assets/sass/app.scss', 'public/bundled/app.css')
 .sass('resources/assets/sass/viewer.scss', 'public/bundled/viewer.css')
 .version();

