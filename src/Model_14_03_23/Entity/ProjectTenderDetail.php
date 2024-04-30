<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectTenderDetail Entity
 *
 * @property int $id
 * @property int $project_work_id
 * @property int $project_work_subdetail_id
 * @property int|null $tender_type_id
 * @property string|null $etenderID
 * @property int $contractor_detail_id
 * @property string $tender_no
 * @property \Cake\I18n\FrozenDate|null $tender_date
 * @property string $tender_copy
 * @property float|null $tender_amount
 * @property bool $is_active
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\ProjectWork $project_work
 * @property \App\Model\Entity\ProjectWorkSubdetail $project_work_subdetail
 * @property \App\Model\Entity\ContractorDetail[] $contractor_details
 */
class ProjectTenderDetail extends Entity
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
        'tender_type_id' => true,
        'etenderID' => true,
        'contractor_detail_id' => true,
        'tender_no' => true,
        'tender_date' => true,
        'tender_copy' => true,
        'tender_amount' => true,
        'is_active' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'project_work' => true,
        'project_work_subdetail' => true,
        'contractor_details' => true,
    ];
}
