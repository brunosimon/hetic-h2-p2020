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

    public function getBySlug($slug)
    {
    	$prepare = $this->db->prepare('SELECT * FROM pokemons WHERE slug = :slug');
    	$prepare->bindValue('slug', $slug);
    	$prepare->execute();
    	$pokemon = $prepare->fetch();

    	if($pokemon)
    	{
    		$pokemon->types = $this->_getTypesById($pokemon->id);
    	}

    	return $pokemon;
    }

    private function _getTypesById($id)
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
    	$pokemonTypes = $prepare->fetchAll();

    	$pokemonTypes = array_map(function($type){
    		return $type->name;
    	}, $pokemonTypes);

    	return $pokemonTypes;
    }
}