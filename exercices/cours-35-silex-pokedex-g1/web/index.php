<?php 

// Require dependendies
$loader = require_once __DIR__.'/../vendor/autoload.php';
$loader->addPsr4('Site\\', __DIR__.'/../src/');

// Init Silex
$app = new Silex\Application();
$app['debug'] = true;

// Services
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array (
        'driver'    => 'pdo_mysql',
        'host'      => 'localhost',
        'dbname'    => 'hetic_p2020_g1_pokedex',
        'user'      => 'root',
        'password'  => 'root',
        'charset'   => 'utf8'
    ),
));
$app['db']->setFetchMode(PDO::FETCH_OBJ);
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\LocaleServiceProvider());


// Create routes
$app->get('/', function() use ($app)
{
    return $app['twig']->render('pages/home.twig');
})
->bind('home');

$app->get('/pokemons', function() use ($app)
{
	$data = array();

	$pokemonsModel = new Site\Models\Pokemons($app['db']);
	$data['pokemons'] = $pokemonsModel->getAll();

    return $app['twig']->render('pages/pokemons.twig', $data);
})
->bind('pokemons');

$app->get('/pokemon/{id}', function($id) use ($app)
{
	$data = array();

	$pokemonsModel = new Site\Models\Pokemons($app['db']);
	$data['pokemon'] = $pokemonsModel->getById($id);

    return $app['twig']->render('pages/pokemon.twig', $data);
})
->assert('id', '\d+')
->bind('pokemon');

$app->get('/contact', function() use ($app)
{
	$data = array();

	$form_builder = $app['form.factory']->createBuilder();

	$form_builder->setMethod('post');
	$form_builder->setAction($app['url_generator']->generate('contact'));

	$form_builder->add('name', Symfony\Component\Form\Extension\Core\Type\TextType::class);
	$form_builder->add('submit', Symfony\Component\Form\Extension\Core\Type\SubmitType::class);

	$form = $form_builder->getForm();

	$data['contact_form'] = $form->createView();

    return $app['twig']->render('pages/contact.twig', $data);
})
->bind('contact');

// Run Silex
$app->run();