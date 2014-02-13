<?php

App::uses('AuditAppController', 'AuditLog.Controller');

class AuditDeltasController extends AuditLogAppController {

	public $uses = ['AuditLog.AuditDelta'];

	public $presetVars = true;

	public function beforeFilter() {
		parent::beforeFilter();
		$this->AuditDelta->setupSearchPlugin();

		$this->Crud->on('beforeLookup', function($event) {
			if ($this->request->query('id_field') === 'property_name') {
				$this->Paginator->settings['group'] = 'property_name';
			}
		});

	}

}
