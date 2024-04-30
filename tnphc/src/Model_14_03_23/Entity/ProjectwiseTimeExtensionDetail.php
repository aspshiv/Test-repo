<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectwiseTimeExtensionDetail Entity
 *
 * @property int $id
 * @property int $project_work_id
 * @property int $project_work_subdetail_id
 * @property \Cake\I18n\FrozenDate|null $extension_date_of_ee
 * @property string|null $delay_part_of_contractor
 * @property string|null $delay_due_to_department
 * @property string|null $delay_for_revision_plan
 * @property string|null $delay_due_to_rain
 * @property string|null $delay_due_to_shortage_sand
 * @property int|null $any_notice_issued_by_contractor
 * @property string|null $notice_file_upload
 * @property int|null $any_fine_imposed_for_delay
 * @property string|null $contractor_quality_of_work
 * @property string|null $remarks_of_ee
 * @property int $is_active
 * @property \Cake\I18n\FrozenTime|null $created_date
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 * @property int|null $modified_by
 *
 * @property \App\Model\Entity\ProjectWork $project_work
 * @property \App\Model\Entity\ProjectWorkSubdetail $project_work_subdetail
 */
class ProjectwiseTimeExtensionDetail extends Entity
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
        'extension_date_of_ee' => true,
        'delay_part_of_contractor' => true,
        'delay_due_to_department' => true,
        'delay_for_revision_plan' => true,
        'delay_due_to_rain' => true,
        'delay_due_to_shortage_sand' => true,
        'any_notice_issued_by_contractor' => true,
        'notice_file_upload' => true,
        'any_fine_imposed_for_delay' => true,
        'contractor_quality_of_work' => true,
        'remarks_of_ee' => true,
        'is_active' => true,
        'created_date' => true,
        'created_by' => true,
        'modified_date' => true,
        'modified_by' => true,
        'project_work' => true,
        'project_work_subdetail' => true,
    ];
}
