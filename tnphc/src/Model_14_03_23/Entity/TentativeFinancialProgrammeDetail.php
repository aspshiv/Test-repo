<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TentativeFinancialProgrammeDetail Entity
 *
 * @property int $id
 * @property int|null $financial_year_id
 * @property int|null $division_id
 * @property float|null $apr
 * @property float|null $may
 * @property float|null $june
 * @property float|null $july
 * @property float|null $aug
 * @property float|null $sep
 * @property float|null $oct
 * @property float|null $nov
 * @property float|null $dece
 * @property float|null $jan
 * @property float|null $feb
 * @property float|null $mar
 * @property float|null $total_amount
 * @property int|null $is_active
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\FinancialYear $financial_year
 * @property \App\Model\Entity\Division $division
 */
class TentativeFinancialProgrammeDetail extends Entity
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
        'financial_year_id' => true,
        'division_id' => true,
        'apr' => true,
        'may' => true,
        'june' => true,
        'july' => true,
        'aug' => true,
        'sep' => true,
        'oct' => true,
        'nov' => true,
        'dece' => true,
        'jan' => true,
        'feb' => true,
        'mar' => true,
        'total_amount' => true,
        'is_active' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'financial_year' => true,
        'division' => true,
    ];
}
