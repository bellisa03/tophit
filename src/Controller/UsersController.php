<?php


namespace App\Controller;
use App\Model\Entity\User;
use Cake\Controller\Controller;
use Cake\Event\Event;


class UsersController extends AppController
{

	public function initialize(){
		parent::initialize();
		$this->Auth->allow(['logout']);
	}
	

	public function beforeFilter(Event $event){
	
		parent::beforeFilter($event);
		
		if ($this->Auth->user() != null){
			$user = $this->Auth->user();
			$this->set('user', $user);
		}
	}


	public function index()
	{
		$users = $this->paginate($this->Users);
		$this->set(compact('users'));
		$this->set('_serialize', ['users']);
	}
	
	
	public function login() {
		
// 		if ($this->request->is('post')) {
// 			$user = $this->Auth->identify();
// 			if ($user) {
// 				$this->Auth->setUser($user);
// 				return $this->redirect($this->Auth->redirectUrl());
// 			}
// 			$this->Flash->error('Votre login ou mot de passe est incorrect.');
// 		}
		if ($this->request->is('post')) {
			// $user = $this->Auth->identify(); // si on a une base de données
			// si on n'a pas de base de données !!!
			$username = $this->request->data['username'];
			$password = $this->request->data['password'];
				
			if ($username == "test" && $password == "test") {
				$user = new User();
				$user->username = $username;
				$user->password = $password;
				$user->role = 'user'; // to change with model and DB
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('Invalid username or password, try again'));
		}
	}
	
	public function logout(){
		$this->Flash->success('Vous êtes maintenant déconnecté.');
		return $this->redirect($this->Auth->redirectUrl());
	}

	public function add() {
	
		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {
			$user = $this->Users->patchEntity($user, $this->request->data);
			$user->created = getdate();
			var_dump($user);
			var_dump($user);
			if ($this->Users->save($user)) {
				$this->Flash->success(__('L\'utilisateur a été sauvegardé.'));
				return $this->redirect(['action' =>'index']);
			} else {
				$this->Flash->error(__('L\'utilisateur n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
			}
		}
		$this->set(compact('user'));
		$this->set('_serialize', ['user']);
	}
	
	public function edit($id = null)
	{
		$user = $this->Users->get($id, [
				'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$user = $this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) {
				$this->Flash->success(__('L\'utilisateur a été sauvegardé.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('L\'utilisateur n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
			}
		}
		$this->set(compact('user'));
		$this->set('_serialize', ['user']);
	}
	
}