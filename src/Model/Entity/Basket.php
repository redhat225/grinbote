<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Basket Entity
 *
 * @property int $id
 * @property int $sale_id
 * @property int $benefit_id
 * @property int $price
 * @property int $qte
 *
 * @property \App\Model\Entity\Sale $sale
 * @property \App\Model\Entity\Benefit $benefit
 */
class Basket extends Entity
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
