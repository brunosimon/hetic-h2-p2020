<?php

namespace Site\Models;

class Pokemons
{
	public $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function getAll()
	{
		$query = $this->db->query('SELECT * FROM pokemons');
		$pokemons = $query->fetchAll();

		return $pokemons;
	}

	public function getById($id)
	{
		$prepare = $this->db->prepare('
			SELECT * FROM pokemons WHERE id = :id LIMIT 1
		');
		$prepare->bindValue('id', $id);
		$prepare->execute();
		$pokemon = $prepare->fetch();

		if($pokemon)
		{
			$pokemon->types = $this->_getTypesByPokemonId($pokemon->id);
		}

		return $pokemon;
	}

	private function _getTypesByPokemonId($id)
	{
		$prepare = $this->db->prepare('
			SELECT
				t.*
			FROM
				pokemons_types AS pt
			LEFT JOIN
				types AS t
			ON
				pt.id_type = t.id
			WHERE
				pt.id_pokemon = :id_pokemon
		');
		$prepare->bindValue('id_pokemon', $id);
		$prepare->execute();
		$types = $prepare->fetchAll();

		$typeNames = array();
		foreach($types as $_type)
		{
			$typeNames[] = $_type->name;
		}

		return $typeNames;
	}
}