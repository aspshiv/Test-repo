<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FinancialyearwiseMaterialCostSubdetail Entity
 *
 * @property int $id
 * @property int|null $financialyearwise_material_cost_detail_id
 * @property int $building_material_detail_id
 * @property float|null $rate
 * @property float|null $amount
 * @property int|null $is_active
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenDate|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenDate|null $modified_date
 *
 * @property \App\Model\Entity\FinancialyearwiseMaterialCostDetail $financialyearwise_material_cost_detail
 * @property \App\Model\Entity\BuildingMaterialDetail $building_material_detail
 */
class FinancialyearwiseMaterialCostSubdetail extends Entity
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
        'financialyearwise_material_cost_detail_id' => true,
        'building_material_detail_id' => true,
        'rate' => true,
        'amount' => true,
        'is_active' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'financialyearwise_material_cost_detail' => true,
        'building_material_detail' => true,
    ];
}
