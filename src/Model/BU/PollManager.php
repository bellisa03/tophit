<?php
namespace App\Model\BU;

use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

class PollManager
{
    
    public static function getPolls(){
    	
    	$polls = TableRegistry::get('Polls')->find();
    	
    	$serviceAgent = new MusicServiceAgent();
    	
    	foreach ($polls as $poll){
    		$musicGenre = $serviceAgent->getMusicGenre($poll->musicstyleid);
    		
    		if ($musicGenre != null){
    			$poll->musicGenreFullName = $musicGenre->getGenreID() . ' - ' . $musicGenre->getName();
    		} else {
    			$poll->musicGenreFullName = 'inconnu';
    		}
    		
    		$poll->beginformat = new date($poll->begindate);
    		$poll->beginformat->format('d/M/YY');

    	}
    	
    	return $polls;
    }
    
    /*
     * Fonction qui retourne un sondage en particulier.
     * Grâce à des propriétés virtuelles, elle retourne:
     * - l'ID du genre musical et son nom.
     * - la somme totale des votes comptabilisés pour ce sondage.
     * Prend en paramètre l'id du sondage et retourne une variable $poll.
     */
    public static function getPoll($id = null){
    	 
    	$poll = TableRegistry::get('Polls')->get($id);
    	 
    	$serviceAgent = new MusicServiceAgent();    	
    	$musicGenre = $serviceAgent->getMusicGenre($poll->musicstyleid);
    
    	if ($musicGenre != null){
    			$poll->musicGenreFullName = $musicGenre->getGenreID() . ' - ' . $musicGenre->getName();
    	} else {
    		$poll->musicGenreFullName = 'inconnu';
    	}
    
    	$votes = TableRegistry::get('Votes')->find();
    	$poll->sumVotes = 0;
    	if($votes != null){
	    	foreach ($votes as $vote){
    			if($vote->id_polls == $id){
    				$poll->sumVotes ++;
    			}
    		}
    	}
    	
    	$poll->beginformat = new date($poll->begindate);
    	$poll->beginformat->format('d/M/YY');
    
    	
    	return $poll;
    }
    
    public function getVotesRanking($pollId, $pollmusicstyleid){
    	
    	$votetracks = TableRegistry::get('VoteTracks')->find('all', [
    			'contain' => ['Votes'],
    			'conditions' => ['Votes.id_polls ='=> $pollId]    	
    	]);
    
    	
    	$musicAgent = new MusicServiceAgent();
    	$musicTracks = $musicAgent->getMusicTracksList($pollmusicstyleid);
    	if($votetracks && $musicTracks != null){
    		foreach ($musicTracks as $musicTrack){
    			$musicTrack->ranking = 0;
    			foreach ($votetracks as $votetrack) {
    				if($musicTrack->trackID == $votetrack->trackid){
    					if($votetrack->trackorder == 1) $musicTrack->ranking =+8;
    					if($votetrack->trackorder == 2) $musicTrack->ranking =+5;
    					if($votetrack->trackorder == 3) $musicTrack->ranking =+3;
    					if($votetrack->trackorder == 4) $musicTrack->ranking =+2;
    					if($votetrack->trackorder == 5) $musicTrack->ranking =+1;
    				}	
    			}
    		}
    	}
    	return $musicTracks;
    }
}