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
}