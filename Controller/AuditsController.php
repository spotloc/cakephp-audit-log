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

	public function admin_index() {
		$this->Crud->on('beforePaginate', function($event) {
			if ($model = $this->request->query('model')) {
				$this->Audit->bindModel(['hasOne' => [$model => ['foreignKey' => 'id']]]);

				$displayField = $this->Audit->{$model}->displayField;

				$this->Paginator->settings['contain'] = $model;
				$this->Paginator->settings['fields'] = [
					'Audit.id',
					'Audit.event',
					'Audit.model',
					'Audit.entity_id',
					'Audit.description',
					'Audit.source_id',
					'Audit.created',
					'Audit.delta_count',
					$model . '.' . $displayField
				];
				$this->set(compact('model', 'displayField'));
			}
		});

		return $this->Crud->execute();
	}

	public function admin_view($id) {
		$this->Crud->on('beforeFind', function($event) {
			$event->subject->query['contain'][] = 'AuditDelta';
		});

		return $this->Crud->execute();
	}

}
