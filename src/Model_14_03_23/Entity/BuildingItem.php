<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BuildingItem Entity
 *
 * @property int $id
 * @property string $item_code
 * @property string $item_description
 * @property int|null $is_active
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenDate|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenDate|null $modified_date
 */
class BuildingItem extends Entity
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
        'item_code' => true,
        'item_description' => true,
        'is_active' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
    ];
}
