<div id='content-top'>
    <h2><?=lang('web_list_of', array(':name' => 'Furnitures'))?></h2>
   
    <a href='/admin/furnitures/create/<?=$page?>' class='bcreate'><?=lang('web_create_t', array(':name' => 'furniture'))?></a>
  
    <span class='clearFix'>&nbsp;</span>
</div>

<?php if ($furnitures): ?>

<div class='clear'></div>

	<table class='ftable' cellpadding='5' cellspacing='5'>

		<thead>
			<th>Name</th>
			<th colspan='2'><?=lang('web_options')?></th>
		</thead>

		<tbody>
			<?php foreach ($furnitures as $furniture): ?>
				
				<tr>
					<td><?=$furniture->name;?></td>
					<td width='60'><a class='ledit' href='/admin/furnitures/edit/<?=$furniture->id?>/<?=$page?>'><?=lang('web_edit')?></a></td>
					<td width='60'><a class='ldelete' onClick="return confirm('<?=lang('web_confirm_delete')?>')" href='/admin/furnitures/delete/<?=$furniture->id?>/<?=$page?>'><?=lang('web_delete')?></a></td>
				</tr>
				
			<?php endforeach ?>
		</tbody>

	</table>

	<?php echo $links; ?>

<?php else: ?>

	<p class='text'><?=lang('web_no_elements');?></p>

<?php endif ?>