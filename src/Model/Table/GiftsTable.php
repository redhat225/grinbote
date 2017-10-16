<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Gifts Model
 *
 * @property \Cake\ORM\Association\HasMany $Sales
 *
 * @method \App\Model\Entity\Gift get($primaryKey, $options = [])
 * @method \App\Model\Entity\Gift newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Gift[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Gift|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gift patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Gift[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Gift findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GiftsTable extends Table
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

        $this->table('gifts');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Sales', [
            'foreignKey' => 'gift_id'
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
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->integer('validity')
            ->requirePresence('validity', 'create')
            ->notEmpty('validity');

        $validator
            ->integer('ratio')
            ->requirePresence('ratio', 'create')
            ->notEmpty('ratio');

        $validator
            ->integer('count')
            ->requirePresence('count', 'create')
            ->notEmpty('count');

        $validator
            ->integer('won')
            ->requirePresence('won', 'create')
            ->notEmpty('won');

        return $validator;
    }
}
