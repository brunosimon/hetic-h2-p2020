var player = {};

player.elements             = {};
player.elements.container   = document.querySelector( '.player' );
player.elements.video       = player.elements.container.querySelector( 'video' );
player.elements.toggle_play = player.elements.container.querySelector( '.toggle-play' );

player.elements.toggle_play.addEventListener( 'click', function( event )
{
	if( player.elements.video.paused )
		player.elements.video.play();
	else
		player.elements.video.pause();

	event.preventDefault();
} );
