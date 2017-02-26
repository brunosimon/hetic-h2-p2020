<?php 

	// Messages
	$error_messages = array();
	$success_messages = array();

	// Form sent
	if(!empty($_POST))
	{
		// Default value for gender
		if(!isset($_POST['gender']))
			$_POST['gender'] = '';

		// Retrieve data
		$first_name = trim($_POST['first-name']);
		$age        = (int)$_POST['age'];
		$gender     = $_POST['gender'];

		// First name errors
		if(empty($first_name))
			$error_messages['first-name'] = 'should not be empty';

		// Age errors
		if(empty($age))
			$error_messages['age'] = 'should not be empty';
		else if($age < 0 || $age > 150)
			$error_messages['age'] = 'wrong value';

		// Gender errors
		if(empty($gender))
			$error_messages['gender'] = 'should not be empty';
		else if(!in_array($gender, array('male', 'female')))
			$error_messages['gender'] = 'wrong value';

		// No errors
		if(empty($error_messages))
		{
			// Add success message
			$success_messages[] = 'User registered';

			// Reset values
			$_POST['first-name'] = '';
			$_POST['age']        = '';
			$_POST['gender']     = '';
		}
	}

	// No data sent
	else
	{
		// Default values
		$_POST['first-name'] = '';
		$_POST['age']        = '';
		$_POST['gender']     = '';
	}

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
</body>
</html>
