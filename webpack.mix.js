const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/register.js", "public/js")
    .js("resources/js/submission.js", "public/js")
    .js("resources/js/admin.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .sass("resources/sass/seed.scss", "public/css")
    .sass("resources/sass/admin.scss", "public/css")
    .extract(["vue", "jquery", "bootstrap"]);

if (mix.inProduction()) {
    mix.version();
}

// mix.browserSync({
//     prox: 'localhost:8000'
// })
