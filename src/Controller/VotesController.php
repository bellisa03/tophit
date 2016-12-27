<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use App\Model\BU\PollManager;

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
		
		$this->set(compact('poll'));
		$this->set('_serialize', ['poll']);
		
		
	}

	


}