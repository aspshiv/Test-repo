<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectMinuteSubdetail Entity
 *
 * @property int $id
 * @property int $project_minute_detail_id
 * @property string|null $minutes_points
 * @property string|null $action_taken
 * @property \Cake\I18n\FrozenDate|null $action_taken_date
 * @property int|null $is_active
 * @property \Cake\I18n\FrozenDate|null $created_date
 * @property int|null $created_by
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenDate|null $modified_date
 *
 * @property \App\Model\Entity\ProjectMinuteDetail $project_minute_detail
 */
class ProjectMinuteSubdetail extends Entity
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
        'project_minute_detail_id' => true,
        'minutes_points' => true,
        'action_taken' => true,
        'action_taken_date' => true,
        'is_active' => true,
        'created_date' => true,
        'created_by' => true,
        'modified_by' => true,
        'modified_date' => true,
        'project_minute_detail' => true,
    ];
}
