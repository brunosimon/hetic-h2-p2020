<?php 

	include 'includes/config.php';
	include 'includes/handle_form.php';

	$query = $pdo->query('SELECT * FROM users');
	$users = $query->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Php - Formulaire</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class="messages success">
		<?php foreach($success_messages as $_message): ?>
			<p><?= $_message ?></p>
		<?php endforeach ?>
	</div>

	<div class="messages errors">
		<?php foreach($error_messages as $_key => $_message): ?>
			<p><?= "$_key : $_message" ?></p>
		<?php endforeach ?>
	</div>

	<form action="#" method="post">
		<div class="<?= array_key_exists('first-name', $error_messages) ? 'error' : '' ?>">
			<input type="text" name="first-name" value="<?= $_POST['first-name'] ?>" placeholder="Toto" id="first-name">
			<label for="first-name">First name</label>
		</div>
		<div class="<?= array_key_exists('age', $error_messages) ? 'error' : '' ?>">
			<input type="number" name="age" value="<?= $_POST['age'] ?>" placeholder="21" id="age">
			<label for="age">Age</label>
		</div>
		<div class="<?= array_key_exists('gender', $error_messages) ? 'error' : '' ?>">
			<label>
				<input type="radio" name="gender" value="male" <?= $_POST['gender'] == 'male' ? 'checked' : '' ?>>
				Male
			</label>
			<label>
				<input type="radio" name="gender" value="female" <?= $_POST['gender'] == 'female' ? 'checked' : '' ?>>
				Female
			</label>
		</div>
		<div>
			<input type="submit">
		</div>
	</form>

	<?php foreach($users as $_user): ?>
		<div>
			<?= $_user->first_name ?>
			<?= $_user->age ?>
			<?= $_user->gender ?>
		</div>
	<?php endforeach; ?>
</body>
</html>
