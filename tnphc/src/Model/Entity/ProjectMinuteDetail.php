<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectMinuteDetail Entity
 *
 * @property int $id
 * @property int|null $project_work_id
 * @property int|null $project_work_subdetail_id
 * @property \Cake\I18n\FrozenDate|null $meeting_date
 * @property int|null $is_active
 * @property \Cake\I18n\FrozenDate|null $created_date
 * @property int|null $created_by
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenDate|null $modified_date
 *
 * @property \App\Model\Entity\ProjectWork $project_work
 * @property \App\Model\Entity\ProjectWorkSubdetail $project_work_subdetail
 * @property \App\Model\Entity\ProjectMinuteSubdetail[] $project_minute_subdetails
 */
class ProjectMinuteDetail extends Entity
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
        'meeting_date' => true,
        'is_active' => true,
        'created_date' => true,
        'created_by' => true,
        'modified_by' => true,
        'modified_date' => true,
        'project_work' => true,
        'project_work_subdetail' => true,
        'project_minute_subdetails' => true,
    ];
}
