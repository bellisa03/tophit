<?php


namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class HomeController extends AppController
{

	public function beforeFilter(Event $event){
	
		$this->Auth->allow(['index']);
		if ($this->Auth->user() != null){
			$user = $this->Auth->user();
		
			$this->set('user', $user);
		}
	}
	
	public function index(){
		
	}
	
	public function about(){
	
	}
	

}