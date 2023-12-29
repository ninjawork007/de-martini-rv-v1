<div id='content-top'>
    <h2><?=lang('web_list_of', array(':name' => 'Uploads'))?></h2>
   
    <a href='/admin/uploads/create/<?=$page?>' class='bcreate'><?=lang('web_create_t', array(':name' => 'upload'))?></a>
  
    <span class='clearFix'>&nbsp;</span>
</div>

<?php if ($uploads): ?>

<div class='clear'></div>

	<table class='ftable' cellpadding='5' cellspacing='5'>

		<thead>
			<th>Name</th>
			<th>Description</th>
			<th>File</th>
			<th colspan='2'><?=lang('web_options')?></th>
		</thead>

		<tbody>
			<?php foreach ($uploads as $upload): ?>
				
				<tr>
					<td><?=$upload->name;?></td>
					<td><?=$upload->description;?></td>
					<td><a href='/public/uploads/uploads/files/<?=$upload->file?>' />Download file (file)</a></td>
					<td width='60'><a class='ledit' href='/admin/uploads/edit/<?=$upload->id?>/<?=$page?>'><?=lang('web_edit')?></a></td>
					<td width='60'><a class='ldelete' onClick="return confirm('<?=lang('web_confirm_delete')?>')" href='/admin/uploads/delete/<?=$upload->id?>/<?=$page?>'><?=lang('web_delete')?></a></td>
				</tr>
				
			<?php endforeach ?>
		</tbody>

	</table>

	<?php echo $links; ?>

<?php else: ?>

	<p class='text'><?=lang('web_no_elements');?></p>

<?php endif ?>