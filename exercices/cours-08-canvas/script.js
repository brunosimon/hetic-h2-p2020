var canvas  = document.querySelector( 'canvas' ),
	context = canvas.getContext( '2d' );

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
 * MOUSE
 */
var mouse = { x: 0, y: 0 };

document.addEventListener( 'mousemove', function( event )
{
	mouse.x = event.clientX;
	mouse.y = event.clientY;
} );

/**
 * PARTICLES
 */
var particles = [];

function update_particles()
{
	for( var i = 0; i < particles.length; i++ )
	{
		var _particle = particles[ i ];
		
		_particle.x += _particle.velocity.x;
		_particle.y += _particle.velocity.y;

		if( _particle.x > canvas.width || _particle.x < 0 || _particle.y > canvas.height || _particle.y < 0 )
		{
			particles.splice( i, 1 );
			i--;
		}
	}
}

function add_particle()
{
	var particle = {};

	particle.x          = mouse.x;
	particle.y          = mouse.y;
	particle.velocity   = {};
	particle.velocity.x = Math.random() * 4 - 2;
	particle.velocity.y = Math.random() * 4 - 2;
	particle.style      = 'hsl(' + ( Math.random() * 360 ) + ',100%,50%)';
	particle.radius     = Math.random() * 10;

	particles.push( particle );
}

/**
 * DRAW
 */
function draw()
{
	context.clearRect( 0, 0, canvas.width, canvas.height );

	for( var i = 0; i < particles.length; i++ )
	{
		var _particle = particles[ i ];
		
		context.beginPath();
		context.arc( _particle.x, _particle.y, _particle.radius, 0, Math.PI * 2 );
		context.fillStyle = _particle.style;
		context.fill();
	}
}

/**
 * LOOP
 */
function loop()
{
	window.requestAnimationFrame( loop );

	update_particles();
	add_particle();
	draw();
}

loop();