<?php

$tweet = 'After a month at the @Space_Station, Dragon is scheduled to return tomorrow with over 5,400 pounds of cargo. http://nasa.gov/ntv #space';
echo $tweet;

$tweet = preg_replace('/(https?:\/\/)?(([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w\.-]*)*\/?)/', '<a href="$0" target="_blank">$2</a>', $tweet);
$tweet = preg_replace('/@(\w+)/', '<a target="_blank" href="https://twitter.com/$1">@$1</a>', $tweet);
$tweet = preg_replace('/#(\w+)/', '<a target="_blank" href="https://twitter.com/hashtag/$1">#$1</a>', $tweet);

echo '<br>'.$tweet;