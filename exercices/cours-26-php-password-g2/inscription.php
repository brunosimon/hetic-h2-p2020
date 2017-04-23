<?php

	include 'config.php';

	$message = '';

	if(!empty($_POST))
	{
		$email    = $_POST['email'];
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT, array('cost' => 9));

		$prepare = $pdo->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
		$prepare->bindValue(':email', $email);
		$prepare->bindValue(':password', $password);
		$execute = $prepare->execute();

		$message = $execute ? 'User registered' : 'Error: User not registered';
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

	<a href="login.php">Login</a>

	<div class="message"><?= $message ?></div>

	<form action="#" method="post">
		<div>
			<input type="email" name="email" id="email" required>
			<label for="email">Email</label>
		</div>
		<div>
			<input type="password" name="password" id="password" required>
			<label for="password">Password</label>
		</div>
		<div>
			<input type="submit">
		</div>
	</form>

</body>
</html>