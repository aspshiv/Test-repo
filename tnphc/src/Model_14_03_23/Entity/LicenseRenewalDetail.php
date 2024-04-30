<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LicenseRenewalDetail Entity
 *
 * @property int $id
 * @property int $contractor_id
 * @property \Cake\I18n\FrozenDate|null $license_renewal_date
 * @property \Cake\I18n\FrozenDate $license_validity_upto
 * @property string|null $license_file_upload
 * @property bool|null $is_active
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\Contractor $contractor
 */
class LicenseRenewalDetail extends Entity
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
        'contractor_id' => true,
        'license_renewal_date' => true,
        'license_validity_upto' => true,
        'license_file_upload' => true,
        'is_active' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'contractor' => true,
    ];
}
