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
}
