<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Trump Entity
 *
 * @property int $id
 * @property int $mark_id
 * @property int $number
 * @property \Cake\I18n\FrozenDate $created
 * @property string $name
 *
 * @property \App\Model\Entity\Mark $mark
 */
class Trump extends Entity
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
        'mark_id' => true,
        'number' => true,
        'created' => true,
        'name' => true,
        'mark' => true,
    ];
}
