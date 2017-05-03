<?php

	include 'config.php';

	session_destroy();
	// unset($_SESSION['user']);

	header('Location:login.php');
	exit;