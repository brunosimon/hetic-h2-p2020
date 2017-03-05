<?php 
	
	define('DB_HOST','localhost');
	define('DB_NAME','hetic_p2020_newsletters');
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

	// Add
	if(!empty($_POST))
	{
		$prepare = $pdo->prepare('INSERT INTO subscriptions (email) VALUES (:email)');
		$prepare->bindValue('email', $_POST['email']);
		$prepare->execute();
	}

	// Delete
	if(!empty($_GET['delete']))
	{
		$prepare = $pdo->prepare('DELETE FROM subscriptions WHERE id = :id');
		$prepare->bindValue('id', $_GET['delete']);
		$prepare->execute();
	}

	$query        = $pdo->query('SELECT * FROM subscriptions');
	$subscriptions = $query->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Newsletter</title>
</head>
<body>
	<form action="#" method="post">
		<input type="email" name="email" placeholder="toto@tata.com" required>
		<input type="submit">
	</form>

	<?php foreach($subscriptions as $_subscription): ?>
	<?php 
		$date = date('Y-m-d', strtotime($_subscription->date));
	?>
		<table>
			<tr>
				<td><?= $_subscription->email ?></td>
				<td><?= $date ?></td>
				<td><a href="?delete=<?= $_subscription->id ?>">Delete</a></td>
			</tr>
		</table>
	<?php endforeach; ?>
</body>
</html>