var gulp          = require( 'gulp' ),
	gulp_css_nano = require( 'gulp-cssnano' ),
	gulp_rename   = require( 'gulp-rename' ),
	gulp_concat   = require( 'gulp-concat' ),
	gulp_uglify   = require( 'gulp-uglify' );

gulp.task( 'css', function()
{
    return gulp.src( './src/css/style.css' )
        .pipe( gulp_css_nano() )
        .pipe( gulp_rename( 'style.min.css' ) )
        .pipe( gulp.dest( './src/css/' ) );
} );

gulp.task( 'js', function()
{
	return gulp.src( [
			'./src/js/fastclick.js',
			'./src/js/script.js'
		] )
		.pipe( gulp_concat( 'script.min.js' ) )
		.pipe( gulp_uglify() )
		.pipe( gulp.dest( './src/js/' ) );
} );

gulp.task( 'watch', function()
{
	gulp.watch( './src/css/style.css', [ 'css' ] );
	gulp.watch( [ './src/js/**', '!./src/js/script.min.js' ], [ 'js' ] );
} );

gulp.task( 'default', [ 'css', 'js', 'watch' ] );