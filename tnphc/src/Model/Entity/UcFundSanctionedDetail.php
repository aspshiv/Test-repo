<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UcFundSanctionedDetail Entity
 *
 * @property int $id
 * @property int|null $utilization_certificate_id
 * @property int|null $project_work_id
 * @property int|null $project_work_subdetail_id
 * @property string|null $go_no
 * @property \Cake\I18n\FrozenDate|null $sanctioned_date
 * @property float|null $amount
 * @property \Cake\I18n\FrozenDate|null $submit_date
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\UtilizationCertificate $utilization_certificate
 * @property \App\Model\Entity\ProjectWork $project_work
 * @property \App\Model\Entity\ProjectWorkSubdetail $project_work_subdetail
 */
class UcFundSanctionedDetail extends Entity
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
        'utilization_certificate_id' => true,
        'project_work_id' => true,
        'project_work_subdetail_id' => true,
        'go_no' => true,
        'sanctioned_date' => true,
        'amount' => true,
        'submit_date' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'utilization_certificate' => true,
        'project_work' => true,
        'project_work_subdetail' => true,
    ];
}
