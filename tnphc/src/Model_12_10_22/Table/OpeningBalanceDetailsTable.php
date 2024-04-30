<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OpeningBalanceDetails Model
 *
 * @method \App\Model\Entity\OpeningBalanceDetail newEmptyEntity()
 * @method \App\Model\Entity\OpeningBalanceDetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\OpeningBalanceDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OpeningBalanceDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\OpeningBalanceDetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\OpeningBalanceDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OpeningBalanceDetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OpeningBalanceDetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OpeningBalanceDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OpeningBalanceDetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OpeningBalanceDetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\OpeningBalanceDetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OpeningBalanceDetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class OpeningBalanceDetailsTable extends Table
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

        $this->setTable('opening_balance_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->date('balance_date')
            ->allowEmptyDate('balance_date');

        $validator
            ->scalar('opening_bal_amount')
            ->maxLength('opening_bal_amount', 255)
            ->requirePresence('opening_bal_amount', 'create')
            ->notEmptyString('opening_bal_amount');

        $validator
            ->notEmptyString('is_active');

        $validator
            ->integer('created_by')
            ->allowEmptyString('created_by');

        $validator
            ->date('created_date')
            ->allowEmptyDate('created_date');

        $validator
            ->integer('modified_by')
            ->allowEmptyString('modified_by');

        $validator
            ->date('modified_date')
            ->allowEmptyDate('modified_date');

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

        return $rules;
    }
}
