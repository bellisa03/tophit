<?php
namespace App\Model\BU;

use SoapClient;
use App\Model\Entity\MusicGenre;
use App\Model\Entity\MusicTrack;

class MusicServiceAgent
{	
	private $address = WEBSERVICE;
	private $soapClient;
	
	public function __construct(){
		$this->soapClient = new \SoapClient($this->address); 
	}	

	/**
	 * Fonction qui retourne un tableau des genres musicaux du webservice
	 * 
	 * @return array[]|NULL
	 */
	public function getMusicGenresList() {
	
		$resultsWebService = $this->soapClient->GetMusicGenres();
		$genreResults = $resultsWebService->GetMusicGenresResult->MusicGenre;
	
		if($genreResults != null){
			$musicGenres = array();
			foreach ($genreResults as $genreResult) {
				$musicGenres[$genreResult->GenreId] = $genreResult->Name;
			}
			
			return $musicGenres;
		}
		return null;
	}
	
	/**
	 * Fonction qui retourne un genre musical du webservice en fonction de son identifiant numérique
	 * 
	 * @param int $id
	 * @return \App\Model\Entity\MusicGenre|NULL
	 */
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
	
	/**
	 * Fonction qui retourne la liste complète des titres liés à un genre musical spécifique du webservice
	 * 
	 * @param int $genreId
	 * @return \App\Model\Entity\MusicTrack[]|NULL
	 */
	public function getFullMusicTracksList($genreId){
		$resultsWebService = $this->soapClient->GetMusicGenreTracks(["genreID" => $genreId]);
		$trackResults = $resultsWebService->GetMusicGenreTracksResult->MusicTrack;
		
		if($trackResults != null){
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
		return null;
	}
	
	/**
	 * Fonction qui retourne la liste complète des titres liés à un genre musical spécifique du webservice
	 * (Adaptée aux besoins actuels de la plateforme topH.it)
	 * 
	 * @param int $genreId
	 * @return \App\Model\Entity\MusicTrack[]|NULL
	 */
	public function getMusicTracksList($genreId){
		$resultsWebService = $this->soapClient->GetMusicGenreTracks(["genreID" => $genreId]);
		$trackResults = $resultsWebService->GetMusicGenreTracksResult->MusicTrack;
	
		if($trackResults != null){
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
		return null;
	}
}

