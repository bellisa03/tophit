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

	public function beforeFilter(Event $event){

		$this->Auth->allow(['index']);

		if ($this->Auth->user() != null){
			$user = $this->Auth->user();

			$this->set('user', $user);
		}
	}
}