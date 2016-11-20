var gulp         = require( 'gulp' ),
	gulp_cssnano = require( 'gulp-cssnano' ),
	gulp_rename  = require( 'gulp-rename' );

gulp.task( 'css', function()
{
    return gulp.src( './src/css/style.css' )
    	.pipe( gulp_cssnano() )
    	.pipe( gulp_rename( 'style.min.css' ) )
    	.pipe( gulp.dest( './src/css/' ) );
} );