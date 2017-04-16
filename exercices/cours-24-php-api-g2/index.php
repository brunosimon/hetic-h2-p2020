<?php

	// $path = './cache/toto.txt';
	// $content = 'Hello';
	// file_put_contents($path, $content);

	$city = !empty($_GET['city']) ? $_GET['city'] : 'Paris';
	$url  = 'http://api.openweathermap.org/data/2.5/forecast?q='.$city.'&units=metric&APPID=9e8150c9d6fbf87d678d2cf7f7a2c00a';
	$path = './cache/'.md5($city.date('Y-m-d-H'));

	// From cache
	if(file_exists($path))
	{
		echo 'from cache';
		$forecast = file_get_contents($path);
	}

	// From API
	else
	{
		echo 'from API';
		$forecast = file_get_contents($url);
		file_put_contents($path, $forecast);
	}

	// Convert to object
	$forecast = json_decode($forecast);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>API</title>
</head>
<body>

	<form action="#" method="get">
		<input type="text" value="<?= $city ?>" required name="city">
		<input type="submit">
	</form>

	<h1><?= $city ?></h1>

	<?php foreach($forecast->list as $_forecast): ?>
		<div>
			<br><strong>Date: </strong><?= date('Y-m-d H:i:s', $_forecast->dt) ?>
			<br><strong>Description: </strong><?= $_forecast->weather[0]->description ?>
			<br><strong>Temperature: </strong><?= $_forecast->main->temp ?>°
			<br><strong>Wind: </strong><?= $_forecast->wind->speed ?> km/h
		</div>
	<?php endforeach; ?>

</body>
</html>
