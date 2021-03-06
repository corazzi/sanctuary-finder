const mix = require('laravel-mix');

require('laravel-mix-tailwind');
const tailwindcss = require('tailwindcss');
require('laravel-mix-purgecss');

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
    .sass('resources/sass/app.scss', 'public/css')
    .copy('resources/img', 'public/img')

    .options({
        postCss: [ tailwindcss('./tailwind.config.js') ],
    })
   .tailwind('./tailwind.config.js');

if (mix.inProduction()) {
  mix
   .version()
   .purgeCss();
}
