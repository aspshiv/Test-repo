<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FundRequestUserDepartmentSubdetail Entity
 *
 * @property int $id
 * @property int|null $fund_request_user_department_detail_id
 * @property int|null $project_work_id
 * @property int|null $project_work_subdetail_id
 * @property float|null $request_amount
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\FundRequestUserDepartmentDetail $fund_request_user_department_detail
 * @property \App\Model\Entity\ProjectWork $project_work
 * @property \App\Model\Entity\ProjectWorkSubdetail $project_work_subdetail
 */
class FundRequestUserDepartmentSubdetail extends Entity
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
        'fund_request_user_department_detail_id' => true,
        'project_work_id' => true,
        'project_work_subdetail_id' => true,
        'request_amount' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'fund_request_user_department_detail' => true,
        'project_work' => true,
        'project_work_subdetail' => true,
    ];
}
