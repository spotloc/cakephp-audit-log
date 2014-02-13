<?php $this->extend('/Layouts/Partials/admin_view'); ?>
<?php $this->start('main'); ?>
<div class="box span9">
	<div class="box-header">
		<h2><?= __('Deal');?></h2>
	</div>
	<div class="box-content">
		<div class="row-fluid">
			<div class="span6">
				<div class="page-header">
					<h1><?= __('Event type'); ?></h1>
				</div>
				<p><?= h($item['Audit']['event']); ?></p>
			</div>
			<div class="span6">
				<div class="page-header">
					<h1><?= __('Model'); ?></h1>
				</div>
				<p><?= h($item['Audit']['model']); ?></p>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6">
				<div class="page-header">
					<h1><?= __('Model id'); ?></h1>
				</div>
				<p><?= h($item['Audit']['entity_id']); ?></p>
			</div>
			<div class="span6">
				<div class="page-header">
					<h1><?= __('Description'); ?></h1>
				</div>
				<p><?= h($item['Audit']['description']); ?></p>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6">
				<div class="page-header">
					<h1><?= __('Source'); ?></h1>
				</div>
				<p><?= h($item['Audit']['source_id']); ?></p>
			</div>
		</div>
	</div>
</div>
<div class="box span3">
	<div class="box-header well">
		<h2><i class="halflings-icon list"></i><span class="break"></span><?= __('In Time'); ?></h2>
	</div>
	<div class="box-content">
		<div class="row-fluid">
			<div class="span4"><strong><?= __('Created'); ?> </strong></div>
			<div class="span8"><?= $this->Time->format($item['Audit']['created'], '%c', '-'); ?></div>
		</div>
	</div>
</div>

<div class="box span3">
	<div class="box-header well">
		<h2><i class="halflings-icon list"></i><span class="break"></span><?= __('In Numbers'); ?></h2>
	</div>
	<div class="box-content">
		<div class="row-fluid">
			<div class="span6"><strong><?= __('Id'); ?></strong></div>
			<div class="span6"><?= $item['Audit']['id']; ?></div>
		</div>
		<div class="row-fluid">
			<div class="span6"><strong><?= __('Deltas'); ?> </strong></div>
			<div class="span6"><?= $this->Number->format($item['Audit']['delta_count']); ?></div>
		</div>
	</div>
</div>
<?php $this->end(); ?>

<?php $this->start('associated'); ?>
	<?php if (!empty($item['AuditDelta'])):?>
	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header well">
				<h2><i class="halflings-icon list"></i><span class="break"></span><?= __('Categorize Logs'); ?></h2>
			</div>
			<div class="box-content">
				<table class="table table-conpact">
				<thead>
					<tr>
						<th><?= __('Field'); ?></th>
						<th><?= __('Old value'); ?></th>
						<th><?= __('New value') ?></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($item['AuditDelta'] as $it) : ?>
					<tr>
						<td><?= $it['property_name'];?></td>
						<td><?= $this->Text->truncate($it['old_value'], 50) ?: 'N/A'; ?></td>
						<td><?= $this->Text->truncate($it['new_value'], 50) ?: 'N/A'; ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php endif; ?>
<?php $this->end(); ?>
