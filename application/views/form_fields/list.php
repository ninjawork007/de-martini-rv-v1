<div id='content-top'>
    <h2><?=lang('web_list_of', array(':name' => 'Form Fields'))?></h2>
   
    <a href='/admin/form_fields/create/<?=$page?>' class='bcreate'>Create Form Field</a>
  
    <span class='clearFix'>&nbsp;</span>
</div>

<?php if ($form_fields): ?>

<div class='clear'></div>

	<table class='ftable' cellpadding='5' cellspacing='5'>

		<thead>
			<th>Label</th>
			<th>Name</th>
			<th>Dropdown Options</th>
			<th colspan='2'><?=lang('web_options')?></th>
		</thead>

		<tbody>
			<?php foreach ($form_fields as $form_field): ?>
				
				<tr>
					<td><?=$form_field->label;?></td>
					<td><?=$form_field->name;?></td>
					<td><?=$form_field->dropdown_options;?></td>
					<td width='60'><a class='ledit' href='/admin/form_fields/edit/<?=$form_field->id?>/<?=$page?>/<?=$form_id?>'><?=lang('web_edit')?></a></td>
					<td width='60'><a class='ldelete' onClick="return confirm('<?=lang('web_confirm_delete')?>')" href='/admin/form_fields/delete/<?=$form_field->id?>/<?=$page?>/<?=$form_id?>'><?=lang('web_delete')?></a></td>
				</tr>
				
			<?php endforeach ?>
		</tbody>

	</table>

	<?php echo $links; ?>

<?php else: ?>

	<p class='text'><?=lang('web_no_elements');?></p>

<?php endif ?>