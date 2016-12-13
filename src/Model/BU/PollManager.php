<?php
namespace App\Model\BU;

use Cake\ORM\TableRegistry;

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
    	}
    	
    	return $polls;
    }
}