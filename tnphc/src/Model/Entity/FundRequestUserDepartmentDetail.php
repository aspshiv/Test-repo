<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FundRequestUserDepartmentDetail Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate|null $request_date
 * @property float|null $request_amount
 * @property int|null $is_fund_received
 * @property \Cake\I18n\FrozenDate|null $received_date
 * @property float|null $received_amount
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 */
class FundRequestUserDepartmentDetail extends Entity
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
        'request_date' => true,
        'request_amount' => true,
        'is_fund_received' => true,
        'received_date' => true,
        'received_amount' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
    ];
}
