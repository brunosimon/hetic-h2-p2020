var canvas  = document.querySelector( 'canvas' ),
	context = canvas.getContext( '2d' );

// context.beginPath();
// context.moveTo( 50, 50 );
// context.lineTo( 200, 200 );
// context.lineTo( 50, 200 );
// context.closePath();

// context.lineWidth     = 20;
// context.lineCap       = 'round';
// context.lineJoin      = 'bevel';
// context.strokeStyle   = 'orange';
// context.fillStyle     = 'orange';
// context.shadowColor   = 'rgba(0,0,0,0.5)';
// context.shadowBlur    = 50;
// context.shadowOffsetX = 5;
// context.shadowOffsetY = 10;

// context.fillStyle = 'orange';
// context.lineWidth = 20;

// context.beginPath();
// context.rect( 50, 50, 200, 100 );
// context.closePath();

// context.stroke();

// context.beginPath();
// context.moveTo( 400, 100 );
// context.arc( 400, 100, 50, 0, Math.PI * 0.5, true );

// context.fill();

// context.fillStyle = '#aaa';
// context.fillRect( 50, 200, 240, 200 );
// context.clearRect( 50, 200, 40, 40 );
// context.clearRect( 130, 200, 40, 40 );
// context.clearRect( 210, 200, 40, 40 );

// var text = 'Il neige !';

// context.font         = '40px Arial';
// context.fillStyle    = 'red';
// context.textAlign    = 'center';
// context.textBaseline = 'alphabetic';

// console.log( context.measureText( text ) );

// context.fillText( text, 300, 100 );

// var image = new Image();
// image.addEventListener( 'load', function()
// {
// 	context.drawImage( image, 0, 0, image.width * 0.1, image.height * 0.1 );
// } );
// image.src = 'image-1.jpg';

// var gradient = context.createLinearGradient( 50, 50, 250, 250 );
// gradient.addColorStop( 0,   'rgb(255, 80, 0)' );
// gradient.addColorStop( 0.5, 'rgb(255, 191, 0)' );
// gradient.addColorStop( 1,   'rgb(255, 246, 155)' );

// context.fillStyle = gradient;

// context.fillRect( 0, 0, 400, 400 );

// var gradient = context.createRadialGradient(399, 100, 50, 150, 100, 300);
// gradient.addColorStop( 0,   'rgb(255, 80, 0)' );
// gradient.addColorStop( 0.5, 'rgb(255, 191, 0)' );
// gradient.addColorStop( 1,   'rgb(255, 246, 155)' );

// context.fillStyle = gradient;
// context.fillRect( 0, 0, 600, 400 );

// context.beginPath();
// context.moveTo( 50, 50 );
// context.bezierCurveTo(
// 	300,
// 	100,
// 	100,
// 	300,
// 	300,
// 	300
// );

// context.stroke();

// context.beginPath();
// context.moveTo( 50, 50 );
// context.quadraticCurveTo(
//     300,
//     100,
//     300,
//     300
// );

// context.stroke();

// context.globalAlpha = 0.3;

// context.fillStyle = '#ff0000';
// context.fillRect(50, 50, 200, 200);

// context.fillStyle = '#00ff00';
// context.fillRect(100, 100, 200, 200);

// context.fillStyle = '#0000ff';
// context.fillRect(150, 150, 200, 200);


// context.fillStyle = 'red';
// context.fillRect(200, 200, 200, 200);

// context.globalCompositeOperation = 'destination-out';

// context.beginPath();
// context.fillStyle = 'blue';
// context.arc(200, 250, 100, 0, Math.PI, false);
// context.fill();

// context.globalCompositeOperation = 'lighter';

// context.fillStyle = '#ff0000';
// context.fillRect(50, 50, 200, 200);

// context.fillStyle = '#00ff00';
// context.fillRect(100, 100, 200, 200);

// context.fillStyle = '#0000ff';
// context.fillRect(150, 150, 200, 200);

// var image = new Image();
// image.onload = function()
// {
// 	context.drawImage( image, 0, 0, image.width * 0.2, image.height * 0.2 );
	
// 	var image_data = context.getImageData( 0, 0, image.width * 0.2, image.height * 0.2 );

// 	for( var i = 0; i < image_data.data.length; i += 4 )
// 	{
// 		var r = image_data.data[ i ],
// 			g = image_data.data[ i + 1 ],
// 			b = image_data.data[ i + 2 ],
// 			a = image_data.data[ i + 3 ];

// 		var result = 0.2 * r + 0.2 * g + 0.2 * b;

// 		image_data.data[ i ]     = result;
// 		image_data.data[ i + 1 ] = result;
// 		image_data.data[ i + 2 ] = result;
// 	}

//     context.putImageData( image_data, 0, 0 );
// };

// image.src = 'image-1.jpg';


var mouse = { x: 0, y: 0 };
document.addEventListener( 'mousemove', function( event )
{
	mouse.x = event.clientX;
	mouse.y = event.clientY;
} );



var coords = { x: 0, y: 200 };

function loop()
{
	window.requestAnimationFrame( loop );

	context.clearRect( 0, 0, canvas.width, canvas.height );

	// coords.x += 4;
	// coords.y = 200 - Math.abs(Math.cos(coords.x * 0.02)) * 100;
	// if( coords.x > canvas.width + 50 )
	// 	coords.x = - 50;

	coords.x += (mouse.x - coords.x) * 0.1;
	coords.y += (mouse.y - coords.y) * 0.1;

	context.beginPath();
	context.arc( coords.x, coords.y, 50, 0, Math.PI * 2 );
	context.fillStyle = 'orange';
	context.fill();
}

loop();