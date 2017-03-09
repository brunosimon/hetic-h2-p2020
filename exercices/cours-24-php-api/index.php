<?php

	// Function get forecast
	function get_forecast($city)
	{
		$url  = 'http://api.openweathermap.org/data/2.5/forecast?q='.$city.'&units=metric&APPID=9e8150c9d6fbf87d678d2cf7f7a2c00a';

		// Micro cache
		$path = './cache/'.md5($url);
		if(file_exists($path))
		{
			$content = file_get_contents($path);
			echo 'from cache';
		}
		else
		{
			$content = file_get_contents($url);
			file_put_contents($path, $content);
			echo 'from api';
		}

		return json_decode($content);
	}

	// Get forecast
	$city = !empty($_GET['city']) ? $_GET['city'] : 'Paris';
	$forecast = get_forecast($city)
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<!-- City input -->
	<form action="#">
		<input type="text" value="<?= $city ?>" name="city">
		<input type="submit">
	</form>
	
	<!-- Chosen city -->
	<h1><?= $city ?></h1>
	
	<!-- List every forecast -->
	<?php foreach($forecast->list as $_forecast): ?>
		<div>
			<br><strong>Date :</strong> <?= date('Y-m-d H:i:s', $_forecast->dt) ?>
			<br><strong>Description :</strong> <?= $_forecast->weather[0]->description ?>
			<br><strong>Wind speed :</strong> <?= $_forecast->wind->speed ?>
			<br><strong>Max temp. :</strong> <?= $_forecast->main->temp_max ?>
			<br><strong>Min temp. :</strong> <?= $_forecast->main->temp_min ?>
		</div>
	<?php endforeach; ?>

	<script>
	    // fetch( 'http://api.openweathermap.org/data/2.5/weather?q=Paris&APPID=9e8150c9d6fbf87d678d2cf7f7a2c00a' )
	    // .then( response => response.json() )
	    // .then( result => console.log( result ) )
	</script>
</body>
</html>