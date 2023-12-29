<div id='content-top'>
    <h2><?=lang('web_list_of', array(':name' => 'Exterior_equipments'))?></h2>
   
    <a href='/admin/exterior_equipments/create/<?=$page?>' class='bcreate'><?=lang('web_create_t', array(':name' => 'exterior_equipment'))?></a>
  
    <span class='clearFix'>&nbsp;</span>
</div>

<?php if ($exterior_equipments): ?>

<div class='clear'></div>

	<table class='ftable' cellpadding='5' cellspacing='5'>

		<thead>
			<th>Name</th>
			<th colspan='2'><?=lang('web_options')?></th>
		</thead>

		<tbody>
			<?php foreach ($exterior_equipments as $exterior_equipment): ?>
				
				<tr>
					<td><?=$exterior_equipment->name;?></td>
					<td width='60'><a class='ledit' href='/admin/exterior_equipments/edit/<?=$exterior_equipment->id?>/<?=$page?>'><?=lang('web_edit')?></a></td>
					<td width='60'><a class='ldelete' onClick="return confirm('<?=lang('web_confirm_delete')?>')" href='/admin/exterior_equipments/delete/<?=$exterior_equipment->id?>/<?=$page?>'><?=lang('web_delete')?></a></td>
				</tr>
				
			<?php endforeach ?>
		</tbody>

	</table>

	<?php echo $links; ?>

<?php else: ?>

	<p class='text'><?=lang('web_no_elements');?></p>

<?php endif ?>