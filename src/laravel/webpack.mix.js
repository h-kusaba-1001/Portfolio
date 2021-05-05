const mix = require("laravel-mix");

require("vuetifyjs-mix-extension");
require("laravel-mix-eslint");

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
mix.webpackConfig({
    resolve: {
        alias: {
            // eslint-disable-next-line no-undef
            "@": __dirname + "/resources/js",
        },
    },
});

mix.js("resources/js/app.js", "public/js")
    .copy("resources/js/pages", "public/js/pages")
    .vue()
    .sass("resources/sass/app.scss", "public/css")
    .vuetify("vuetify-loader")
    .postCss("resources/css/app.css", "public/css")
    .extract();

if (mix.inProduction()) {
    mix.version();
} else {
    // 本番環境以外ではeslintで成形する
    mix.eslint({
        fix: true,
        extensions: ["js", "vue"],
    });
}

mix.disableNotifications();
