<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reservation Entity
 *
 * @property int $id
 * @property string $client
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $datewanted
 * @property int $benefit_id
 * @property int $site_id
 *
 * @property \App\Model\Entity\Benefit $benefit
 * @property \App\Model\Entity\Site $site
 */
class Reservation extends Entity
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
