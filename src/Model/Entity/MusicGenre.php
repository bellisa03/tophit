<?php
namespace App\Model\Entity;

/**
 * MusicGenre Entity
 *
 * @property int $GenreId
 * @property string $Name
 */
class MusicGenre
{

	private $genreId;
	private $name;

	public function __construct($genreId, $name)
	{
		$this->genreId  = $genreId;
		$this->name   = $name;
	}

	public function setGenreId($genreId)
	{
		$this->genreId= $genreId;
	}

	public function getGenreId()
	{
		return $this->genreId;
	}


	public function setName($name)
	{
		$this->name= $name;
	}

	public function getName()
	{
		return $this->name;
	}


}
