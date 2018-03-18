let mix = require('laravel-mix');

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

if(process.env.APP_EV === 'test')
{
	mix.setResourceRoot('../../appdev/');
	mix.setPublicPath('../../wordpress/appdev/');
	
	mix.js('resources/assets/js/app.js', 'js')
	.js('resources/assets/js/bootstrap.js', 'js')
	.js('resources/assets/js/bootstrap.min.js', 'js')
   .sass('resources/assets/sass/app.scss', 'css')
   .sass('resources/assets/sass/custom.scss', 'css');
}
else
{
mix.js('resources/assets/js/app.js', 'public/js')
	.js('resources/assets/js/bootstrap.js', 'public/js')
	.js('resources/assets/js/bootstrap.min.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/custom.scss', 'public/css');
}
