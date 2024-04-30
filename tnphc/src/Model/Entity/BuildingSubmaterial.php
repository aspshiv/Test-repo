<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BuildingSubmaterial Entity
 *
 * @property int $id
 * @property string $name
 * @property int|null $is_active
 * @property \Cake\I18n\FrozenDate|null $created_date
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenDate|null $modified_date
 * @property int|null $modified_by
 */
class BuildingSubmaterial extends Entity
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
        'is_active' => true,
        'created_date' => true,
        'created_by' => true,
        'modified_date' => true,
        'modified_by' => true,
    ];
}
