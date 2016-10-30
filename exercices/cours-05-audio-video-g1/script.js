// Create all needed variables
var player = {};

player.elements               = {};
player.elements.container     = document.querySelector( '.player' );
player.elements.video         = player.elements.container.querySelector( 'video' );
player.elements.controls      = player.elements.container.querySelector( '.controls' );
player.elements.toggle_play   = player.elements.controls.querySelector( '.toggle-play' );
player.elements.seek_bar      = player.elements.controls.querySelector( '.seek-bar' );
player.elements.seek_bar_fill = player.elements.seek_bar.querySelector( '.fill' );

// Listen to click on toggle play button
player.elements.toggle_play.addEventListener( 'click', function( event ){

	// Toggle play
	if( player.elements.video.paused )
		player.elements.video.play();
	else
		player.elements.video.pause();

	// Prevent default event
	event.preventDefault();
} );

// Video play event
player.elements.video.addEventListener( 'play', function(){

	// Change container class
	player.elements.container.classList.add( 'playing' );
} );

// Video pause event
player.elements.video.addEventListener( 'pause', function(){

	// Change container class
	player.elements.container.classList.remove( 'playing' );
} );

// Seekbar click event
player.elements.seek_bar.addEventListener( 'click', function( event ){

	// Get ratio between 0 and 1
	var ratio = (event.clientX - player.elements.seek_bar.offsetLeft);
	ratio /= player.elements.seek_bar.offsetWidth;

	// Get time according to ratio
	var time = ratio * player.elements.video.duration;

	// Update time
	player.elements.video.currentTime = time;
} );

window.setInterval( function()
{
	var ratio = player.elements.video.currentTime / player.elements.video.duration;
	
	player.elements.seek_bar_fill.style.transform = 'scaleX(' + ratio + ')';
}, 50 );