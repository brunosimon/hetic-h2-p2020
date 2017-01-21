<?php
	
    $news = [
    	'article 1',
    	'article 2',
    	'article 3',
    	'article 4',
    	'article 5',
	];

	foreach($news as $_key => $_news)
	{
		echo '<br>'.$_key.' = '.$_news;
	}