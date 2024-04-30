<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property int $role_id
 * @property int|null $district_id
 * @property int|null $division_id
 * @property string $name
 * @property string|null $username
 * @property string|null $password
 * @property string|null $mobile_no
 * @property string|null $email
 * @property string|null $address
 * @property int|null $order_flag
 * @property bool|null $is_active
 * @property \Cake\I18n\FrozenTime|null $created_date
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $modified_date
 * @property int|null $modified_by
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\District $district
 */
class User extends Entity
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
        'role_id' => true,
        'district_id' => true,
        'division_id' => true,
        'name' => true,
        'username' => true,
        'password' => true,
        'mobile_no' => true,
        'email' => true,
        'address' => true,
        'order_flag' => true,
        'is_active' => true,
        'created_date' => true,
        'created_by' => true,
        'modified_date' => true,
        'modified_by' => true,
        'role' => true,
        'district' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];
}
