<?php
namespace App\Model\BU;

use SoapClient;
use App\Model\Entity\MusicGenre;
use App\Model\Entity\MusicTrack;
use Cake\ORM\TableRegistry;


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
				$musicGenre = new MusicGenre($genreResult->GenreId, $genreResult->Name);
				return $musicGenre;
			}
		}
		
		return null;
	}
	
	public function getFullMusicTracksList($genreId){
		$resultsWebService = $this->soapClient->GetMusicGenreTracks(["genreID" => $genreId]);
		$trackResults = $resultsWebService->GetMusicGenreTracksResult->MusicTrack;
		
		$musicTracks = array();
		foreach ($trackResults as $trackResult) {
			$musicTrack = new MusicTrack();
			$musicTrack->albumTitle = $trackResult->AlbumTitle;
			$musicTrack->artistName = $trackResult->ArtistName;
			$musicTrack->genreID = $trackResult->GenreId;
			$musicTrack->milliseconds = $trackResult->Milliseconds;
			$musicTrack->trackID = $trackResult->TrackId;
			$musicTrack->trackTitle = $trackResult->TrackTitle;
			$musicTracks[] = $musicTrack;
		}
		return $musicTracks;
	}
	
	public function getMusicTracksList($genreId){
		$resultsWebService = $this->soapClient->GetMusicGenreTracks(["genreID" => $genreId]);
		$trackResults = $resultsWebService->GetMusicGenreTracksResult->MusicTrack;
	
		$musicTracks = array();
		foreach ($trackResults as $trackResult) {
			$musicTrack = new MusicTrack();
			$musicTrack->artistName = $trackResult->ArtistName;
			$musicTrack->trackID = $trackResult->TrackId;
			$musicTrack->trackTitle = $trackResult->TrackTitle;
			$musicTracks[] = $musicTrack;
		}
		return $musicTracks;
	}
	
	
}

