<?php

class ArticlesModel
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function getAll()
	{
		$query = $this->pdo->query('
			SELECT
				articles.*,
				authors.name as author_name
			FROM
				articles
			LEFT JOIN
				authors
			ON
				articles.id_author = authors.id
			ORDER BY
				date DESC
		');
		$articles = $query->fetchAll();

		return $articles;
	}

	public function getById($id)
	{
		$prepare = $this->pdo->prepare('SELECT * FROM articles WHERE id = :id');
		$prepare->bindValue('id', $id);
		$prepare->execute();
		
		$article = $prepare->fetch();

		return $article;
	}

	public function getBySlug($slug)
	{
		$prepare = $this->pdo->prepare('SELECT * FROM articles WHERE slug = :slug');
		$prepare->bindValue('slug', $slug);
		$prepare->execute();
		
		$article = $prepare->fetch();

		return $article;
	}

	public function timeToDate($time)
	{
		return date('Y-m-d H:i:s', $time);
	}
}