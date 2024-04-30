<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BuildingMaterialDetail Entity
 *
 * @property int $id
 * @property int|null $building_material_id
 * @property int|null $building_submaterial_id
 * @property float|null $quantity
 * @property int|null $unit_id
 * @property int|null $is_active
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\BuildingMaterial $building_material
 * @property \App\Model\Entity\BuildingSubmaterial $building_submaterial
 * @property \App\Model\Entity\Unit $unit
 * @property \App\Model\Entity\FinancialyearwiseMaterialCostSubdetail[] $financialyearwise_material_cost_subdetails
 */
class BuildingMaterialDetail extends Entity
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
        'building_material_id' => true,
        'building_submaterial_id' => true,
        'quantity' => true,
        'unit_id' => true,
        'is_active' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'building_material' => true,
        'building_submaterial' => true,
        'unit' => true,
        'financialyearwise_material_cost_subdetails' => true,
    ];
}
