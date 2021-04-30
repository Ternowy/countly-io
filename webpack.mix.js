const mix = require('laravel-mix');
require('mix-tailwindcss');
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

mix
  .webpackConfig({
    devServer: {
      host: 'laravel.test',
      port: 8080,
    },
    resolve: {
      fallback: {
        'crypto': require.resolve('crypto-browserify'),
        'stream': require.resolve('stream-browserify')
      }
    }
  })
  .js('resources/js/app.js', 'public/js')
  .sass("resources/scss/app.scss", "public/css")
  .tailwind('./tailwind.config.js')
  .options({
    hmrOptions: {
      host: 'laravel.test',
      port: 8080,
    },
    processCssUrls: false
  })
  .setPublicPath('./public')
  .vue()
  .sourceMaps()
  .disableNotifications();

if (mix.inProduction()) {
  mix.version();
}
