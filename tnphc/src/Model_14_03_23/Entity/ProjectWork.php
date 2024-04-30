<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectWork Entity
 *
 * @property int $id
 * @property int $department_id
 * @property int $financial_year_id
 * @property int $building_type_id
 * @property int $project_status_id
 * @property string|null $project_code
 * @property string $project_name
 * @property string|null $project_description
 * @property float $project_amount
 * @property string $file_upload
 * @property int $coastal_area
 * @property int|null $district_id
 * @property int|null $division_id
 * @property float|null $latitude
 * @property float|null $longitude
 * @property bool|null $is_active
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 * @property int|null $department_type
 *
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\FinancialYear $financial_year
 * @property \App\Model\Entity\BuildingType $building_type
 */
class ProjectWork extends Entity
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
        'department_id' => true,
        'financial_year_id' => true,
        'building_type_id' => true,
        'project_status_id' => true,
        'project_code' => true,
        'project_name' => true,
        'project_description' => true,
        'project_amount' => true,
        'file_upload' => true,
        'coastal_area' => true,
        'district_id' => true,
        'division_id' => true,
        'latitude' => true,
        'longitude' => true,
        'is_active' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'department_type' => true,
        'department' => true,
        'financial_year' => true,
        'building_type' => true,
    ];
}
