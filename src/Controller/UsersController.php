<?php


namespace App\Controller;
use App\Model\Entity\User;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Mailer\MailerAwareTrait;

class UsersController extends AppController
{
	// Le MailerAwareTrait permet au controller de pouvoir faire appel au Mailer (dossier contenant la logique des envois automatiques d'emails)
	use MailerAwareTrait;
	
	public function beforeFilter(Event $event){
	
		parent::beforeFilter($event);
		
		// la variable connectedUser permet d'éviter la confusion avec la variable user quand l'admin est connecté et ajoute ou modifie des utilisateurs.
		if ($this->Auth->user() != null){
			$connectedUser = $this->Auth->user();
			$this->set('connectedUser', $connectedUser);
		}
	}

	public function initialize(){
		
		parent::initialize();
		
		$this->Auth->allow(['logout', 'contact']);
	}
	
	public function index()
	{
		$users = $this->paginate($this->Users);
		
		$this->set(compact('users'));
		$this->set('_serialize', ['users']);
	}
	
	public function login() {
	
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error('Votre login ou mot de passe est incorrect.');
		}
	}
	
	public function logout(){
		
		$this->Flash->success('Vous êtes maintenant déconnecté.');
		return $this->redirect($this->Auth->logout());
	}

	public function add() {
		
		// permet de stocker la correspondance numérique des rôles en français (eux-mêmes stockés dans une constante)
		// et de s'en servir dans un menu déroulant.
		$roles[1] = ADMIN;
		$roles[2] = USER;
	
		$user = $this->Users->newEntity();
		
		if ($this->request->is('post')) {
			$user = $this->Users->patchEntity($user, $this->request->data);
			
			if ($this->Users->save($user)) {
				$this->getMailer('User')->send('welcome', [$user]);
				$this->Flash->success(__('L\'utilisateur a été sauvegardé. Un email de bienvenue vient de lui être adressé!'));
				return $this->redirect(['action' =>'index']);
				
			} else {
				$this->Flash->error(__('L\'utilisateur n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
			}
		}
		
		$this->set(compact('user', 'roles'));
		$this->set('_serialize', ['user']);
	}
	
	public function edit($id = null)
	{
		$user = $this->Users->get($id, [
				'contain' => []
		]);
		
		// Si un utilisateur est modifié et que son mot de passe reste inchangé, le framework le "hash" à nouveau et le rend inutilisable.
		// Pour éviter cela, si on modifie un profil d'utilisateur, il faut réencoder un mot de passe.
		$user->password ='';
		
		if ($this->request->is(['patch', 'post', 'put'])) {
			$user = $this->Users->patchEntity($user, $this->request->data);
			
			if ($this->Users->save($user)) {
				$this->Flash->success(__('L\'utilisateur a été sauvegardé.'));
				return $this->redirect(['action' => 'index']);
				
			} else {
				$this->Flash->error(__('L\'utilisateur n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
			}
		}
		
		// permet de stocker la correspondance numérique des rôles en français (eux-mêmes stockés dans une constante)
		// et de s'en servir dans un menu déroulant.
		$roles[1] = ADMIN;
		$roles[2] = USER;

		$this->set(compact('user', 'roles'));
		$this->set('_serialize', ['user']);
	}
	
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$user = $this->Users->get($id, [
				'contain' => ['Votes']
		]);
		
		if($user->votes == null){
			
			if ($this->Users->delete($user)) {
				$this->Flash->success(__('L\'utilisateur a été supprimé.'));
				
			} else {
				$this->Flash->error(__('L\'utilisateur n\'a pu être supprimé. Veuillez essayer à nouveau.'));
			}
			
		} else {
			$this->Flash->error(__('L\'utilisateur ne peut être supprimé.'));
		}
		return $this->redirect(['action' => 'index']);
	}
}