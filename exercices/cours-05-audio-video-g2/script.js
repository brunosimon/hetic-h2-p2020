var player = {};

// Create every needed variables
player.el               = {};
player.el.container     = document.querySelector( '.player' );
player.el.video         = player.el.container.querySelector( 'video' );
player.el.controls      = player.el.container.querySelector( '.controls' );
player.el.toggle_play   = player.el.controls.querySelector( 'a.toggle-play' );
player.el.seek_bar      = player.el.controls.querySelector( '.seek-bar' );
player.el.seek_bar_full = player.el.seek_bar.querySelector( '.full' );


// Listen to click event on toggle play button
player.el.toggle_play.addEventListener( 'click', function( event ){

	// Toggle play
	if( player.el.video.paused )
		player.el.video.play();
	else
		player.el.video.pause();

	// Prevent default event
	event.preventDefault();
} );

// Listen to play event on video
player.el.video.addEventListener( 'play', function(){

	// Update class
	player.el.container.classList.add( 'playing' );
} );

// Listen to pause event on video
player.el.video.addEventListener( 'pause', function(){

	// Update class
	player.el.container.classList.remove( 'playing' );
} );

// Listen to click event on seek bar
player.el.seek_bar.addEventListener( 'click', function( event ){

	// Calculate the time according to the mouse position
	var seek_bar_width = player.el.seek_bar.offsetWidth,
		seek_bar_left  = player.el.seek_bar.offsetLeft,
		mouse_x        = event.clientX,
		ratio          = ( mouse_x - seek_bar_left ) / seek_bar_width,
		time           = ratio * player.el.video.duration;

	player.el.video.currentTime = time;

	event.preventDefault();
} );

window.setInterval( function(){
	var duration = player.el.video.duration,
		time     = player.el.video.currentTime,
		ratio    = time / duration;

	player.el.seek_bar_full.style.transform = 'scaleX(' + ratio + ')';
}, 50 );
