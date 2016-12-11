<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Role extends Entity
{
	private $roleID;
	private $name;
	
	function getRoleID(){
		return $this->roleID;
	}
	
	function setRoleID($roleID){
		$this->roleID = $roleID;
	}
	
	function getName(){
		return $this->name;
	}
	
	function setName($name){
		$this->name = $name;
	}
	
}