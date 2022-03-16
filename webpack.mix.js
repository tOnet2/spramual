const mix = require('laravel-mix');

mix.scripts([
    'resources/assets/js/bootstrap/bootstrap.bundle.js',
    'resources/assets/js/main.js'
], 'public/assets/js/main.js')

mix.styles([
    'resources/assets/css/bootstrap/bootstrap.css',
], 'public/assets/css/main.css')

mix.copy([
    'resources/assets/js/bootstrap/bootstrap.bundle.js.map'
], 'public/assets/js/bootstrap.bundle.js.map')

mix.copy([
    'resources/assets/css/bootstrap/bootstrap.css.map'
], 'public/assets/css/bootstrap.css.map')

mix.copyDirectory('resources/assets/img/used-icons', 'public/assets/img/icons');

/*.js('resources/js/app.js', 'public/js')*/
mix.postCss('resources/assets/css/tailwind.css', 'public/assets/css', [
        require("tailwindcss"),
    ])
    .sass('resources/assets/sass/app.scss', 'public/assets/css');
