var canvas  = document.querySelector( 'canvas' ),
	context = canvas.getContext( '2d' );

context.beginPath();
context.moveTo( 50, 50 );
context.lineTo( 200, 200 );
context.lineTo( 50, 200 );
// context.closePath();

context.lineWidth     = 20;
context.lineCap       = 'round';
context.lineJoin      = 'bevel';
context.strokeStyle   = 'orange';
context.fillStyle     = 'orange';
context.shadowColor   = 'rgba(0,0,0,0.5)';
context.shadowBlur    = 50;
context.shadowOffsetX = 5;
context.shadowOffsetY = 10;

// context.stroke();
context.fill();