const mix = require('laravel-mix')

// mix.js('resources/assets/js/app.js', 'public/js').vue()

mix
    .copy('public/spa/index.html', 'resources/views/converses/login.blade.php')
    .copyDirectory('public/spa', 'public')