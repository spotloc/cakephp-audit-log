<?php

App::uses('Model', 'Model');

class AuditDelta extends Model {

	public $belongsTo = [
		'Audit' => [
			'className' => 'AuditLog.Audit'
		]
	];

}
