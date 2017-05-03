<?php

include 'config.php';

// setcookie('toto', 'tata', time() - 3600, '/');

// echo '<pre>';
// print_r($_COOKIE);
// echo '</pre>';
// exit;

session_start();

// $_SESSION['login'] = 'brunosimon';
// $_SESSION['is_admin'] = true;
// $_SESSION['toto'] = array('tata', 'tutu');

// unset($_SESSION['login']);

echo '<pre>';
print_r($_SESSION);
echo '</pre>';
exit;