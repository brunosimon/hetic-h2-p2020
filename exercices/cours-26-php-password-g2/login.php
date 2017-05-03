<?php

	include 'config.php';

	$message = '';

	if(!empty($_POST))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		$prepare = $pdo->prepare('SELECT * FROM users WHERE email = :email');
		$prepare->bindValue('email', $email);
		$prepare->execute();
		$user = $prepare->fetch();

		if(!$user)
		{
			$message = 'User not found';
		}
		else
		{
			if(password_verify($password, $user->password))
			{
				$_SESSION['user'] = $user;

				header('Location:index.php');
				exit;
			}
			else
			{
				$message = 'Wrong password';
			}
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>

	<h1>Login</h1>

	<a href="inscription.php">Inscription</a>

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