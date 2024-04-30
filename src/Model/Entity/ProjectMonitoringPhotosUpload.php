<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectMonitoringPhotosUpload Entity
 *
 * @property int $id
 * @property int $project_monitoring_detail_id
 * @property string $file_upload
 * @property int $is_active
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $created_date
 * @property int $modified_by
 * @property \Cake\I18n\FrozenTime $modified_date
 *
 * @property \App\Model\Entity\ProjectMonitoringDetail $project_monitoring_detail
 */
class ProjectMonitoringPhotosUpload extends Entity
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
        'project_monitoring_detail_id' => true,
        'file_upload' => true,
        'is_active' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'project_monitoring_detail' => true,
    ];
}
