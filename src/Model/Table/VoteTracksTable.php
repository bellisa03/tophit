<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VoteTracks Model
 *
 * @method \App\Model\Entity\VoteTrack get($primaryKey, $options = [])
 * @method \App\Model\Entity\VoteTrack newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VoteTrack[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VoteTrack|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VoteTrack patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VoteTrack[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VoteTrack findOrCreate($search, callable $callback = null)
 */
class VoteTracksTable extends Table
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

        $this->table('vote_tracks');
        $this->displayField('id');
        $this->primaryKey('id');
        
        $this->hasOne('Votes', [
        		'foreignKey' => 'id',
        		'bindingKey' => 'id_votes'
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
            ->integer('trackid')
            ->requirePresence('trackid', 'create')
            ->notEmpty('trackid');

        $validator
            ->integer('trackorder')
            ->requirePresence('trackorder', 'create')
            ->notEmpty('trackorder');

        $validator
            ->integer('id_votes')
            ->requirePresence('id_votes', 'create')
            ->notEmpty('id_votes');

        return $validator;
    }
}
