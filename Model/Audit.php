<?php

App::uses('Model', 'Model');

class Audit extends Model {

	public $hasMany = [
		'AuditDelta' => [
			'className' => 'AuditLog.AuditDelta'
		]
	];

}
