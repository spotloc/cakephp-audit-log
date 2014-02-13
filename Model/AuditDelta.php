<?php

App::uses('Model', 'Model');

class AuditDelta extends Model {

	public $belongsTo = [
		'Audit' => [
			'className' => 'AuditLog.Audit',
			'counterCache' => 'delta_count'
		]
	];


	public function setupSearchPlugin() {
		$this->order = 'AuditDelta.property_name';

		$this->filterArgs = [
			'source_id' => [
				'type' 	=> 'value',
				'field' => 'Audit.source_id',
				'model' => 'Audit',
				'fields' => [
					'id' => 'source_id',
					'label' => 'source_id',
					'value' => 'source_id'
				]
			],
			'audit_id' 			=> ['type' => 'value'],
			'property_name' => ['type' => 'value'],
			'old_value' 		=> ['type' => 'value'],
			'new_value' 		=> ['type' => 'value'],
		];

		$this->Behaviors->load('Search.Searchable');
	}

}
