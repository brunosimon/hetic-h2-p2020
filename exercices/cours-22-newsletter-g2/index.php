<?php

	include 'config.php';

	// Delete subscription
	// DELETE FROM subscriptions WHERE id = :id
	if(!empty($_GET['delete_id']))
	{
		$prepare = $pdo->prepare('DELETE FROM subscriptions WHERE id = :id');
		$prepare->bindValue('id', $_GET['delete_id']);
		$prepare->execute();
	}

	// Add subscription
	if(!empty($_POST))
	{
		$prepare = $pdo->prepare('INSERT INTO subscriptions (email) VALUES (:email)');
		$prepare->bindValue('email', $_POST['email']);
		$prepare->execute();
	}

	// Retrieve subscriptions
	$query = $pdo->query('SELECT * FROM subscriptions');
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
		<input type="email" required name="email">
		<input type="submit">
	</form>

	<table>
		<?php foreach($subscriptions as $_subscription): ?>
			<tr>
				<td><?= $_subscription->email ?></td>
				<td><a href="?delete_id=<?= $_subscription->id ?>">Delete</a></td>
			</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>