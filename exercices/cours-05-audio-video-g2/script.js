var player = {};

player.el             = {};
player.el.container   = document.querySelector( '.player' );
player.el.video       = player.el.container.querySelector( 'video' );
player.el.toggle_play = player.el.container.querySelector( 'a.toggle-play' );

player.el.toggle_play.addEventListener( 'click', function( event )
{
	if( player.el.video.paused )
		player.el.video.play();
	else
		player.el.video.pause();

	event.preventDefault();
} );