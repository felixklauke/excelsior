<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Forums Model
 *
 * @property \App\Model\Table\PostsTable|\Cake\ORM\Association\HasMany $Posts
 * @property \App\Model\Table\TopicsTable|\Cake\ORM\Association\HasMany $Topics
 *
 * @method \App\Model\Entity\Forum get($primaryKey, $options = [])
 * @method \App\Model\Entity\Forum newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Forum[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Forum|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Forum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Forum[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Forum findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ForumsTable extends Table
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

        $this->setTable('forums');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Posts', [
            'foreignKey' => 'forum_id'
        ]);
        $this->hasMany('Topics', [
            'foreignKey' => 'forum_id'
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
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
