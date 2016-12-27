<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use App\Model\BU\PollManager;
use App\Model\BU\MusicServiceAgent;

class PollsController extends AppController
{
	public function index() {

		//$polls = $this->Polls->find('all');
		//$pollManager = (new PollManager())->getPolls();
		
		$polls = PollManager::getPolls();
		
		$this->set(compact('polls'));
		$this->set('_serialize', ['polls']);
		
	}
	
	public function view($id = null) {
		$poll = $this->Polls->get($id, [
				'contain' => []
		]);

		$this->set(compact('poll', 'genres'));
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
			if($data['begindate']){
				$begindate = $data['begindate']['year']. '-' . $data['begindate']['month']. '-' . $data['begindate']['day'];
			}
			$poll->begindate = $begindate;
			if($data['enddate']){
				$enddate = $data['enddate']['year']. '-' . $data['enddate']['month']. '-' . $data['enddate']['day'];
			}
			$poll->enddate = $enddate;
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
			if($data['begindate']){
				$begindate = $data['begindate']['year']. '-' . $data['begindate']['month']. '-' . $data['begindate']['day'];
			}
			$poll->begindate = $begindate;
			if($data['enddate']){
				$enddate = $data['enddate']['year']. '-' . $data['enddate']['month']. '-' . $data['enddate']['day'];
			}
			$poll->enddate = $enddate;
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
		$poll = $this->Polls->get($id);
		if ($this->Polls->delete($poll)) {
			$this->Flash->success(__('Le sondage a été supprimé.'));
		} else {
			$this->Flash->error(__('Le sondage n\'a pu être supprimé. Veuillez essayer à nouveau.'));
		}
		return $this->redirect(['action' => 'index']);
	}
	
	
	public function beforeFilter(Event $event){

		$this->Auth->allow(['index']);

		if ($this->Auth->user() != null){
			$connectedUser = $this->Auth->user();
			$this->set('connectedUser', $connectedUser);
			
		}
	}
}