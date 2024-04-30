<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FinancialyearwiseMaterialCostDetail Entity
 *
 * @property int $id
 * @property int|null $financial_year_id
 * @property \Cake\I18n\FrozenDate $submit_date
 * @property int|null $is_active
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenDate|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenDate|null $modified_date
 *
 * @property \App\Model\Entity\FinancialYear $financial_year
 * @property \App\Model\Entity\FinancialyearwiseMaterialCostSubdetail[] $financialyearwise_material_cost_subdetails
 */
class FinancialyearwiseMaterialCostDetail extends Entity
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
        'financial_year_id' => true,
        'submit_date' => true,
        'is_active' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'financial_year' => true,
        'financialyearwise_material_cost_subdetails' => true,
    ];
}
