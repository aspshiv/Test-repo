<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectMonitoringSubDetail Entity
 *
 * @property int $id
 * @property int $work_stage_id
 * @property string $file_upload
 * @property float $amount
 * @property int $is_active
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_date
 * @property int $modified_by
 * @property \Cake\I18n\FrozenTime $modified_date
 *
 * @property \App\Model\Entity\WorkStage $work_stage
 */
class ProjectMonitoringSubDetail extends Entity
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
        'id' => true,
        'work_stage_id' => true,
        'file_upload' => true,
        'amount' => true,
        'is_active' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'work_stage' => true,
    ];
}
