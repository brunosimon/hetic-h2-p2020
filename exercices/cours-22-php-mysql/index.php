<?php

define('DB_HOST','localhost');
define('DB_NAME','hetic_p2020_first');
define('DB_USER','root');
define('DB_PASS','root'); // '' par défaut sur windows

try
{
    // Try to connect to database
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);

    // Set fetch mode to object
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}
catch (Exception $e)
{
    // Failed to connect
    die('Could not connect');
}

$exec = $pdo->exec('INSERT INTO users (first_name,age,gender) VALUES (\'bruno\',26,\'male\')');

echo '<pre>';
var_dump($exec);
echo '</pre>';