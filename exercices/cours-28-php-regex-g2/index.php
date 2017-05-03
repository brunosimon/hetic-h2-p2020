<?php

// if(preg_match('/\w+\s+\w+$/', 'foo        bar'))
// {
// 	die('Vrai');
// }
// else
// {
// 	die('Faux');
// }

// $text = 'Bonjour la P2020, voici la P2021 avec votre prof de la p2013';

// $matches = array();
// preg_match_all('/p20\d{2}/i', $text, $matches);

// echo '<pre>';
// print_r($matches);
// echo '</pre>';
// exit;


// $text = 'Fuuuuuuuck la police';
// echo $text;

// $text = preg_replace('/fu+ck/i', 'duck', $text);
// echo '<br>'.$text;


$tweet = 'After a month at the @Space_Station, Dragon is scheduled to return tomorrow with over 5,400 pounds of cargo. http://nasa.gov/ntv #space';
echo $tweet;

$tweet = preg_replace(
	'/(https?:\/\/)?(([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w\.-]*)*\/?)/',
	'<a href="$0">$2</a>',
	$tweet
);

$tweet = preg_replace(
	'/@([a-z_0-9]+)/i',
	'<a href="https://twitter.com/$1">$0</a>',
	$tweet
);

$tweet = preg_replace(
	'/#([a-z_0-9]+)/i',
	'<a href="https://twitter.com/hashtag/$1">$0</a>',
	$tweet
);

echo '<br>'.$tweet;