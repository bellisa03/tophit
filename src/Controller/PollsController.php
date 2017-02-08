<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use App\Model\BU\PollManager;
use App\Model\BU\MusicServiceAgent;
use Cake\I18n\FrozenDate;

class PollsController extends AppController
{

	public function beforeFilter(Event $event){
	
		parent::beforeFilter($event);
		
		$this->Auth->allow(['index', 'view', 'archive']);
	
		if ($this->Auth->user() != null){
			$connectedUser = $this->Auth->user();
			$this->set('connectedUser', $connectedUser);
				
		}
	}
	
	public function index() {
		
		if ($this->Auth->user('role') == 2){
			$okToVote = PollManager::getPollsToVoteFor($this->Auth->user('id'));
		}
		$polls = PollManager::getPollsActive()->find('all');
		
		$this->set(compact('polls', 'okToVote'));
		$this->set('_serialize', ['polls']);
		
	}
	
	public function archive() {
	
		$polls = PollManager::getPollsInactive()->find('all');
	
		$this->set(compact('polls'));
		$this->set('_serialize', ['polls']);
	
	}
	
	public function view($id = null) {
		$poll = PollManager::getPoll($id);
			
		$manager = new PollManager();
		$okToVote = $manager->isAllowedToVote($id, $this->Auth->user('id'));
		$tracks = $manager->getVotesRanking($id, $poll->musicstyleid);
		
		$this->set(compact('poll', 'tracks', 'okToVote'));
		$this->set('_serialize', ['poll']);
		
	}
	
	public function add(){
		$serviceAgent = new MusicServiceAgent();
		$genres = $serviceAgent->getMusicGenresList();
		
		$poll = $this->Polls->newEntity();
		if ($this->request->is('post')) {
			$data = $this->request->data();
			$poll->title = $data['title'];
			$poll->description = $data['description'];
			$poll->begindate = FrozenDate::createFromFormat('d-m-Y', $data['begindate'])->format('Y-m-d');
			$poll->enddate = FrozenDate::createFromFormat('d-m-Y', $data['enddate'])->format('Y-m-d');
			$poll->status = $data['status'];
			$poll->musicstyleid = $data['musicstyleid'];
			
			if ($this->Polls->save($poll)) {
				$this->Flash->success(__('Le sondage a été sauvegardé.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('Le sondage n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
			}
		}
		
		$this->set(compact('poll', 'genres'));
		$this->set('_serialize', ['poll']);
	}

	public function edit($id = null){
		$poll = $this->Polls->get($id, [
				'contain' => []
		]);
		
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->data();
			$poll->title = $data['title'];
			$poll->description = $data['description'];
			$poll->begindate = FrozenDate::createFromFormat('d-m-Y', $data['begindate'])->format('Y-m-d');
			$poll->enddate = FrozenDate::createFromFormat('d-m-Y', $data['enddate'])->format('Y-m-d');
			$poll->status = $data['status'];
			$poll->musicstyleid = $data['musicstyleid'];
				
			if ($this->Polls->save($poll)) {
				$this->Flash->success(__('Le sondage a été sauvegardé.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('Le sondage n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
			}
		}
		
		$serviceAgent = new MusicServiceAgent();
		$genres = $serviceAgent->getMusicGenresList();
		
		$this->set(compact('poll', 'genres'));
		$this->set('_serialize', ['poll']);
		
	}
	

	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$poll = $this->Polls->get($id, [
				'contain' => ['Votes']				
		]);
		
		if($poll->votes == null){
			if ($this->Polls->delete($poll)) {
				$this->Flash->success(__('Le sondage a été supprimé.'));
			} else {
				$this->Flash->error(__('Le sondage n\'a pu être supprimé. Veuillez essayer à nouveau.'));
			}
		}
		else {
			$this->Flash->error(__('Le sondage ne peut être supprimé.'));
		}
		
		return $this->redirect(['action' => 'index']);
	}
	
	
}