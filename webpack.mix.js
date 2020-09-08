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
    // .js('resources/js/users.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .copy('node_modules/ckeditor4/config.js', 'public/js/ckeditor/config.js')
    .copy('node_modules/ckeditor4/styles.js', 'public/js/ckeditor/styles.js')
    .copy('node_modules/ckeditor4/contents.css', 'public/js/ckeditor/contents.css')
    .copyDirectory('node_modules/ckeditor4/skins', 'public/js/ckeditor/skins')
    .copyDirectory('node_modules/ckeditor4/lang', 'public/js/ckeditor/lang')
    .copyDirectory('node_modules/ckeditor4/plugins', 'public/js/ckeditor/plugins');

