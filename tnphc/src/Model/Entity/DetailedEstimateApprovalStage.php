<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetailedEstimateApprovalStage Entity
 *
 * @property int $id
 * @property int|null $project_work_id
 * @property int|null $project_work_subdetail_id
 * @property int|null $user_id
 * @property int|null $current_role_id
 * @property string|null $current_status
 * @property int|null $approval_status_id
 * @property \Cake\I18n\FrozenDate|null $submit_date
 * @property string|null $remarks
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\ProjectWork $project_work
 * @property \App\Model\Entity\ProjectWorkSubdetail $project_work_subdetail
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\CurrentRole $current_role
 * @property \App\Model\Entity\ApprovalStatus $approval_status
 */
class DetailedEstimateApprovalStage extends Entity
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
        'project_work_subdetail_id' => true,
        'user_id' => true,
        'current_role_id' => true,
        'current_status' => true,
        'approval_status_id' => true,
        'submit_date' => true,
        'remarks' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'project_work' => true,
        'project_work_subdetail' => true,
        'user' => true,
        'current_role' => true,
        'approval_status' => true,
    ];
}
