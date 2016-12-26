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

	public function getMusicGenresList() {
	
		$resultsWebService = $this->soapClient->GetMusicGenres();
		$genreResults = $resultsWebService->GetMusicGenresResult->MusicGenre;
	
		$musicGenres = array();
		foreach ($genreResults as $genreResult) {
			$musicGenres[$genreResult->GenreId] = $genreResult->Name;
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

