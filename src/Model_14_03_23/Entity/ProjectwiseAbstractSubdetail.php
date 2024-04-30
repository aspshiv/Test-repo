<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectwiseAbstractSubdetail Entity
 *
 * @property int $id
 * @property int|null $projectwise_abstract_detail_id
 * @property int|null $building_item_id
 * @property string|null $item_code
 * @property string|null $item_description
 * @property string|null $quantity
 * @property float|null $rate
 * @property float|null $amount
 * @property int|null $is_active
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\ProjectwiseAbstractDetail $projectwise_abstract_detail
 * @property \App\Model\Entity\BuildingItem $building_item
 */
class ProjectwiseAbstractSubdetail extends Entity
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
        'projectwise_abstract_detail_id' => true,
        'building_item_id' => true,
        'item_code' => true,
        'item_description' => true,
        'quantity' => true,
        'rate' => true,
        'amount' => true,
        'is_active' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'projectwise_abstract_detail' => true,
        'building_item' => true,
    ];
}
