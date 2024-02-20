const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/assets/site/js')
    .sass('resources/scss/site/app.scss', 'public/assets/site/css');

mix
    .js('resources/js/plugins/admin.js', 'public/assets/admin/js')
    .js('resources/js/app.js', 'public/assets/admin/js')
    .js('resources/js/site.js', 'public/assets/site/js')
    .vue()
    .sass('resources/scss/admin/app.scss', 'public/assets/admin/css')
