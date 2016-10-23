var carousel = {};

carousel.elements              = {};
carousel.elements.container    = document.querySelector( '.carousel' );
carousel.elements.next         = carousel.elements.container.querySelector( '.next' );
carousel.elements.prev         = carousel.elements.container.querySelector( '.prev' );
carousel.elements.slides_mover = carousel.elements.container.querySelector( '.slides-mover' );
carousel.elements.slides       = carousel.elements.container.querySelectorAll( '.slide' );

carousel.index  = 0;
carousel.length = carousel.elements.slides.length;

carousel.elements.next.addEventListener( 'click', function( event )
{
	carousel.index++;

	if( carousel.index >= carousel.length )
		carousel.index = 0;

	var x = - carousel.index * 600;

	carousel.elements.slides_mover.style.transform = 'translateX(' + x + 'px)';

	event.preventDefault();
} );

carousel.elements.prev.addEventListener( 'click', function( event )
{
	carousel.index--;

	if( carousel.index < 0 )
		carousel.index = carousel.length - 1;

	var x = - carousel.index * 600;

	carousel.elements.slides_mover.style.transform = 'translateX(' + x + 'px)';

	event.preventDefault();
} );