<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use App\Model\Entity\Role;

/**
 * User Entity
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $email
 * @property string $lastname
 * @property int $role
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $firstname
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    
    public function _getRoleName(){
    	if($this->_properties['role'] != null){
    		if($this->_properties['role'] == 1){
    			return 'Admin';
    		}
    		if($role->id == 2){
    			return 'Utilisateur';
    		}
    		else{
    			return 'Rôle invalide';
    		}
    	}
    	else{
    		return 'Rôle indéfini';
    	}
    	
    }
    
    /* attribut virtuel */
    
    public $roleName;
    
//     protected function _setPassword($value)
//     {
//     	return (new DefaultPasswordHasher)->hash($value);
//     }
}
