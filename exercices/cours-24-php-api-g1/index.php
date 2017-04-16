<?php

	// Set up
	$city = !empty($_GET['city']) ? $_GET['city'] : 'Paris';
	$url = 'http://api.openweathermap.org/data/2.5/forecast?q='.$city.'&units=metric&APPID=9e8150c9d6fbf87d678d2cf7f7a2c00a';
	$path = './cache/'.md5($url.date('Y-m-d H').'a');

	// From cache
	if(file_exists($path))
	{
		$forecast = file_get_contents($path);
	}

	// From API
	else
	{
		$forecast = file_get_contents($url);

		// Save in cache
		file_put_contents($path, $forecast);
	}

	// Json decode
	$forecast = json_decode($forecast);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>API G1</title>
</head>
<body>

	<!-- Form -->
	<form action="#" method="get">
		<input type="text" name="city" value="<?= $city ?>" required>
		<input type="submit">
	</form>

	<!-- Forecast -->
	<h1><?= $city ?></h1>

	<?php foreach($forecast->list as $_forecast): ?>
		<div>
			<br><strong>Date:</strong> <?= date('Y-m-d H:i:s', $_forecast->dt) ?>
			<br><strong>Description:</strong> <?= $_forecast->weather[0]->description ?>
			<br><strong>Temperature:</strong> <?= $_forecast->main->temp ?>
		</div>
	<?php endforeach ?>

</body>
</html>