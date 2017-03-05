<?php

	/**
	 * Avec CURL
	 */
	
	// Instantiate curl
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, 'http://api.openweathermap.org/data/2.5/weather?q=Paris&APPID=9e8150c9d6fbf87d678d2cf7f7a2c00a');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($curl);
	curl_close($curl);

	$result = json_decode($result); // Json decode

	/**
	 * Avec file_get_contents
	 * (Pas compatible avec tous les serveur)
	 */
	
	$result = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Paris&APPID=9e8150c9d6fbf87d678d2cf7f7a2c00a');
	$result = json_decode($result); // Json decode

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script>

		/**
		 * DU PHP AU JS
		 */
		
        var data = <?= json_encode($result) ?>;
        console.log(data);


		/**
		 * EN JS NATIF
         */

		// Instanciate request
		var xhr = new XMLHttpRequest();

		// Ready stage change callback
		xhr.onreadystatechange = function()
		{
		    // Is done
		    if( xhr.readyState === XMLHttpRequest.DONE )
		    {
		        // Success
		        if(xhr.status === 200)
		        {
		            var result = JSON.parse( xhr.responseText );
		            console.log( 'success' );
		            console.log( result );
		        }
		        else
		        {
		            console.log( 'error' );
		        }
		    }
		};

		// Open request
		xhr.open( 'GET', 'http://api.openweathermap.org/data/2.5/weather?q=Paris&APPID=9e8150c9d6fbf87d678d2cf7f7a2c00a', true );

		// Send request
		xhr.send();


		/**
		 * AVEC JQUERY
		 */
		
		$.getJSON(
		    'http://api.openweathermap.org/data/2.5/weather?q=Paris&APPID=9e8150c9d6fbf87d678d2cf7f7a2c00a',
		    function( data )
		    {
		        console.log(data);
		    }
		);
		                    
		                    
	</script>
</body>
</html>