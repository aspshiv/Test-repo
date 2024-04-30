<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectFundDetail Entity
 *
 * @property int $id
 * @property int $project_work_id
 * @property int $project_work_subdetail_id
 * @property \Cake\I18n\FrozenDate $request_date
 * @property string $request_amount
 * @property int|null $status
 * @property int $is_amount_received
 * @property string|null $received_amount
 * @property \Cake\I18n\FrozenDate|null $received_date
 * @property int|null $is_active
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenDate|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenDate|null $modified_date
 *
 * @property \App\Model\Entity\ProjectWork $project_work
 * @property \App\Model\Entity\ProjectWorkSubdetail $project_work_subdetail
 */
class ProjectFundDetail extends Entity
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
        'request_date' => true,
        'request_amount' => true,
        'status' => true,
        'is_amount_received' => true,
        'received_amount' => true,
        'received_date' => true,
        'is_active' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'project_work' => true,
        'project_work_subdetail' => true,
    ];
}
