<?php
namespace App\Model\BU;

use SoapClient;
use App\Model\Entity\MusicGenre;


class MusicServiceAgent
{	
	private $address = 'http://www.it4today.com/chinook/ChinookService.svc?wsdl';
	//adresse peut-être dans une constante
	private $soapClient;
	
	public function __construct(){
		$this->soapClient = new \SoapClient($this->address); 
	}	

	public function getMusicGenreList(){
		$resultsWebService = $this->soapClient->GetMusicGenres();
		$genreResults = $resultsWebService->GetMusicGenresResult->MusicGenre;
	
		$musicGenres = [];
		foreach ($genreResults as $genreResult){
				$musicGenre = new MusicGenre($genreResult->GenreID, $genreResult->Name);
				$musicGenres[] = $musicGenre;
		}
	
		return $musicGenres;
	}
	
	public function getMusicGenreName($id){
		$resultsWebService = $this->soapClient->GetMusicGenres();
		$genreResults = $resultsWebService->GetMusicGenresResult->MusicGenre;
		
		foreach ($genreResults as $genreResult){
			if($genreResult->GenreID == $id){
				return $genreResult->Name;
			}
		}
		
		return null;
	}
	
	public function getMusicGenre($id){
		$resultsWebService = $this->soapClient->GetMusicGenres();
		$genreResults = $resultsWebService->GetMusicGenresResult->MusicGenre;
		
		foreach ($genreResults as $genreResult){
			if($genreResult->GenreId == $id){
				$musicGenre = new MusicGenre();
				$musicGenre->setGenreID($genreResult->GenreId);
				$musicGenre->setName($genreResult->Name);
				return $musicGenre;
			}
		}
		
		return null;
	}
}

