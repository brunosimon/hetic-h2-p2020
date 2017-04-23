<?php 

include 'config.php';

// setcookie('name', 'value', time() - 3600, '/');

// echo '<pre>';
// print_r($_COOKIE);
// echo '</pre>';
// exit;

session_start();

$_SESSION['login']    = 'login_visiteur';
$_SESSION['is_admin'] = true;
$_SESSION['toto']     = array('tata', 'tutu');

echo '<pre>';
print_r($_SESSION);
echo '</pre>';
exit;