<?php
namespace App\Model\BU;

use Cake\ORM\TableRegistry;

class UserManager
{

	public static function getUsers(){
		 
		$users = TableRegistry::get('Users')->find();
		 
		foreach ($users as $user){
			if($user->role == 1){
				$user->roleName = 'Admin';
			}
			if($user->role == 2){
				$user->roleName = 'Utilisateur';
			}
			else{
				$user->roleName = "Indéfini";
			}
		}
		var_dump($users); 
		return $users;
	}
}
