var player = {};
player.elements               = {};
player.elements.container     = document.querySelector( '.player' );
player.elements.video         = player.elements.container.querySelector( 'video' );
player.elements.toggle_play   = player.elements.container.querySelector( '.toggle-play' );
player.elements.seek_bar      = player.elements.container.querySelector( '.seek-bar' );
player.elements.seek_bar_fill = player.elements.seek_bar.querySelector( '.fill' );

player.elements.toggle_play.addEventListener( 'click', function( event )
{
	if( player.elements.video.paused )
		player.elements.video.play();
	else
		player.elements.video.pause();

	event.preventDefault();
} );

player.elements.video.addEventListener( 'play', function()
{
	player.elements.container.classList.add( 'playing' );
} );

player.elements.video.addEventListener( 'pause', function()
{
	player.elements.container.classList.remove( 'playing' );
} );

player.elements.video.addEventListener( 'timeupdate', function()
{
	var ratio = player.elements.video.currentTime / player.elements.video.duration;
	player.elements.seek_bar_fill.style.transform = 'scaleX(' + ratio + ')';
} );

player.elements.seek_bar.addEventListener( 'click', function( event )
{
	var ratio = ( event.clientX - player.elements.seek_bar.offsetLeft ) / player.elements.seek_bar.offsetWidth,
		time  = player.elements.video.duration * ratio;

	player.elements.video.currentTime = time;
	player.elements.video.play();
} );