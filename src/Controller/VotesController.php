<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use App\Model\BU\PollManager;
use App\Model\BU\MusicServiceAgent;
use App\Model\Entity\MusicTrack;
use Cake\ORM\TableRegistry;

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
	
	public function test(){
// 		$votes = TableRegistry::get('Votes')->patchEntity($votes, $this->request->data, [
// 				'associated' => [
// 						'Users',
// 						'Polls',
// 						'VoteTracks'
// 				]
// 		]);
		
		//$votetracks = TableRegistry::get('VoteTracks')->find('all')->contain(['Votes']);
		//$votetracks = TableRegistry::get('VoteTracks')->find('all')->contain(['Votes'])->andWhere('Votes.id_polls'== 2);
		$votetracks = TableRegistry::get('VoteTracks')->find('all', [
				'contain' => ['Votes'],
				'conditions' => ['Votes.id_polls ='=> 1]
				
		]);

		$manager = new PollManager();
		$ranking = $manager->getVotesRanking(1, 2);
		var_dump($ranking);
		
		$this->set(compact('votetracks', 'votes', 'ranking'));
		$this->set('_serialize', ['votetracks']);
	}

	


}