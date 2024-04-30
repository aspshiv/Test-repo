<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ContractorDetail Entity
 *
 * @property int $id
 * @property int $project_work_id
 * @property int $project_work_subdetail_id
 * @property int|null $contractor_id
 * @property string $contractor_name
 * @property string $contractor_mobile_no
 * @property string $agreement_no
 * @property \Cake\I18n\FrozenDate|null $agreement_fromdate
 * @property \Cake\I18n\FrozenDate $agreement_todate
 * @property \Cake\I18n\FrozenDate|null $agreement_date
 * @property string|null $agreement_amount
 * @property string|null $work_order_refno
 * @property string|null $work_order_copy
 * @property string $perc_deduction
 * @property string|null $agreement_copy
 * @property int|null $is_active
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenDate|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenDate|null $modified_date
 *
 * @property \App\Model\Entity\ProjectWork $project_work
 * @property \App\Model\Entity\ProjectWorkSubdetail $project_work_subdetail
 * @property \App\Model\Entity\ProjectTenderDetail[] $project_tender_details
 */
class ContractorDetail extends Entity
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
        'contractor_id' => true,
        'contractor_name' => true,
        'contractor_mobile_no' => true,
        'agreement_no' => true,
        'agreement_fromdate' => true,
        'agreement_todate' => true,
        'agreement_date' => true,
        'agreement_amount' => true,
        'work_order_refno' => true,
        'work_order_copy' => true,
        'perc_deduction' => true,
        'agreement_copy' => true,
        'is_active' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'project_work' => true,
        'project_work_subdetail' => true,
        'project_tender_details' => true,
    ];
}
