<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use App\Model\BU\PollManager;
use Cake\ORM\TableRegistry;

class VoteTracksController extends AppController
{

	public function beforeFilter(Event $event){

		if ($this->Auth->user() != null){
			$connectedUser = $this->Auth->user();
			$this->set('connectedUser', $connectedUser);
		}
	}
	
	public function isAuthorized($user)
	{
		if ($this->request->action === 'addVote')
		{
			return true;
		}
		parent::isAuthorized($user);
	}
	
	public function addVote($idPoll =  null){
		$poll = PollManager::getPoll($idPoll);
		
		$manager = new PollManager();
		$tracks = $manager->getListToVote($idPoll, $poll->musicstyleid);
		
		$votes = TableRegistry::get('Votes');
		
		$firstvt = $votes->VoteTracks->newEntity();
		//$firstvt->trackid = 5;
		$firstvt->trackorder = 1;
		$vote = $votes->newEntity();
		
		$vote->id_users = $this->Auth->user('id');
		$vote->id_polls = $idPoll;
		
		if ($this->request->is('post')) {
			$firstvt = $votes->VoteTracks->patchEntity($firstvt, $this->request->data);
			
			$vote->vote_tracks = [$firstvt];
			$votes->save($vote);
			
			if ($votes->save($vote)) {
				$this->Flash->success(__('The item has been saved.'));
				return $this->redirect(['controller'=>'polls','action' => 'index']);
			} else {
				$this->Flash->error(__('The item could not be saved. Please, try again.'));
			}
		}
		
		var_dump($firstvt);
		var_dump($vote);
		$this->set(compact('firstvt', 'tracks'));
		$this->set('_serialize', ['firstvt']);
	}
	
	public function add($idPoll =  null){
	
		$poll = PollManager::getPoll($idPoll);
	
		$manager = new PollManager();
		$tracks = $manager->getListToVote($idPoll, $poll->musicstyleid);
	
		$voteTracks = TableRegistry::get('VoteTracks');
		
		$voteTrack = $voteTracks->newEntity($this->request->data(), [
				'associated' => [
						'Votes'
				]
		]);
	
		if ($this->request->is('post')) {
			$data = $this->request->data();
			$user = $this->Auth->user();
			$voteTrack->vote->id_users = $user['id'];
			$voteTrack->vote->id_polls = $idPoll;
			
			
			$voteTrack = $voteTracks->patchEntity($voteTrack, $this->request->data, ['associated' => ['Votes'], 'validate' => false]);
			if ($voteTracks->save($voteTrack)) {
				$this->Flash->success(__('Le vote est sauvegardé.'));
				return $this->redirect(['controller'=>'polls','action' => 'index']);
			} else {
				$this->Flash->error(__('Le vote n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
			}
		}
		$this->set('vote_track', $voteTrack);
		$this->set(compact('poll', 'tracks'));
		$this->set('_serialize', ['vote_track']);
	
	
	}
	public function add2($idPoll =  null){
	
		$poll = PollManager::getPoll($idPoll);
	
		$manager = new PollManager();
		$tracks = $manager->getListToVote($idPoll, $poll->musicstyleid);
	
		$voteTracks = TableRegistry::get('VoteTracks');
	
		$voteTrack1 = $voteTracks->newEntity();
	
		if ($this->request->is('post')) {
			$data = $this->request->data();
// 			$user = $this->Auth->user();
// 			$voteTrack1->vote->id_users = $user['id'];
// 			$voteTrack1->vote->id_polls = $idPoll;
			$voteTrack1->trackid = $data['trackid'];
			$voteTrack1->trackorder = $data['trackorder'];
			$voteTrack1->id_votes = $data['id_votes'];
				
			//$voteTrack1 = $voteTracks->patchEntity($voteTrack1, $this->request->data, ['associated' => ['Votes'], 'validate' => false]);
			if ($voteTracks->save($voteTrack1)) {
				$this->Flash->success(__('Le vote est sauvegardé.'));
				return $this->redirect(['controller'=>'polls','action' => 'index']);
			} else {
				$this->Flash->error(__('Le vote n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
			}
		}
		$this->set('vote_track', $voteTrack);
		$this->set(compact('poll', 'tracks'));
		$this->set('_serialize', ['vote_track']);
	
	
	}
	
}