var canvas  = document.querySelector( 'canvas' ),
	context = canvas.getContext( '2d' );

context.beginPath();

context.moveTo( 50, 50 );
context.lineTo( 200, 200 );
context.lineTo( 50, 200 );
// context.closePath();

context.lineWidth   = 20;
context.lineCap     = 'round';
context.lineJoin    = 'round';
context.strokeStyle = '#000';

context.fillStyle = 'orange';

context.shadowColor   = 'rgba(0,0,0,0.5)';   // Couleur de l'ombre
context.shadowBlur    = 50;       // Largeur du flou
context.shadowOffsetX = 40;        // Décalage en X
context.shadowOffsetY = 10;       // Décalage en Y

context.fill();
// context.stroke();