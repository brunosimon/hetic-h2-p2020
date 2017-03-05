<?php

// Connexion variables
define('DB_HOST','localhost');
define('DB_NAME','hetic_p2020_g2_first');
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


// $query = $pdo->query('SELECT * FROM users');
// $users = $query->fetchAll();

// foreach($users as $_user)
// {
// 	echo '<pre>';
// 	print_r($_user);
// 	echo '</pre>';
// }

// $exec = $pdo->exec('UPDATE users SET first_name = "Tutu"');
// echo '<pre>';
// print_r($exec);
// echo '</pre>';
// exit;

$data = array(
	'first_name' => 'Burno',
	'age' => 27,
	'gender' => 'male',
);

$prepare = $pdo->prepare('INSERT INTO users (first_name, age, gender) VALUES (:first_name, :age, :gender)');

$prepare->bindValue('first_name', $data['first_name']);
$prepare->bindValue('age', $data['age']);
$prepare->bindValue('gender', $data['gender']);

$prepare->execute();
