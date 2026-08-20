<<<<<<< HEAD
const mix = require('laravel-mix'); mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css'); 
=======
const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
