<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RepairworkDetail Entity
 *
 * @property int $id
 * @property string|null $work_name
 * @property int|null $department_id
 * @property int|null $financial_year_id
 * @property int|null $district_id
 * @property int|null $division_id
 * @property int|null $circle_id
 * @property string|null $place_of_work
 * @property float|null $estimated_cost
 * @property string|null $work_file_upload
 * @property int|null $departmentwise_work_type_id
 * @property int|null $is_active
 * @property \Cake\I18n\FrozenTime|null $created_date
 * @property int|null $created_by
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\FinancialYear $financial_year
 * @property \App\Model\Entity\District $district
 * @property \App\Model\Entity\Division $division
 * @property \App\Model\Entity\Circle $circle
 * @property \App\Model\Entity\DepartmentwiseWorkType $departmentwise_work_type
 */
class RepairworkDetail extends Entity
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
        'work_name' => true,
        'department_id' => true,
        'financial_year_id' => true,
        'district_id' => true,
        'division_id' => true,
        'circle_id' => true,
        'place_of_work' => true,
        'estimated_cost' => true,
        'work_file_upload' => true,
        'departmentwise_work_type_id' => true,
        'is_active' => true,
        'created_date' => true,
        'created_by' => true,
        'modified_by' => true,
        'modified_date' => true,
        'department' => true,
        'financial_year' => true,
        'district' => true,
        'division' => true,
        'circle' => true,
        'departmentwise_work_type' => true,
    ];
}
