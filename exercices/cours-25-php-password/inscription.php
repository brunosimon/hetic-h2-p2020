<?php
	
	// $time = microtime(true);
	// echo password_hash('azerty', PASSWORD_BCRYPT, array('cost' => 9));
	// $elpased_time = microtime(true) - $time;

	// echo '<pre>';
	// print_r($elpased_time);
	// echo '</pre>';
	// exit;

	include 'config.php';

	$message = '';

	if(!empty($_POST))
	{
		// Retrieve inputs
		$email    = $_POST['email'];
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT, array('cost' => 9));

		// Query
		$prepare = $pdo->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
		$prepare->bindValue(':email',$email);
		$prepare->bindValue(':password',$password);
		$exec = $prepare->execute();

		if($exec)
		{
			$message = 'Utilisateur enregistré';
		}
		else
		{
			$message = 'Une erreur s\'est produite';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
</head>
<body>

	<h1>Inscription</h1>

	<?php if(!empty($message)): ?>
		<div><?= $message ?></div>
	<?php endif ?>

	<a href="login.php">login</a>

	<form action="#" method="post">
		<div>
			<input type="email" name="email" id="email">
			<label for="email">Email</label>
		</div>
		<div>
			<input type="password" name="password" id="password">
			<label for="password">Password</label>
		</div>
		<div>
			<input type="submit">
		</div>
	</form>

</body>
</html>