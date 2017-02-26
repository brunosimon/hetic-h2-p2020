<?php

    // Messages
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
            $prepare = $pdo->prepare('INSERT INTO users (first_name, age, gender) VALUES (:first_name, :age, :gender)');

            $prepare->bindValue('first_name', $_POST['first-name']);
            $prepare->bindValue('age', $_POST['age']);
            $prepare->bindValue('gender', $_POST['gender']);

            $prepare->execute();

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
    
    // Fetch all users
    $query = $pdo->query('SELECT * FROM users');
    $users = $query->fetchAll();
