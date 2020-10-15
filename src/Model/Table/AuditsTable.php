<?php
namespace AuditLog\Model\Table;

use Cake\ORM\Table;

/**
 * Audits Model
 */
class AuditsTable extends Table
{
    public $filterArgs = [];

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) : void
    {
        $this->setTable('audits');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');

        $this->hasMany('AuditDeltas', [
            'foreignKey' => 'audit_id',
            'className' => 'AuditLog.AuditDeltas'
        ]);
        $this->setupSearchPlugin();
    }


    /**
     * Enable search plugin
     *
     * @return null
     */
    public function setupSearchPlugin()
    {
        $this->filterArgs = [
            'event' => [
                'type' => 'value'
            ],
            'model' => [
                'type' => 'value'
            ],
            'source_id' => [
                'type' => 'value'
            ],
            'entity_id' => [
                'type' => 'value'
            ],
        ];

    }
}
