<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OpeningBalanceDetail Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate|null $balance_date
 * @property string $opening_bal_amount
 * @property int $is_active
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenDate|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenDate|null $modified_date
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
        'balance_date' => true,
        'opening_bal_amount' => true,
        'is_active' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
    ];
}
