<?php
    $error_messages = array();
    $success_messages = array();

    // Form sent
    if(!empty($_POST))
    {
    	// Default gender if doesn't exist
    	if(!isset($_POST['gender']))
    		$_POST['gender'] = '';

    	// Retrieve data
    	$first_name = $_POST['first-name'];
    	$age        = $_POST['age'];
    	$gender     = $_POST['gender'];

    	// Name error
    	if(empty($first_name))
    		$error_messages['first-name'] = 'Missing value';

    	// Age error
    	if(empty($age))
    		$error_messages['age'] = 'Missing value';
    	else if($age < 0 || $age > 120)
    		$error_messages['age'] = 'Wrong value';

    	// Gender
    	if(empty($gender))
    		$error_messages['gender'] = 'Missing value';
    	else if($gender != 'male' && $gender != 'female')
    		$error_messages['gender'] = 'Wrong value';

    	// Success
    	if(empty($error_messages))
    	{
			$_POST['first-name'] = '';
			$_POST['age']        = '';
			$_POST['gender']     = '';
    		$success_messages[] = 'User registered';
    	}
    }
    else
    {
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

	<!-- Error messages -->
	<?php if(!empty($error_messages)): ?>
		<div class="messages errors">
			<?php
				foreach($error_messages as $_key => $_message)
				{
					echo '<p>' . ucfirst($_key) . ' : ' . $_message . '</p>';
				}
			?>
		</div>
	<?php endif; ?>

	<!-- Success messages -->
	<?php if(!empty($success_messages)): ?>
		<div class="messages success">
			<?php
				foreach($success_messages as $_message)
				{
					echo '<p>' . $_message . '</p>';
				}
			?>
		</div>
	<?php endif; ?>

	<!-- Form -->
	<form action="#" method="post">

		<!-- First name -->
		<div class="input <?php echo array_key_exists('first-name', $error_messages) ? 'error' : ''; ?>">
		    <input type="text" name="first-name" placeholder="Toto" id="first-name" value="<?php echo $_POST['first-name'] ?>">
		    <label for="first-name">First name</label>
	    </div>

	    <!-- Age -->
		<div class="input <?php echo array_key_exists('age', $error_messages) ? 'error' : ''; ?>">
		    <input type="number" name="age" placeholder="21" id="age" value="<?php echo $_POST['age'] ?>">
		    <label for="age">Age</label>
	    </div>

	    <!-- Gender -->
	    <div class="input <?php echo array_key_exists('gender', $error_messages) ? 'error' : ''; ?>">
	    	<label>
	    		<input type="radio" name="gender" value="female" <?php echo $_POST['gender'] == 'female' ? 'checked' : '' ?>> Female
	    	</label>
	    	<label>
	    		<input type="radio" name="gender" value="male" <?php echo $_POST['gender'] == 'male' ? 'checked' : '' ?>> Male
	    	</label>
	    </div>

	    <!-- Submit -->
	    <div class="input">
	    	<input type="submit">
	    </div>
	</form>
</body>
</html>