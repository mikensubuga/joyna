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


.styles(['resources/assets/css/libs/blog-post.css',
'resources/assets/css/libs/bootstrap.css',
'resources/assets/css/libs/style.css',
'resources/assets/css/libs/font-awesome.css',
'resources/assets/css/libs/custom.css',
'resources/assets/css/libs/metisMenu.css',
'resources/assets/css/libs/sb-admin-2.css'],
'public/css/libs.css')
.sourceMaps()
//.sass('resources/sass/admin/layout3/layout.scss','public/css/metronic.css');
 .sass('resources/sass/app.scss', 'public/css');
