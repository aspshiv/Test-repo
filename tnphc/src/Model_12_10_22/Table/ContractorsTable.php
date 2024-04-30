<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contractors Model
 *
 * @property \App\Model\Table\ContractorClassesTable&\Cake\ORM\Association\BelongsTo $ContractorClasses
 * @property \App\Model\Table\ContractorDetailsTable&\Cake\ORM\Association\HasMany $ContractorDetails
 *
 * @method \App\Model\Entity\Contractor newEmptyEntity()
 * @method \App\Model\Entity\Contractor newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Contractor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contractor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Contractor findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Contractor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Contractor[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contractor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contractor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contractor[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Contractor[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Contractor[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Contractor[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ContractorsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('contractors');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('ContractorClasses', [
            'foreignKey' => 'contractor_class_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('ContractorDetails', [
            'foreignKey' => 'contractor_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('contractor_class_id')
            ->requirePresence('contractor_class_id', 'create')
            ->notEmptyString('contractor_class_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('mobile_no')
            ->maxLength('mobile_no', 255)
            ->allowEmptyString('mobile_no');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('address')
            ->allowEmptyString('address');

        $validator
            ->scalar('gst_no')
            ->maxLength('gst_no', 255)
            ->allowEmptyString('gst_no');

        $validator
            ->scalar('reg_no')
            ->maxLength('reg_no', 255)
            ->allowEmptyString('reg_no');

        $validator
            ->allowEmptyString('is_active');

        $validator
            ->integer('created_by')
            ->allowEmptyString('created_by');

        $validator
            ->dateTime('created_date')
            ->allowEmptyDateTime('created_date');

        $validator
            ->integer('modified_by')
            ->allowEmptyString('modified_by');

        $validator
            ->dateTime('modified_date')
            ->allowEmptyDateTime('modified_date');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['id']), ['errorField' => 'id']);
        $rules->add($rules->existsIn('contractor_class_id', 'ContractorClasses'), ['errorField' => 'contractor_class_id']);

        return $rules;
    }
}
