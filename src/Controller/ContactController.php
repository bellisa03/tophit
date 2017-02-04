<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use App\Controller\AppController;
use App\Form\ContactForm;

class ContactController extends AppController
{

	public function beforeFilter(Event $event){
		
		parent::beforeFilter($event);
		
		$this->Auth->allow(['contact']);
	
		if ($this->Auth->user() != null){
			$connectedUser = $this->Auth->user();
			$this->set('connectedUser', $connectedUser);
		}
	}
	
	public function add(){
		
		$contact = new ContactForm();
		if ($this->request->is('post')) {
			if ($contact->execute($this->request->data)) {
				$this->Flash->success('Votre formulaire a bien été soumis. Nous reviendrons vers vous rapidement.');
			} else {
				$this->Flash->error('Il y a eu un problème lors de la soumission de votre formulaire.');
			}
		}
		$this->set('contact', $contact);
	}
	
}