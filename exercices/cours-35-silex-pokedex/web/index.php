<?php 

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\Length;

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
        'dbname'    => 'hetic_p2020_pokedex',
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
$app->register(new Silex\Provider\SwiftmailerServiceProvider(), array(
    'swiftmailer.options' => array(
        'host'       => 'smtp.gmail.com',
        'port'       => 465,
        'username'   => 'smtp.hetic.p2020@gmail.com',
        'password'   => 'heticp2020smtp',
        'encryption' => 'ssl',
        'auth_mode'  => 'login'
    )
));

// Create routes
$app->get('/', function() use ($app)
{
	$data = array();
    return $app['twig']->render('pages/home.twig', $data);
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

$app->get('/pokemon/{slug}', function($slug) use ($app)
{
	$data = array();

    $pokemonsModel = new Site\Models\Pokemons($app['db']);
    $data['pokemon'] = $pokemonsModel->getBySlug($slug);

    return $app['twig']->render('pages/pokemon.twig', $data);
})
->assert('slug', '[a-zA-Z0-9_-]+')
->bind('pokemon');

$app->match('/contact', function(Request $request) use ($app)
{
    $data = array();

    // Create builder
    $form_builder = $app['form.factory']->createBuilder();

    // Set method and action
    $form_builder->setMethod('post');
    $form_builder->setAction($app['url_generator']->generate('contact'));

    // Add input
    $form_builder->add(
        'name',
        TextType::class,
        array(
            'label' => 'Your name',
            'trim' => true,
            'required' => true,
            'constraints' => array(
                new Length(
                    array(
                        'max' => 20,
                        'min' => 3,
                        'minMessage' => 'Too short',
                        'maxMessage' => 'Too long',
                    )
                )
            ),
        )
    );

    $form_builder->add(
        'email',
        EmailType::class,
        array(
            'label' => 'Your email',
            'trim' => true,
            'required' => true,
        )
    );

    $form_builder->add(
        'subject',
        ChoiceType::class,
        array(
            'label'       => 'Subject',
            'required'    => true,
            // 'multiple' => true,
            // 'expanded' => true,
            'choices'     => array(
                'Informations' => 'Informations',
                'Proposition'  => 'Proposition',
                'Other'        => 'Other',
            )
        )
    );

    $form_builder->add(
        'message',
        TextareaType::class,
        array(
            'label'      => 'Message',
            'trim'       => true,
            'required'   => true,
        )
    );

    $form_builder->add('submit', SubmitType::class);

    // Create form
    $form = $form_builder->getForm();

    // Handle request
    $form->handleRequest($request);

    // Is submited and is valid
    if($form->isSubmitted() && $form->isValid())
    {
        // Get form data
        $form_data = $form->getData();

        // $message = \Swift_Message::newInstance();
        // $message->setSubject($form_data['subject'].' ('.$form_data['email'].')');
        // $message->setFrom(array($form_data['email']));
        // $message->setTo(array('bruno.simon@hetic.net'));
        // $message->setBody($form_data['message']);

        // $app['mailer']->send($message);

        return $app->redirect($app['url_generator']->generate('contact'));
    }

    // Send the form to the view
    $data['contact_form'] = $form->createView();

    return $app['twig']->render('pages/contact.twig', $data);
})
->bind('contact');

$app->match('/add', function() use ($app)
{
	$data = array();

    // Create builder
    $form_builder = $app['form.factory']->createBuilder();

    // Set method and action
    $form_builder->setMethod('post');
    $form_builder->setAction($app['url_generator']->generate('add'));

    // Add input
    $form_builder->add(
        'name',
        TextType::class,
        array(
            'constraints' => array(
                new Constraints\NotEqualTo(
                    array(
                        'value'   => 'Fuck',
                        'message' => 'Be polite'
                    )
                )
            )
        )
    );

    $form_builder->add(
        'slug',
        TextType::class
    );

    $form_builder->add(
        'height',
        IntegerType::class
    );

    $form_builder->add(
        'weight',
        IntegerType::class
    );

    $form_builder->add(
        'picture',
        FileType::class
    );

    $form_builder->add(
        'type',
        ChoiceType::class,
        array(
            'multiple' => true,
            'expanded' => true,
            'choices' => array(
                'Normal' => '1',
                'Fighting' => '2',
                'Flying' => '3',
            )
        )
    );

    $form_builder->add(
        'submit',
        SubmitType::class
    );

    // Create form
    $add_form = $form_builder->getForm();

    // Handle request
    $add_form->handleRequest($request);

        // Is submited
    if($add_form->isSubmitted())
    {
        // Get form data
        $form_data = $add_form->getData();

        // Is valid
        if($add_form->isValid())
        {
            echo '<pre>';
            print_r($form_data);
            echo '</pre>';
            exit;
        }
    }

    // Send the form to the view
    $data['add_form'] = $add_form->createView();

    return $app['twig']->render('pages/add.twig', $data);
})
->bind('add');

// Run Silex
$app->run();