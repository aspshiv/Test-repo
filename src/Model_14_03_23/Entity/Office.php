<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Office Entity
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\OpeningBalanceDetail[] $opening_balance_details
 * @property \App\Model\Entity\OpeningBalanceLog[] $opening_balance_logs
 */
class Office extends Entity
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
        'name' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'opening_balance_details' => true,
        'opening_balance_logs' => true,
    ];
}
