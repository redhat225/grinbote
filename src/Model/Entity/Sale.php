<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sale Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property string $customer
 * @property string $adress
 * @property \Cake\I18n\Time $modified
 * @property int $user_id
 * @property int $total
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Basket[] $baskets
 */
class Sale extends Entity
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
}
