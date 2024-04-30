<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TechnicalSanction Entity
 *
 * @property int $id
 * @property int|null $project_work_id
 * @property int|null $project_work_subdetail_id
 * @property \Cake\I18n\FrozenDate|null $sanctioned_date
 * @property float|null $amount
 * @property string|null $description
 * @property string|null $detailed_estimate_upload
 * @property bool $is_active
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_date
 * @property int $modified_by
 * @property \Cake\I18n\FrozenTime $modified_date
 *
 * @property \App\Model\Entity\ProjectWork $project_work
 */
class TechnicalSanction extends Entity
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
        'sanctioned_date' => true,
        'amount' => true,
        'description' => true,
        'detailed_estimate_upload' => true,
        'is_active' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'project_work' => true,
    ];
}
