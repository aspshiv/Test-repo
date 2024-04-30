<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectWorkSubdetail Entity
 *
 * @property int $id
 * @property int|null $project_work_id
 * @property int|null $circle_id
 * @property int|null $division_id
 * @property int|null $district_id
 * @property string|null $work_code
 * @property string|null $work_name
 * @property float|null $rough_cost
 * @property float|null $sanctioned_amount
 * @property int|null $detailed_estimate_flag
 * @property int|null $detailed_estimate_current_role
 * @property int|null $detailed_estimate_approval
 * @property int|null $technical_sanction_flag
 * @property int|null $approval_role
 * @property int|null $is_approved
 * @property int|null $tender_detail_flag
 * @property int|null $planning_permission_flag
 * @property int|null $site_handover_flag
 * @property \Cake\I18n\FrozenDate|null $site_handover_date
 * @property string|null $site_handover_remarks
 * @property int|null $fund_request_flag
 * @property int|null $fund_approval_user_id
 * @property \Cake\I18n\FrozenDate|null $submit_date
 * @property int|null $project_work_status_id
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\ProjectWork $project_work
 * @property \App\Model\Entity\Division $division
 * @property \App\Model\Entity\Circle $circle
 * @property \App\Model\Entity\District $district
 */
class ProjectWorkSubdetail extends Entity
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
        'circle_id' => true,
        'division_id' => true,
        'district_id' => true,
        'work_code' => true,
        'work_name' => true,
        'rough_cost' => true,
        'sanctioned_amount' => true,
        'detailed_estimate_flag' => true,
        'detailed_estimate_current_role' => true,
        'detailed_estimate_approval' => true,
        'technical_sanction_flag' => true,
        'approval_role' => true,
        'is_approved' => true,
        'tender_detail_flag' => true,
        'planning_permission_flag' => true,
        'site_handover_flag' => true,
        'site_handover_date' => true,
        'site_handover_remarks' => true,
        'fund_request_flag' => true,
        'fund_approval_user_id' => true,
        'submit_date' => true,
        'project_work_status_id' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'project_work' => true,
        'division' => true,
        'circle' => true,
        'district' => true,
    ];
}
