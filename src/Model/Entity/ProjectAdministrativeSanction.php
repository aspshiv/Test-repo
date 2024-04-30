<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectAdministrativeSanction Entity
 *
 * @property int $id
 * @property int $project_work_id
 * @property string $go_no
 * @property \Cake\I18n\FrozenTime $go_date
 * @property string $go_file_upload
 * @property float $sanctioned_amount
 * @property int|null $supervision_charge_id
 * @property int|null $fund_status_id
 * @property bool $is_active
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\ProjectWork $project_work
 * @property \App\Model\Entity\FundSource $fund_source
 * @property \App\Model\Entity\SupervisionCharge $supervision_charge
 */
class ProjectAdministrativeSanction extends Entity
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
        'go_no' => true,
        'go_date' => true,
        'go_file_upload' => true,
        'sanctioned_amount' => true,
        'supervision_charge_id' => true,
        'fund_status_id' => true,
        'is_active' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'project_work' => true,
        'fund_source' => true,
        'supervision_charge' => true,
    ];
}
