<?php


namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class HomeController extends AppController
{

	public function beforeFilter(Event $event){
	
		$this->Auth->allow(['index', 'about']);
		if ($this->Auth->user() != null){
			$connectedUser = $this->Auth->user();
			$this->set('connectedUser', $connectedUser);
		}
	}
	
	public function index(){
		
	}
	
	public function about(){
	
	}
	

}