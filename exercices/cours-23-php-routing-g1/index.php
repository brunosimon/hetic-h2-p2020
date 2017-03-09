<?php

include 'config.php';

$q = isset($_GET['q']) ? $_GET['q'] : '';

if($q === '')
{
	$page = 'home';
}
else if($q === 'contact')
{
	$page = 'contact';
}
else if(preg_match('/^article\/[-_a-z0-9]+$/', $q))
{
	$page = 'article';
}
else
{
	$page = '404';
}

ob_start();
include 'views/pages/'.$page.'.php';
$content = ob_get_clean();

include 'views/partials/header.php';
echo $content;
include 'views/partials/footer.php';