<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contractor Entity
 *
 * @property int $id
 * @property int $contractor_class_id
 * @property string $name
 * @property string $mobile_no
 * @property string $email
 * @property string $address
 * @property string $gst_no
 * @property string $reg_no
 * @property \Cake\I18n\FrozenDate|null $register_date
 * @property \Cake\I18n\FrozenDate|null $validity_upto
 * @property string|null $certificate_upload
 * @property int|null $is_active
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $created_date
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\ContractorClass $contractor_class
 * @property \App\Model\Entity\ContractorDetail[] $contractor_details
 */
class Contractor extends Entity
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
        'contractor_class_id' => true,
        'name' => true,
        'mobile_no' => true,
        'email' => true,
        'address' => true,
        'gst_no' => true,
        'reg_no' => true,
        'register_date' => true,
        'validity_upto' => true,
        'certificate_upload' => true,
        'is_active' => true,
        'created_by' => true,
        'created_date' => true,
        'modified_by' => true,
        'modified_date' => true,
        'contractor_class' => true,
        'contractor_details' => true,
    ];
}
