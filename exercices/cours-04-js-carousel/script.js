var carousel = {};

carousel.elements              = {};
carousel.elements.main         = document.querySelector( '.carousel' );
carousel.elements.slides_mover = carousel.elements.main.querySelector( '.slides-mover' );
carousel.elements.slides       = carousel.elements.slides_mover.querySelectorAll( '.slide' );
carousel.elements.next         = carousel.elements.main.querySelector( '.next' );
carousel.elements.prev         = carousel.elements.main.querySelector( '.prev' );

carousel.index = 0;

carousel.elements.next.addEventListener( 'click', function( event )
{
	carousel.index++;

	if( carousel.index >= carousel.elements.slides.length )
		carousel.index = 0;

	carousel.elements.slides_mover.style.transform = 'translateX(-' + ( carousel.index * 600 ) + 'px)';

	event.preventDefault();
} );

carousel.elements.prev.addEventListener( 'click', function( event )
{
	carousel.index--;

	if( carousel.index < 0 )
		carousel.index = carousel.elements.slides.length - 1;

	carousel.elements.slides_mover.style.transform = 'translateX(-' + ( carousel.index * 600 ) + 'px)';

	event.preventDefault();
} );