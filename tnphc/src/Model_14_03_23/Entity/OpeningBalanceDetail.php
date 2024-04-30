<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OpeningBalanceDetail Entity
 *
 * @property int $id
 * @property int $office_id
 * @property int|null $division_id
 * @property float|null $opening_balance
 * @property \Cake\I18n\FrozenDate|null $balance_date
 * @property bool|null $is_active
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\Office $office
 * @property \App\Model\Entity\Division $division
 */
class OpeningBalanceDetail extends Entity
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
        'office_id' => true,
        'division_id' => true,
        'opening_balance' => true,
        'balance_date' => true,
        'is_active' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'office' => true,
        'division' => true,
    ];
}
