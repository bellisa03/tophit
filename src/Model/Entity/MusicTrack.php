<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class MusicTrack extends Entity
{
	public $albumTitle;
	public $artistName;
	public $genreID;
	public $milliseconds;
	public $trackID;
	public $trackTitle;
	public $ranking;
}

