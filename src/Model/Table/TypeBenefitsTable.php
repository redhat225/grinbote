<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypeBenefits Model
 *
 * @property \Cake\ORM\Association\HasMany $Benefits
 *
 * @method \App\Model\Entity\TypeBenefit get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypeBenefit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypeBenefit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypeBenefit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypeBenefit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypeBenefit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypeBenefit findOrCreate($search, callable $callback = null)
 */
class TypeBenefitsTable extends Table
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

        $this->table('type_benefits');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Benefits', [
            'foreignKey' => 'type_benefit_id'
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
            ->requirePresence('nom', 'create')
            ->notEmpty('nom');

        return $validator;
    }

    public function findOnlyName(query $query, array $options)
    {
        $query->select('nom','id');
           return $query;
    }
}
