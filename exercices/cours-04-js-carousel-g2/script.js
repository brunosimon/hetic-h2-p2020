var carousel = {};

carousel.el              = {};
carousel.el.container    = document.querySelector( '.carousel' );
carousel.el.slides_mover = carousel.el.container.querySelector( '.slides-mover' );
carousel.el.next         = carousel.el.container.querySelector( '.siblings .next' );
carousel.el.prev         = carousel.el.container.querySelector( '.siblings .prev' );
carousel.el.slides       = carousel.el.container.querySelectorAll( '.slide' );

carousel.index = 0;
carousel.count = carousel.el.slides.length;

carousel.el.next.addEventListener( 'click', function( event )
{
	carousel.index++;

	if( carousel.index >= carousel.count )
		carousel.index = 0;

	var x = - carousel.index * 600;

	carousel.el.slides_mover.style.transform = 'translateX(' + x + 'px)';

	event.preventDefault();
} );

carousel.el.prev.addEventListener( 'click', function( event )
{
	carousel.index--;

	if( carousel.index < 0 )
		carousel.index = carousel.count - 1;

	var x = - carousel.index * 600;

	carousel.el.slides_mover.style.transform = 'translateX(' + x + 'px)';

	event.preventDefault();
} );