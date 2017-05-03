<?php 

	include 'config.php';

	if(empty($_SESSION['user']))
	{
		header('Location:login.php');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Private</title>
</head>
<body>

	<h1>Private</h1>

	<a href="logout.php">Logout</a>

	<p>email: <?= $_SESSION['user']->email ?></p>

</body>
</html>