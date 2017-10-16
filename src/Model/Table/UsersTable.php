<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;
/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $Sales
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null)
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Sales', [
            'foreignKey' => 'user_id'
        ]);

        $this->belongsTo('Sites', [
            'foreignKey' => 'site_id',
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
            ->requirePresence('nom', 'create')
            ->notEmpty('nom')
            ->lengthBetween('nom',[2,25]);

        $validator
            ->requirePresence('prenom', 'create')
            ->notEmpty('prenom','Veuillez renseigner votre prenom.')
            ->lengthBetween('prenom',[2,25]);;

        $validator
            ->requirePresence('role', 'create')
            ->notEmpty('role','Veuillez renseigner un role.');

        $validator
            ->integer('phone')
            ->requirePresence('phone', 'create')
            ->notEmpty('phone','Veuillez renseigner un numéro de téléphone à 8 chiffres.')
            ->lengthBetween('phone',[8,8]);

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password','Veuillez renseigner un mot de passe avec au moins 8 caractères')
            ->lengthBetween('password',[8,25]);

        return $validator;
    }

    public function findAuthClient(Query $query, array $options)
    {
        $query->select(['id','nom','prenom','role','phone','password']);
        return $query;
    }

    public function findShortView(Query $query, array $options)
    {
        $query->join([ 
                       'sites'=>[
                       'table' => 'sites',
                       'type' => 'INNER',
                       'conditions' => 'Users.site_id = sites.id'  
                                ],
                        'areas'=>[
                        'table'=>'areas',
                        'type'=>'INNER',
                        'conditions' => 'sites.area_id = areas.id'
                        ]
                        ])->select(['Users.id','Users.nom','Users.prenom','Users.role','Users.phone','sites.nom','areas.nom']);
        return $query;
    }

    public function findPassword(Query $query,array $options)
    {
        $query->select(['password'])
               ->where(['id'=>$options['id']]);

        return $query->toArray();

    }

    public function verifyPassword($password,$hashPassword)
    {
        return (new DefaultPasswordHasher)->check($password,$hashPassword);
    }
}
