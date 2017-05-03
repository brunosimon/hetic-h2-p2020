<?php

// if(preg_match('/[a-z]/', 'mon-actu-trop-bien'))
// {
// 	die('Vrai');
// }
// else
// {
// 	die('Faux');
// }

// $matches = array();

// preg_match_all(
// 	'/(bo+njour)/',
// 	'bonjour booonjour boonjour bonjour tout le monde',
// 	$matches
// );

// echo '<pre>';
// print_r($matches);
// echo '</pre>';
// exit;

// $text = 'Bonjour la P2013';
// $text = preg_replace('/(p20[0-9]{2})/i', '<strong>$1</strong>', $text);

// echo $text;


$tweet = 'After a month at the @Space_Station, Dragon is scheduled to return tomorrow with over 5,400 pounds of cargo. http://nasa.gov/ntv #space';
echo $tweet;

$tweet = preg_replace(
	'/(https?:\/\/)?(([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w\.-]*)*\/?)/',
	'<a href="$0">$2</a>',
	$tweet
);

$tweet = preg_replace(
	'/(@(\w+))/',
	'<a href="https://twitter.com/$2">$1</a>',
	$tweet
);

$tweet = preg_replace(
	'/(#(\w+))/',
	'<a href="https://twitter.com/hashtag/$2">$1</a>',
	$tweet
);

echo '<br>'.$tweet;