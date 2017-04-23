<?php
	include 'config.php';

	$message = '';

	if(!empty($_POST))
	{
		// Retrieve inputs
		$email    = $_POST['email'];
		$password = $_POST['password'];

		// Query
		$prepare = $pdo->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
		$prepare->bindValue(':email', $email);
		$query = $prepare->execute();
		$user = $prepare->fetch();

		// User not found
		if(!$user)
		{
			$message = 'Email doesn\'t exist';
		}

		// User found
		else
		{
			// Password match
			if(password_verify($password, $user->password))
			{
				$_SESSION['user'] = $user;
				header('Location:index.php');
				exit;
			}
			// Password doesn't match
			else
			{
				$message = 'Mauvais mot de passe';
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

	<?php if(!empty($message)): ?>
		<div><?= $message ?></div>
	<?php endif ?>

	<a href="inscription.php">inscription</a>

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