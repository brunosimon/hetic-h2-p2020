<?php

class ArticlesModel
{
	private $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function getAll()
	{
		$query = $this->db->query('
			SELECT
			    ar.*,
			    au.name AS author_name
			FROM
			    articles AS ar
			LEFT JOIN
			    authors AS au
			ON
			    ar.id_author = au.id
		');
		$articles = $query->fetchAll();

		return $articles;
	}

	public function reformatDate($time)
	{
		return date('Y-m-d H:i:s', $time);
	}
}