<?php 

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app->get('/hello', function() use ($app)
{
	$data = array(
	    'values' => array(
	        'key1' => 'a',
	        'key2' => 'b',
	        'key3' => 'c',
	        'key4' => 'd',
	        'key5' => 'e',
	    )
	);

    return $app['twig']->render('example.twig', $data);
})
->bind('hello');

$app->get('/page/{number}', function($number)
{
    return 'Page: '.$number;
})
->assert('number', '\d+')
->bind('page');

$app->run();