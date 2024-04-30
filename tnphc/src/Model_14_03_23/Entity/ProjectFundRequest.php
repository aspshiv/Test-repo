<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectFundRequest Entity
 *
 * @property int $id
 * @property int|null $fund_status_id
 * @property int|null $user_id
 * @property \Cake\I18n\FrozenDate|null $request_date
 * @property float|null $total_request_amount
 * @property int|null $is_approved
 * @property \Cake\I18n\FrozenDate|null $approval_date
 * @property string|null $transaction_ref_no
 * @property \Cake\I18n\FrozenDate|null $transaction_date
 * @property \Cake\I18n\FrozenDate|null $amount_received_date
 * @property float|null $total_transaction_amount
 * @property int|null $received_flag
 * @property string|null $remarks
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\FundStatus $fund_status
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ProjectFundRequestDetail[] $project_fund_request_details
 */
class ProjectFundRequest extends Entity
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
        'fund_status_id' => true,
        'user_id' => true,
        'request_date' => true,
        'total_request_amount' => true,
        'is_approved' => true,
        'approval_date' => true,
        'transaction_ref_no' => true,
        'transaction_date' => true,
        'amount_received_date' => true,
        'total_transaction_amount' => true,
        'received_flag' => true,
        'remarks' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'fund_status' => true,
        'user' => true,
        'project_fund_request_details' => true,
    ];
}
