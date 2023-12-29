<div id='content-top'>
    <h2><?=lang('web_list_of', array(':name' => 'Floor Plans'))?></h2>
   
    <a href='/admin/floor_plans/create/<?=$page?>' class='bcreate'><?=lang('web_create_t', array(':name' => 'Floor Plan'))?></a>
  
    <span class='clearFix'>&nbsp;</span>
</div>

<?php if ($floor_plans): ?>

<div class='clear'></div>

	<table class='ftable' cellpadding='5' cellspacing='5'>

		<thead>
			<th>Name</th>
			<th>Model</th>
			<th>Year</th>
			<th>Floor Plan</th>
			<th colspan='2'><?=lang('web_options')?></th>
		</thead>

		<tbody>
			<?php foreach ($floor_plans as $floor_plan): ?>
				
				<tr>
					<td><?=$floor_plan->name;?></td>
					<td><?=$floor_plan->model;?></td>
					<td><?=$floor_plan->year;?></td>
					<td><a href='/public/uploads/floor_plans/files/<?=$floor_plan->floor_plan?>' />Download file (floor_plan)</a></td>
					<td width='60'><a class='ledit' href='/admin/floor_plans/edit/<?=$floor_plan->id?>/<?=$page?>'><?=lang('web_edit')?></a></td>
					<td width='60'><a class='ldelete' onClick="return confirm('<?=lang('web_confirm_delete')?>')" href='/admin/floor_plans/delete/<?=$floor_plan->id?>/<?=$page?>'><?=lang('web_delete')?></a></td>
				</tr>
				
			<?php endforeach ?>
		</tbody>

	</table>

	<?php echo $links; ?>

<?php else: ?>

	<p class='text'><?=lang('web_no_elements');?></p>

<?php endif ?>