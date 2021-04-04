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
  .options({
    hmrOptions: {
      host: 'laravel.test',
      port: 8080,
    }
  })
  .setPublicPath('./public')
  .vue();