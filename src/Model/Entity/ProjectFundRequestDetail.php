<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectFundRequestDetail Entity
 *
 * @property int $id
 * @property int|null $project_fund_request_id
 * @property int|null $project_work_id
 * @property int|null $project_work_subdetail_id
 * @property int|null $fund_status_id
 * @property float|null $request_amount
 * @property float|null $balance_amount
 * @property float|null $transaction_amount
 * @property float|null $final_balance
 * @property int|null $received_flag
 * @property int|null $user_id
 * @property string|null $remarks
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\ProjectWork $project_work
 * @property \App\Model\Entity\ProjectWorkSubdetail $project_work_subdetail
 * @property \App\Model\Entity\FundStatus $fund_status
 * @property \App\Model\Entity\ProjectFundRequestStage[] $project_fund_request_stages
 */
class ProjectFundRequestDetail extends Entity
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
        'project_fund_request_id' => true,
        'project_work_id' => true,
        'project_work_subdetail_id' => true,
        'fund_status_id' => true,
        'request_amount' => true,
        'balance_amount' => true,
        'transaction_amount' => true,
        'final_balance' => true,
        'received_flag' => true,
        'user_id' => true,
        'remarks' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'project_work' => true,
        'project_work_subdetail' => true,
        'fund_status' => true,
        'project_fund_request_stages' => true,
    ];
}
