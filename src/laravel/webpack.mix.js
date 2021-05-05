const mix = require("laravel-mix");

require("vuetifyjs-mix-extension");
const CompressionPlugin = require("compression-webpack-plugin");

if (!mix.inProduction()) {
    require("laravel-mix-eslint");
    require("laravel-mix-bundle-analyzer");
}

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
    .extract(["vue", "axios"])
    .webpackConfig({
        plugins: [
            new CompressionPlugin({
                filename: "[path]/[name].gz[query]",
                algorithm: "gzip",
                test: /\.js$|\.css$|\.html$|\.svg$/,
                threshold: 10240,
                minRatio: 0.8,
            }),
        ],
    });

if (mix.inProduction()) {
    mix.version();
} else {
    // 本番環境以外ではeslintで成形する
    mix.eslint({
        fix: true,
        extensions: ["js", "vue"],
    });
    // 解析
    mix.bundleAnalyzer();
}

mix.disableNotifications();
