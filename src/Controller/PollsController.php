<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use App\Model\BU\PollManager;

class PollsController extends AppController
{
	public function index() {

		//$polls = $this->Polls->find('all');
		//$pollManager = (new PollManager())->getPolls();
		
		$polls = PollManager::getPolls();
		
		$this->set(compact('polls'));
		$this->set('_serialize', ['polls']);
		
	}
	
	public function add(){
		
	}

	public function edit(){
		
	}
	
	public function beforeFilter(Event $event){

		$this->Auth->allow(['index']);

		if ($this->Auth->user() != null){
			$connectedUser = $this->Auth->user();
			$this->set('connectedUser', $connectedUser);
			
		}
	}
}