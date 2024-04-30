<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * District Entity
 *
 * @property int $id
 * @property string $name
 * @property int|null $division_id
 * @property int $is_active
 * @property int|null $orderflag
 * @property int $created_by
 * @property int $updated_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property \Cake\I18n\FrozenTime $updated_on
 *
 * @property \App\Model\Entity\Division $division
 */
class District extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'name' => true,
        'division_id' => true,
        'is_active' => true,
        'orderflag' => true,
        'created_by' => true,
        'updated_by' => true,
        'created_on' => true,
        'updated_on' => true,
        'division' => true,
    ];
}
