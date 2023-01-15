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

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);
mix
  .js('resources/js/app.js', 'public/js')
  .js("resources/js/router.js", "public/js")
  .css('resources/css/app.css', 'public/css')
  .version()
  .vue()   
  // browserSyncの設定
  .browserSync({
  files: [
      'resources/**/*',
      'app/**/*',
      'config/**/*',
      'routes/**/*',
      'public/**/*'
  ],
  proxy: 'http://localhost:1080',
  });
