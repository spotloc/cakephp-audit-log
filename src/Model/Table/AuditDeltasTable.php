<?php
namespace AuditLog\Model\Table;

use AuditLog\Model\Entity\AuditDelta;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AuditDeltas Model
 */
class AuditDeltasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('audit_deltas');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Audits', [
            'foreignKey' => 'audit_id',
            'joinType' => 'INNER',
            'className' => 'AuditLog.Audits'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('property_name', 'create')
            ->notEmpty('property_name');

        $validator
            ->allowEmpty('old_value');

        $validator
            ->allowEmpty('new_value');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['audit_id'], 'Audits'));
        return $rules;
    }
}
