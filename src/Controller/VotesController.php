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
	
	public function isAuthorized($user)
	{
		if ($this->request->action === 'add')
		{
			return true;
		}
		parent::isAuthorized($user);
	}
	
	
	
	public function add($idPoll =  null){
		
		$poll = PollManager::getPoll($idPoll);
		
		$manager = new PollManager();
		$tracks = $manager->getListToVote($idPoll, $poll->musicstyleid);
		
		$votes = TableRegistry::get('Votes');
		$vote = $votes->newEntity($this->request->data(), [
				'associated' => [
						'VoteTracks'
				]
		]);
		
// 		if ($this->request->is('post')) {
			//$data = $this->request->data();
			$user = $this->Auth->user();
			$vote->id_users = $user['id'];
			$vote->id_polls = $idPoll;
			$vote = $votes->patchEntity($vote, $this->request->data, ['associated' => ['VoteTracks']]);
			if ($votes->save($vote)) {
				$this->Flash->success(__('Le vote est sauvegardé.'));
				return $this->redirect(['controller'=>'polls','action' => 'index']);
			} else {
				$this->Flash->error(__('Le vote n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
			}
// 		}
		
		//var_dump($votes);
		$this->set(compact('poll', 'tracks', 'vote'));
		$this->set('_serialize', ['vote']);
		
		
	}
	
	public function test(){
// 		$votes = TableRegistry::get('Votes')->patchEntity($votes, $this->request->data, [
// 				'associated' => [
// 						'Users',
// 						'Polls',
// 						'VoteTracks'
// 				]
// 		]);
		debug($this->data);

		$manager = new PollManager();
		$tracks = $manager->getListToVote(1, 2);
		
		$votes = TableRegistry::get('Votes');
		$vote = $votes->newEntity([
				'associated' => [
						'VoteTracks'
				]
		]);
		$user = $this->Auth->user();
		$vote->id_users = $user['id'];
		$vote->id_polls = 1;
		
		
		var_dump($vote);
		
		if ($this->request->is('post')) {
			$vote = $votes->patchEntity($vote, $this->request->data, ['associated' => ['VoteTracks']]);
			$data = $this->request->data();
			$vote->vote_tracks[0]->trackorder = 1;
			$vote->vote_tracks[0]->trackid = $data['voteTracks'][0]['trackid'];
			
			if ($votes->save($vote,['associated' => ['VoteTracks']])) {
				return $this->redirect(['controller'=>'polls','action' => 'index']);
			} else {
				$this->Flash->error(__('Le vote n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
			}
		}
		
		
		$this->set(compact('votes', 'vote', 'tracks', 'voteTracks'));
		$this->set('_serialize', ['vote']);
	}

	public function test2(){
		$data = [
			[
				'id_users' => 7,
				'id_polls' => 1,
				'vote_tracks' => [
					'trackid' => 5,
					'trackorder' => 1								
				]
			]
		];
		
		foreach ($data as $record){
			$vote = $this->Votes->newEntity($record);
			
			if(isset($record['vote_tracks']) && !empty($record['vote_tracks'])){
				foreach ($record['vote_tracks'] as $record_vote_track){
					$vote_track = $this->Votes->VoteTracks->newEntity();
					$vote_track->trackid = $record_vote_track['trackid'];
					$vote_track->trackorder = $record_vote_track['trackorder'];
					$import->vote_tracks[] = $vote_track;
				}
			}
			if(!$this->Votes->save($vote)){
				$this->Flash->error('Pas de sauvegarde');
			}
		}
		

		$this->set(compact('vote_tracks', 'vote', 'tracks'));
		$this->set('_serialize', ['vote_tracks']);
		
	}
	
	public function fonctionne(){
		$votes = TableRegistry::get('Votes');
		
		$firstVoteTrack = $votes->VoteTracks->newEntity(); 
		$firstVoteTrack->trackid = 5;
		$firstVoteTrack->trackorder = 1;
		
		$secondVoteTrack = $votes->VoteTracks->newEntity();
		$secondVoteTrack->trackid = 4;
		$secondVoteTrack->trackorder = 2;
		
		$vote = $votes->newEntity();
		$vote->id_polls = 1;
		$vote->id_users = 7;
		$vote->vote_tracks = [$firstVoteTrack, $secondVoteTrack];
		
		$votes->save($vote);
		
		
	}
	public function test3(){
		$votes = TableRegistry::get('Votes');
		$vote = $votes->newEntity($this->request->data(), [
				'associated' => [
						'VoteTracks'
				]
		]);
		
		if ($this->request->is('post')) {
				debug($this->request->data());
			$firstVoteTrack = $votes->VoteTracks->newEntity();
			$firstVoteTrack->trackid = 5;
			$firstVoteTrack->trackorder = 1;
				
			$secondVoteTrack = $votes->VoteTracks->newEntity();
			$secondVoteTrack->trackid = 4;
			$secondVoteTrack->trackorder = 2;
				
			$vote = $votes->newEntity();
			$vote->id_polls = 1;
			$vote->id_users = 7;
			$vote->vote_tracks = [$firstVoteTrack, $secondVoteTrack];
				
			$votes->save($vote);
			if ($votes->save($vote,['associated' => ['VoteTracks']])) {
				return $this->redirect(['controller'=>'polls','action' => 'index']);
			} else {
				$this->Flash->error(__('Le vote n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
			}
		}
		
		$this->set(compact('poll', 'tracks'));
		$this->set('_serialize', ['poll']);
	
	
	}
	
}