<div id='content-top'>
    <h2><?=lang('web_list_of', array(':name' => 'Cockpit_options'))?></h2>
   
    <a href='/admin/cockpit_options/create/<?=$page?>' class='bcreate'><?=lang('web_create_t', array(':name' => 'cockpit_option'))?></a>
  
    <span class='clearFix'>&nbsp;</span>
</div>

<?php if ($cockpit_options): ?>

<div class='clear'></div>

	<table class='ftable' cellpadding='5' cellspacing='5'>

		<thead>
			<th>Name</th>
			<th colspan='2'><?=lang('web_options')?></th>
		</thead>

		<tbody>
			<?php foreach ($cockpit_options as $cockpit_option): ?>
				
				<tr>
					<td><?=$cockpit_option->name;?></td>
					<td width='60'><a class='ledit' href='/admin/cockpit_options/edit/<?=$cockpit_option->id?>/<?=$page?>'><?=lang('web_edit')?></a></td>
					<td width='60'><a class='ldelete' onClick="return confirm('<?=lang('web_confirm_delete')?>')" href='/admin/cockpit_options/delete/<?=$cockpit_option->id?>/<?=$page?>'><?=lang('web_delete')?></a></td>
				</tr>
				
			<?php endforeach ?>
		</tbody>

	</table>

	<?php echo $links; ?>

<?php else: ?>

	<p class='text'><?=lang('web_no_elements');?></p>

<?php endif ?>