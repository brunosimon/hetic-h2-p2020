<?php

	include 'config.php';
	include 'articles.class.php';

	$articlesModel = new ArticlesModel($pdo);

	$articles = $articlesModel->getAll();
	$article = $articlesModel->getById(3);
	$article = $articlesModel->getBySlug('article-2');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My blog</title>
</head>
<body>
	<?php foreach($articles as $_article): ?>
		<article>
			<h1><?= $_article->title ?></h1>
			<p><?= $_article->author_name ?></p>
			<p><?= $articlesModel->timeToDate($_article->date) ?></p>
			<p><?= $_article->text ?></p>
		</article>
	<?php endforeach; ?>
</body>
</html>