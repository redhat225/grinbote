<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Baskets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sales
 * @property \Cake\ORM\Association\BelongsTo $Benefits
 *
 * @method \App\Model\Entity\Basket get($primaryKey, $options = [])
 * @method \App\Model\Entity\Basket newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Basket[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Basket|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Basket patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Basket[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Basket findOrCreate($search, callable $callback = null)
 */
class BasketsTable extends Table
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

        $this->table('baskets');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Sales', [
            'foreignKey' => 'sale_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Benefits', [
            'foreignKey' => 'benefit_id',
            'joinType' => 'INNER'
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
            ->integer('price')
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->integer('qte')
            ->requirePresence('qte', 'create')
            ->notEmpty('qte');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['sale_id'], 'Sales'));
        $rules->add($rules->existsIn(['benefit_id'], 'Benefits'));

        return $rules;
    }
}
