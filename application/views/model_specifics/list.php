<div id='content-top'>
    <h2><?=lang('web_list_of', array(':name' => 'Model_specifics'))?></h2>
   
    <a href='/admin/model_specifics/create/<?=$page?>' class='bcreate'><?=lang('web_create_t', array(':name' => 'Model Specific'))?></a>
  
    <span class='clearFix'>&nbsp;</span>
</div>

<?php if ($model_specifics): ?>

<div class='clear'></div>

	<table class='ftable' cellpadding='5' cellspacing='5'>

		<thead>
			<th>Year</th>
			<th>Make</th>
			<th>Model</th>
			<th>Manufacture URL</th>
			<th>Manufacture List</th>
			<th colspan='2'><?=lang('web_options')?></th>
		</thead>

		<tbody>
			<?php foreach ($model_specifics as $model_specific): ?>
				
				<tr>
					<td><?=$model_specific->year;?></td>
					<td><?=$model_specific->make;?></td>
					<td><?=$model_specific->model;?></td>
					<td><?=$model_specific->manufacture_url;?></td>
					<td><?=$model_specific->manufacture_list;?></td>
					<td width='60'><a class='ledit' href='/admin/model_specifics/edit/<?=$model_specific->id?>/<?=$page?>'><?=lang('web_edit')?></a></td>
					<td width='60'><a class='ldelete' onClick="return confirm('<?=lang('web_confirm_delete')?>')" href='/admin/model_specifics/delete/<?=$model_specific->id?>/<?=$page?>'><?=lang('web_delete')?></a></td>
				</tr>
				
			<?php endforeach ?>
		</tbody>

	</table>

	<?php echo $links; ?>

<?php else: ?>

	<p class='text'><?=lang('web_no_elements');?></p>

<?php endif ?>