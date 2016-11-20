// Dependencies
var gulp         = require( 'gulp' ),
	gulp_stylus  = require( 'gulp-stylus' ),
	gulp_plumber = require( 'gulp-plumber' );

// CSS task
gulp.task( 'css', function()
{
	gulp.src( './src/stylus/main.styl' )           // main.styl as input
		.pipe( gulp_plumber() )                         // Gère les erreurs
		.pipe( gulp_stylus( { compress: true } ) ) // Convert to CSS
		.pipe( gulp.dest( './src/css' ) );         // Put it in CSS folder
} );

// Watch task
gulp.task( 'watch', function()
{
	gulp.watch( './src/stylus/**', [ 'css' ] );
} );

// Default task (CSS + watch)
gulp.task( 'default', [ 'css', 'watch' ] );