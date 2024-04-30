<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectwiseDetailedEstimate Entity
 *
 * @property int $id
 * @property int|null $project_work_id
 * @property int|null $material_id
 * @property float|null $quantity
 * @property int|null $unit_id
 * @property float|null $approved_estimate
 * @property float|null $total_cost
 * @property \Cake\I18n\FrozenDate|null $submit_date
 * @property int|null $is_active
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\ProjectWork $project_work
 * @property \App\Model\Entity\Material $material
 * @property \App\Model\Entity\Unit $unit
 */
class ProjectwiseDetailedEstimate extends Entity
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
        'project_work_id' => true,
        'material_id' => true,
        'quantity' => true,
        'unit_id' => true,
        'approved_estimate' => true,
        'total_cost' => true,
        'submit_date' => true,
        'is_active' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'project_work' => true,
        'material' => true,
        'unit' => true,
    ];
}
