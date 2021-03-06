<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use App\Model\BU\PollManager;
use Cake\ORM\TableRegistry;

class VotesController extends AppController
{

	public function beforeFilter(Event $event){

		if ($this->Auth->user() != null){
			$connectedUser = $this->Auth->user();
			$this->set('connectedUser', $connectedUser);
		}
	}
	
	public function isAuthorized($user)
	{
		if ($this->request->action === 'add')
		{
			return true;
		}
		
		parent::isAuthorized($user);
	}
	
	
	
	public function add($idPoll =  null){
		
		$manager = new PollManager();
		
		//Test si l'utilisateur est autorisé à voter, dans le cas où l'utilisateur encoderait l'url directement dans le navigateur
		if($manager->isAllowedToVote($idPoll, $this->Auth->user('id'))){

			$poll = PollManager::getPoll($idPoll);
			$tracks = $manager->getListToVote($idPoll, $poll->musicstyleid);
			$formattedDates = $manager->getPollFormattedDates($idPoll);
			
			$votes = TableRegistry::get('Votes');
			$vote = $votes->newEntity($this->request->data(), [
					'associated' => [
							'VoteTracks'
					]
			]);
			
			if ($this->request->is('post')) {
				$data = $this->request->data();
				$vote->id_polls = $data['id_polls'];
				$vote->id_users = $data['id_users'];
					
				foreach ($data['vote_tracks'] as $data_vote_track){
					$vote_track = $this->Votes->VoteTracks->newEntity();
					$vote_track->trackid = $data_vote_track['trackid'];
					$vote_track->trackorder = $data_vote_track['trackorder'];
					$selection[] = $vote_track;
				}
				$vote->vote_track = $selection;
					
				if ($votes->save($vote, ['associated' => ['VoteTracks']])) {
					$this->Flash->success(__('Le vote est sauvegardé.'));
					return $this->redirect(['controller'=>'polls','action' => 'index']);
				} else {
					$this->Flash->error(__('Le vote n\'a pu être sauvegardé. Veuillez essayer à nouveau.'));
				}
			}
			
			$this->set(compact('poll', 'tracks', 'vote', 'formattedDates'));
			$this->set('_serialize', ['vote']);
		}else {
			$this->Flash->error(__('Vous avez déjà voté pour ce sondage'));
			return $this->redirect(['controller'=>'polls','action' => 'index']);
		}	
	}
}