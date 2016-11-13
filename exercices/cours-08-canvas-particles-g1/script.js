var canvas  = document.querySelector( 'canvas' ),
	context = canvas.getContext( '2d' );

/**
 * MOUSE
 */
var mouse = { x: 0, y: 0 };
document.addEventListener( 'mousemove', function( event )
{
	mouse.x = event.clientX;
	mouse.y = event.clientY;
} );

/**
 * RESIZE
 */
function resize()
{
	canvas.width  = window.innerWidth;
	canvas.height = window.innerHeight;
}
window.addEventListener( 'resize', resize );
resize();

/**
 * PARTICLES
 */
var particles = [];

function add_particle()
{
	var particle = {};
	particle.x          = mouse.x;
	particle.y          = mouse.y;
	particle.velocity   = {};
	particle.velocity.x = Math.random() * 6 - 3;
	particle.velocity.y = Math.random() * 6 - 3;

	var hue = Math.round( Math.random() * 360 );
	particle.color = 'hsl(' + hue + ', 100%, 50%)';
	
	particle.radius = Math.random() * 10;

	particles.push( particle );
}

function update_particles()
{
	for( var i = 0; i < particles.length; i++ )
	{
		var _particle = particles[ i ];
		_particle.x += _particle.velocity.x;
		_particle.y += _particle.velocity.y;

		if( _particle.x < 0 || _particle.x > canvas.width || _particle.y < 0 || _particle.y > canvas.height )
		{
			particles.splice( i, 1 );
			i--;
		}
	}
}

function draw_particles()
{
	context.clearRect( 0, 0, canvas.width, canvas.height );

	// context.globalCompositeOperation = 'lighten';

	for( var i = 0; i < particles.length; i++ )
	{
		var _particle = particles[ i ];

		context.beginPath();
		context.arc( _particle.x, _particle.y, _particle.radius, 0, Math.PI * 2 );
		context.fillStyle = _particle.color;
		context.fill();
	}
}

/**
 * LOOP
 */
function loop()
{
	window.requestAnimationFrame( loop );

	add_particle();
	update_particles();
	draw_particles();
}

loop();