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
		// Prepare the INSERT
		$prepare = $pdo->prepare('INSERT INTO users (first_name, age, gender) VALUES (:first_name, :age, :gender)');

		// Set values
		$prepare->bindValue('first_name', $first_name);
		$prepare->bindValue('age', $age);
		$prepare->bindValue('gender', $gender);

		// Execute INSERT
		$prepare->execute();

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