<?php

	include 'config.php';
	include 'articles.class.php';

	$articlesModel = new ArticlesModel($pdo);
	$articles = $articlesModel->getAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mon blog</title>
</head>
<body>
	<?php foreach($articles as $_article): ?>
		<article>
			<h2><?= $_article->title ?></h2>
			<div><?= $_article->author_name ?></div>
			<div><?= $articlesModel->reformatDate($_article->date) ?></div>
			<div><?= $_article->text ?></div>
		</article>
	<?php endforeach; ?>
</body>
</html>