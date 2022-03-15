const mix = require('laravel-mix');

mix.scripts([
    'resources/js/bootstrap/bootstrap.bundle.js',
    'resources/js/main.js'
], 'public/js/main.js')

mix.styles([
    'resources/css/bootstrap/bootstrap.css',
], 'public/css/main.css')

mix.copy([
    'resources/js/bootstrap/bootstrap.bundle.js.map'
], 'public/js/bootstrap.bundle.js.map')

mix.copy([
    'resources/css/bootstrap/bootstrap.css.map'
], 'public/css/bootstrap.css.map')

/*.js('resources/js/app.js', 'public/js')*/
mix.postCss('resources/css/tailwind.css', 'public/css', [
        require("tailwindcss"),
    ])
    .sass('resources/sass/app.scss', 'public/css');
