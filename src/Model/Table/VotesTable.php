<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Votes Model
 *
 * @method \App\Model\Entity\Vote get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vote newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vote[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vote|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vote patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vote[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vote findOrCreate($search, callable $callback = null)
 */
class VotesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('votes');
        $this->displayField('id');
        $this->primaryKey('id');
        
//         $this->belongsTo('Users', [
//         		'foreignKey' => 'id_users',
//         		'bindingKey' => 'id'
//         ]);
        
//         $this->belongsTo('Polls', [
//         		'foreignKey' => 'id_polls',
//         		'bindingKey' => 'id'
//         ]);
        
//         $this->hasMany('VoteTracks', [
//         		'foreignKey' => 'id',
//         		'bindingKey' => [
//         				'id_users',
//         				'id_polls'
//         		]
//         ]);
        $this->hasMany('VoteTracks', [
        		'foreignKey' => 'id_votes',
        		'bindingKey' => 'id',
        		'propertyName' => 'vote_track'
        		
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('id_users')
            ->requirePresence('id_users', 'create')
            ->notEmpty('id_users');

        $validator
            ->integer('id_polls')
            ->requirePresence('id_polls', 'create')
            ->notEmpty('id_polls');

        return $validator;
    }
}
