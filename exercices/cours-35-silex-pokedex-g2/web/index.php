<?php 

// Require dependendies
require_once __DIR__.'/../vendor/autoload.php';

// Init Silex
$app = new Silex\Application();
$app['debug'] = true;

// Services
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

// Create routes
$app
	->get('/', function() use ($app)
	{
	    return $app['twig']->render('pages/home.twig');
	})
	->bind('home');

$app
	->get('/pokemons', function() use ($app)
	{
	    return $app['twig']->render('pages/pokemons.twig');
	})
	->bind('pokemons');

$app
	->get('/pokemon/{id}', function($id) use ($app)
	{
	    return $app['twig']->render('pages/pokemon.twig');
	})
	->assert('id', '\d+')
	->bind('pokemon');

$app
	->get('/add', function() use ($app)
	{
	    return $app['twig']->render('pages/add.twig');
	})
	->bind('add');

// Run Silex
$app->run();