<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectTenderStatusDetail Entity
 *
 * @property int $id
 * @property int|null $project_work_id
 * @property int|null $project_work_subdetail_id
 * @property int|null $tender_status_id
 * @property string|null $remarks
 * @property \Cake\I18n\FrozenDate|null $submit_date
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $created_date
 *
 * @property \App\Model\Entity\TenderStatus $tender_status
 */
class ProjectTenderStatusDetail extends Entity
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
        'tender_status_id' => true,
        'remarks' => true,
        'submit_date' => true,
        'created_by' => true,
        'created_date' => true,
        'tender_status' => true,
    ];
}
