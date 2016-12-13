<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class MusicGenre extends Entity
{
	private $genreID;
	private $name;
	
	function getGenreID(){
		return $this->genreID;
	}
	
	function setGenreID($genreID){
		$this->genreID = $genreID;
	}
	
	function getName(){
		return $this->name;
	}
	
	function setName($name){
		$this->name = $name;
	}
	
}