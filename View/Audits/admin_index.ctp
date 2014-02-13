<?php $this->extend('/Layouts/Partials/admin_index'); ?>

<?php $this->start('title'); ?>
	<h2><i class="icon-align-justify"></i><span class="break"></span>Audits</h2>
<?php $this->end(); ?>

<?php $this->start('main'); ?>
	<table class="table table-striped bootstrap-datatable datatable">
		<thead>
		<tr>
			<th><?= $this->Paginator->sort('event');?></th>
			<th><?= $this->Paginator->sort('model');?></th>
			<th><?= $this->Paginator->sort('entity_id');?></th>
			<th><?= $this->Paginator->sort('description');?></th>
			<th><?= $this->Paginator->sort('source_id');?></th>
			<th><?= $this->Paginator->sort('delta_count');?></th>
			<th><?= $this->Paginator->sort('created');?></th>
			<th class="actions"><?= __('Actions');?></th>
		</tr>
		</thead>
		<tbody>
	<?php foreach ($items as $item): ?>
		<tr>
			<td class='center'><?= h($item['Audit']['event']); ?>&nbsp;</td>
			<td class='center'><?= $this->Html->link($item['Audit']['model'], ['action' => 'index', '?' => ['model' => $item['Audit']['model']]]); ?></td>
			<td class='center'><?= $this->Html->link($item['Audit']['entity_id'], ['action' => 'index', '?' => ['model' => $item['Audit']['model'], 'entity_id' => $item['Audit']['entity_id']]]); ?></td>
			<td class='center'><?= h($item['Audit']['description']); ?>&nbsp;</td>
			<td class='center'><?= $this->Html->link($item['Audit']['source_id'], ['action' => 'index', '?' => ['source_id' => $item['Audit']['source_id']]]); ?>&nbsp;</td>
			<td class='center'><?= h($item['Audit']['delta_count']); ?>&nbsp;</td>
			<td class="center"><span title="<?= h($item['Audit']['created']); ?>"><?= str_replace('on', '', $this->Time->timeAgoInWords($item['Audit']['created'])); ?></span></td>
			<td class="actions center">
				<?= $this->Html->link('<i class="halflings-icon zoom-in halflings-icon"></i>', ['action' => 'view', $item['Audit']['id']], ['class' => 'btn btn-success', 'escape' => false]); ?>
			</td>
		</tr>
	<?php endforeach; ?>
		</tbody>
	</table>
	<div class="row-fluid">
		<div class="span12">
			<?= $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:start} to {:end} out of {:count}')));?>
		</div>
	</div>
	<?php echo $this->Paginator->pagination(); ?>
<?php $this->end(); ?>
