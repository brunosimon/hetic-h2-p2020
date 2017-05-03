<?php

include 'config.php';

// setcookie('is_admin', '', time() - 3600, '/');

// echo '<pre>';
// print_r($_COOKIE);
// echo '</pre>';
// exit;

// $_SESSION['login'] = 'brunosimon';
// $_SESSION['is_admin'] = true;
// $_SESSION['toto'] = array('tutu', 'titi');

unset($_SESSION['login']);

echo '<pre>';
print_r($_SESSION);
echo '</pre>';