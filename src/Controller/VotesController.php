<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use App\Model\BU\PollManager;
use App\Model\BU\MusicServiceAgent;
use App\Model\Entity\MusicTrack;

class VotesController extends AppController
{

	public function beforeFilter(Event $event){

		if ($this->Auth->user() != null){
			$connectedUser = $this->Auth->user();
			$this->set('connectedUser', $connectedUser);
		}
	}

	public function add($idPoll =  null){
		
		$poll = PollManager::getPoll($idPoll);
		
// 		$vote = $this->Votes->patchEntity($vote, $this->request->data, [
// 				'associated' => [
// 						'Users',
// 						'Polls',
// 						'VoteTrack'
// 				]
// 		]);
		
		$serviceAgent = new MusicServiceAgent();
		$musicTracks = $serviceAgent->getMusicTracksList($poll->musicstyleid);
		
		$tracks= [];
		foreach ($musicTracks as $musicTrack){
			$tracks[$musicTrack->trackID] = $musicTrack->artistName .' - '. $musicTrack->trackTitle;
		}
		
		$this->set(compact('poll', 'tracks'));
		$this->set('_serialize', ['poll']);
		
		
	}

	


}