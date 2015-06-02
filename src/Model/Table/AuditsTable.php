<?php
namespace AuditLog\Model\Table;

use AuditLog\Model\Entity\Audit;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Audits Model
 */
class AuditsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('audits');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');

        $this->hasMany('AuditDeltas', [
            'foreignKey' => 'audit_id',
            'className' => 'AuditLog.AuditDeltas'
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
            ->requirePresence('event', 'create')
            ->notEmpty('event');

        $validator
            ->requirePresence('model', 'create')
            ->notEmpty('model');

        $validator
            ->allowEmpty('json_object');

        $validator
            ->allowEmpty('description');

        $validator
            ->add('delta_count', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('delta_count');

        $validator
            ->allowEmpty('source_ip');

        $validator
            ->allowEmpty('source_url');

        return $validator;
    }
}
