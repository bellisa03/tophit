<?php
namespace App\Model\BU;

use Cake\ORM\TableRegistry;

class PollManager
{
    /**
     * Fonction qui retourne la liste des sondages actifs.
     * Grâce à des propriétés virtuelles, elle retourne: l'ID du genre musical et son nom, 
     * la somme totale des votes comptabilisés pour chaque sondage.
     * Retourne un tableau d'objets de type poll.
     * 
     * @return \Cake\ORM\Query
     */
    public static function getPollsActive(){
    	
    	$polls = TableRegistry::get('Polls')->find('all', ['order' =>['begindate' => 'desc']])
    		->where([    			
    			'status =' => 1,
    		]);
    	
    	$votes = TableRegistry::get('Votes')->find();
    	$serviceAgent = new MusicServiceAgent();
    	
    	foreach ($polls as $poll){
    		$musicGenre = $serviceAgent->getMusicGenre($poll->musicstyleid);
    		
    		$poll->sumVotes = 0;
    		if($votes != null){
    			foreach ($votes as $vote){
    				if($vote->id_polls == $poll->id){
    					$poll->sumVotes ++;
    				}
    			}
    		}
    	}
    	
    	return $polls;
    }
    
    /**
     * Fonction qui retourne la liste des sondages inactifs.
     * Grâce à des propriétés virtuelles, elle retourne: l'ID du genre musical et son nom, 
     * la somme totale des votes comptabilisés pour chaque sondage.
     * Retourne un tableau d'objets de type poll.
     * 
     * @return \Cake\ORM\Query
     */
    public static function getPollsInactive(){
    	 
    	$polls = TableRegistry::get('Polls')->find('all', ['order' =>['begindate' => 'desc']])
    	->where([
    			'status =' => 2,
    	]);
    	 
    	$votes = TableRegistry::get('Votes')->find();
    	$serviceAgent = new MusicServiceAgent();
    	 
    	foreach ($polls as $poll){
    		$musicGenre = $serviceAgent->getMusicGenre($poll->musicstyleid);
    
    		$poll->sumVotes = 0;
    		if($votes != null){
    			foreach ($votes as $vote){
    				if($vote->id_polls == $poll->id){
    					$poll->sumVotes ++;
    				}
    			}
    		}
    	}
    	 
    	return $polls;
    }

    /**
     * Fonction qui retourne un sondage en particulier.
     * Grâce à des propriétés virtuelles, elle retourne: l'ID du genre musical et son nom, 
     * la somme totale des votes comptabilisés pour ce sondage.
     * Prend en paramètre l'id du sondage et retourne une variable de type poll.
     * 
     * @param int $id
     * @return \Cake\Datasource\EntityInterface
     */
    public static function getPoll($id = null){
    	 
    	$poll = TableRegistry::get('Polls')->get($id);
    	 
    	$serviceAgent = new MusicServiceAgent();    	
    	$musicGenre = $serviceAgent->getMusicGenre($poll->musicstyleid);
    
    	$votes = TableRegistry::get('Votes')->find();
    	$poll->sumVotes = 0;
    	if($votes != null){
	    	foreach ($votes as $vote){
    			if($vote->id_polls == $id){
    				$poll->sumVotes ++;
    			}
    		}
    	}
    	
    	return $poll;
    }
    
    /**
     * Fonction qui retourne la liste des titres d'un sondage particulier triés en fonction d'une pondération des votes sous forme de tableau.
     * Prend en paramètre l'id du sondage et de la catégorie.
     * 
     * @param int $pollId
     * @param int $pollmusicstyleid
     * @return \App\Model\Entity\MusicTrack[]
     */
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
		
    	PollManager::sortArrayOfArray($musicTracks, 'ranking');
		
    	return $musicTracks;
    }

    /**
     * Fonction qui permet de faire un tri sur un tableau d'objet indicé.
     * Prend en paramètre le tableau et la propriété de l'objet sur laquelle le tri va être fait.
     * retourne via la fonction array_multisort le tableau trié par ordre descendant.
     *
     * @param unknown $array
     * @param unknown $subfield
     * @return unknown $array
     */
    public static function sortArrayOfArray(&$array, $subfield)
    {
    	$sortarray = array();
    	foreach ($array as $key => $row)
    	{
    		$sortarray[$key] = $row->$subfield;
    	}
    	 
    	return array_multisort($sortarray, SORT_DESC, $array);
    }
    
    /**
     * Fonction qui génère un tableau contenant le listing des titres de musiques d'un certain genre musical
     * sour forme de string (mis en forme pour un dropdown select)
     * 
     * @param int $pollmusicstyleid
     * @return string[]
     */
    public function getListToVote($pollmusicstyleid){

    	$musicAgent = new MusicServiceAgent();
    	$musicTracks = $musicAgent->getMusicTracksList($pollmusicstyleid);
    	
    	$tracks= [];
    	foreach ($musicTracks as $musicTrack){
    		$tracks[$musicTrack->trackID] = $musicTrack->artistName .' - '. $musicTrack->trackTitle;
    	}
    	
    	return $tracks;
    }
    
    /**
     * Permet d'identifier si un utilisateur est autorisé à voter pour un sondage.
     * 
     * @param int $pollId
     * @param int $userID
     * @return boolean
     */
    public function isAllowedToVote($pollId, $userID){
    
    	$votes = TableRegistry::get('Votes')->find('all')
    		->where([    			
    			'Votes.id_polls' => $pollId,
    		])
    		->andWhere([
    			'Votes.id_users' => $userID,
    		]);
    		
    	foreach ($votes as $vote){
    		if($vote) return false;
    	}
    	
    	return true;
    }
    
    /**
     * Permet d'identifier pour quel(s) sondage(s) un utilisateur est autorisé à voter.
     *
     * @param int $userId
     * @return boolean[]
     */
    public static function getPollsToVoteFor($userId){
    
    	$polls = TableRegistry::get('Polls')->find('all');
    
    	$manager = new PollManager();
    	$okToVote = [];
    	foreach ($polls as $poll){
    		if($manager->isAllowedToVote($poll->id, $userId)){
    			$okToVote[$poll->id] = true;
    		}
    		else{
    			$okToVote[$poll->id] = false;
    		}
    	}
    	
    	return $okToVote;
    }
}