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
$app->get('/', function(Silex\Application $app)
{
    global $app;

    $data = array(
        'value' => 'Toto'
    );

    return $app['twig']->render('example.twig', $data);
});

$app->get('/hello', function()
{
    return 'Hello!';
})
->bind('hello');

$app->get('/page/{number}', function($number)
{
    return 'Page number: '.$number;
})
->assert('number', '\d+')
->value('number', '1')
->bind('page');

$app->get('/hello/{first_name}-{last_name}', function($first_name, $last_name)
{
    return 'Hello '.$first_name.' '.$last_name;
});

// Run Silex
$app->run();