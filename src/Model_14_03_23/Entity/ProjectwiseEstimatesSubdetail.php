<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectwiseEstimatesSubdetail Entity
 *
 * @property int $id
 * @property int|null $projectwise_estimates_detail_id
 * @property string|null $description
 * @property string|null $number1
 * @property string|null $number2
 * @property string|null $length
 * @property string|null $breath
 * @property string|null $depth
 * @property string|null $quantity
 * @property int|null $is_active
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\ProjectwiseEstimatesDetail $projectwise_estimates_detail
 */
class ProjectwiseEstimatesSubdetail extends Entity
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
        'projectwise_estimates_detail_id' => true,
        'description' => true,
        'number1' => true,
        'number2' => true,
        'length' => true,
        'breath' => true,
        'depth' => true,
        'quantity' => true,
        'is_active' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'projectwise_estimates_detail' => true,
    ];
}
