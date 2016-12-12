var gulp         = require( 'gulp' ),
	gulp_stylus  = require( 'gulp-stylus' ),
	gulp_plumber = require( 'gulp-plumber' );

gulp.task( 'css', function()
{
	return gulp.src( './src/stylus/main.styl' )
		.pipe( gulp_plumber() )
		.pipe( gulp_stylus( { compress: true } ) )
		.pipe( gulp.dest( './src/css/' ) );
} );

gulp.task( 'watch', function()
{
	gulp.watch( './src/stylus/**', [ 'css' ] );
} );

gulp.task( 'default', [ 'css', 'watch' ] );