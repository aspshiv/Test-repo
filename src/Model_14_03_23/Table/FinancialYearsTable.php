<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FinancialYears Model
 *
 * @method \App\Model\Entity\FinancialYear newEmptyEntity()
 * @method \App\Model\Entity\FinancialYear newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\FinancialYear[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FinancialYear get($primaryKey, $options = [])
 * @method \App\Model\Entity\FinancialYear findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\FinancialYear patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FinancialYear[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\FinancialYear|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FinancialYear saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FinancialYear[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FinancialYear[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\FinancialYear[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FinancialYear[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FinancialYearsTable extends Table
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

        $this->setTable('financial_years');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    // public function validationDefault(Validator $validator): Validator
    // {
        // $validator
            // ->scalar('name')
            // ->maxLength('name', 255)
            // ->requirePresence('name', 'create')
            // ->notEmptyString('name')
            // ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        // $validator
            // ->boolean('is_active')
            // ->allowEmptyString('is_active');

        // $validator
            // ->integer('order_flag')
            // ->allowEmptyString('order_flag');

        // $validator
            // ->integer('created_by')
            // ->allowEmptyString('created_by');

        // $validator
            // ->dateTime('created_date')
            // ->allowEmptyDateTime('created_date');

        // $validator
            // ->integer('modified_by')
            // ->allowEmptyString('modified_by');

        // $validator
            // ->dateTime('modified_date')
            // ->allowEmptyDateTime('modified_date');

        // return $validator;
    // }

    // /**
     // * Returns a rules checker object that will be used for validating
     // * application integrity.
     // *
     // * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     // * @return \Cake\ORM\RulesChecker
     // */
    // public function buildRules(RulesChecker $rules): RulesChecker
    // {
        // $rules->add($rules->isUnique(['name']), ['errorField' => 'name']);

        // return $rules;
    // }
}
