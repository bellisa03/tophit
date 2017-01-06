<?php
namespace App\Model\BU;

use Cake\ORM\TableRegistry; 

class UserManager
{

	public static function getUsers(){
		 
		$users = TableRegistry::get('Users')->find();
		 
		foreach ($users as $user){
			if($user->role != null){
				if($user->role == 1){
					$user->roleName = 'Admin';
				}
				else{
					$user->roleName = 'Utilisateur';
				}
			}
			
			else{
				$user->roleName = "Indéfini";
			}
		}
		var_dump($users); 
		return $users;
	}
	
	public static function getUsersFormattedDates(){
		$users = TableRegistry::get('Users')->find();
		 
		foreach ($users as $user){
			$temp = new \DateTime($user->created);
			$newTemp = $temp->format('d/m/Y - H:m');
			$formattedDates[$user->id]['created'] = $newTemp;
			$temp = new \DateTime($user->modified);
			$newTemp = $temp->format('d/m/Y - H:m');
			$formattedDates[$user->id]['modified'] = $newTemp;
	
		}
		return $formattedDates;
	}
}
