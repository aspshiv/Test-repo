<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectFundRequestStage Entity
 *
 * @property int $id
 * @property int|null $project_fund_request_detail_id
 * @property int|null $fund_status_id
 * @property \Cake\I18n\FrozenDate|null $forward_date
 * @property string|null $remarks
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\ProjectFundRequestDetail $project_fund_request_detail
 * @property \App\Model\Entity\FundStatus $fund_status
 */
class ProjectFundRequestStage extends Entity
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
        'project_fund_request_detail_id' => true,
        'fund_status_id' => true,
        'forward_date' => true,
        'remarks' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'project_fund_request_detail' => true,
        'fund_status' => true,
    ];
}
