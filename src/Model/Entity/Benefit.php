<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Benefit Entity
 *
 * @property int $id
 * @property string $designation
 * @property int $type_benefit_id
 *
 * @property \App\Model\Entity\TypeBenefit $type_benefit
 * @property \App\Model\Entity\Basket[] $baskets
 */
class Benefit extends Entity
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
