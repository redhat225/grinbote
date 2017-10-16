<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Benefits Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TypeBenefits
 * @property \Cake\ORM\Association\HasMany $Baskets
 *
 * @method \App\Model\Entity\Benefit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Benefit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Benefit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Benefit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Benefit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Benefit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Benefit findOrCreate($search, callable $callback = null)
 */
class BenefitsTable extends Table
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

        $this->table('benefits');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('TypeBenefits', [
            'foreignKey' => 'type_benefit_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Baskets', [
            'foreignKey' => 'benefit_id'
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
            ->requirePresence('designation', 'create')
            ->notEmpty('designation');

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
        $rules->add($rules->existsIn(['type_benefit_id'], 'TypeBenefits'));

        return $rules;
    }
}
