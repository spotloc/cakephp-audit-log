<?php

App::uses('AuditAppController', 'AuditLog.Controller');

class AuditsController extends AuditLogAppController {

	public $uses = ['AuditLog.Audit'];

	public $presetVars = true;

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Audit->setupSearchPlugin();

		$this->Crud->on('beforeLookup', function($event) {
			$this->Paginator->settings['group'] = $this->request->query('id_field');
		});
	}

	public function admin_view($id) {
		$this->Crud->on('beforeFind', function($event) {
			$event->subject->query['contain'][] = 'AuditDelta';
		});

		return $this->Crud->execute();
	}

}
