<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WorkStage Entity
 *
 * @property int $id
 * @property string $name
 * @property bool $is_active
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_date
 * @property int $modified_on
 * @property \Cake\I18n\FrozenTime $modified_date
 *
 * @property \App\Model\Entity\ProjectMonitoringDetail[] $project_monitoring_details
 * @property \App\Model\Entity\ProjectMonitoringSubDetail[] $project_monitoring_sub_details
 */
class WorkStage extends Entity
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
        'name' => true,
        'is_active' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_on' => true,
        'modified_date' => true,
        'project_monitoring_details' => true,
        'project_monitoring_sub_details' => true,
    ];
}
