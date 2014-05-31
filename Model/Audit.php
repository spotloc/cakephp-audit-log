<?php

App::uses('Model', 'Model');

class Audit extends Model {

	public $hasMany = [
		'AuditDelta' => [
			'className' => 'AuditLog.AuditDelta'
		]
	];

	public $actsAs = ['Containable'];

	public $recursive = -1;

	public function setupSearchPlugin() {
		$this->order = 'Audit.created DESC';

		$this->filterArgs = [
			'event' 		=> ['type' => 'value'],
			'model' 		=> ['type' => 'value'],
			'source_id' => ['type' => 'value'],
			'entity_id' => ['type' => 'value'],
		];

		$this->Behaviors->load('Search.Searchable');
	}

/**
 * Make sure not to include any join's in the COUNT(*) from paginator
 *
 * @param  array $conditions
 * @param  integer $recursive
 * @param  array $extra
 * @return integer
 */
	public function paginateCount($conditions, $recursive, $extra) {
		if (empty($extra['do_count'])) {
			return 10000;
		}

		return $this->find('count', compact('conditions'));
	}

}
