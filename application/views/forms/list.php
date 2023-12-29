<div id='content-top'>
    <h2><?=lang('web_list_of', array(':name' => 'Forms'))?></h2>
   
    <a href='/admin/forms/create/<?=$page?>' class='bcreate'><?=lang('web_create_t', array(':name' => 'Form'))?></a>
  
    <span class='clearFix'>&nbsp;</span>
</div>

<?php if ($forms): ?>

<div class='clear'></div>

	<table class='ftable' cellpadding='5' cellspacing='5'>

		<thead>
			<th>Name</th>
			<th>TO_emails</th>
			<th>CC_emails</th>
			<th>Description</th>
			<th colspan='2'><?=lang('web_options')?></th>
		</thead>

		<tbody>
			<?php foreach ($forms as $form): ?>
				
				<tr>
					<td><?=$form->name;?></td>
					<td><?=$form->to_emails;?></td>
					<td><?=$form->cc_emails;?></td>
					<td><?=$form->description;?></td>
					<td width='60'><a class='ledit' href='/admin/forms/edit/<?=$form->id?>/<?=$page?>'><?=lang('web_edit')?></a></td>
					<td width='60'><a class='ldelete' onClick="return confirm('<?=lang('web_confirm_delete')?>')" href='/admin/forms/delete/<?=$form->id?>/<?=$page?>'><?=lang('web_delete')?></a></td>
				</tr>
				
			<?php endforeach ?>
		</tbody>

	</table>

	<?php echo $links; ?>

<?php else: ?>

	<p class='text'><?=lang('web_no_elements');?></p>

<?php endif ?>