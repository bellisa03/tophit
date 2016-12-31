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
		
		$vote_tracks = TableRegistry::get('VoteTracks')->find('all', [
				'contain' => ['Votes'],
				'conditions' => ['Votes.id_polls ='=> 1]
				
		]);

		$manager = new PollManager();
		$tracks = $manager->getListToVote(1, 2);
		
		$votes = TableRegistry::get('Votes');
		$vote = $votes->newEntity($this->request->data(), [
				'associated' => [
						'VoteTracks'
				]
		]);
		
		
		//if ($this->request->is('post')) {
			$user = $this->Auth->user();
			$vote->id_users = $user['id'];
			$vote->id_polls = 1;
			$vote->vote_tracks->trackid = 5;
			$vote->vote_tracks->trackorder = 1;
			if ($votes->save($vote,['associated' => ['VoteTracks']])) {
				return $this->redirect(['controller'=>'polls','action' => 'index']);
			} else {
				$this->Flash->error(__('Le vote n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
			}
		//}
		
		
		$this->set(compact('vote_tracks', 'votes', 'vote', 'tracks'));
		$this->set('_serialize', ['vote_tracks']);
	}

	


}