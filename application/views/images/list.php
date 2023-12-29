<div id='content-top'>
    <h2><?=lang('web_list_of', array(':name' => 'Images'))?></h2>
   
    <a href='/admin/images/create/<?=$page?>/<?=$vehicle_id?>' class='bcreate'><?=lang('web_create_t', array(':name' => 'image'))?></a>
  
    <span class='clearFix'>&nbsp;</span>
</div>
<?php if ($images): ?>

<div class='clear'></div>

	<table class='ftable' cellpadding='5' cellspacing='5'>

		<thead>
			<th>Title</th>
			<th>Position</th>
			<th>Description</th>
			<th>Image</th>
			<th colspan='2'><?=lang('web_options')?></th>
		</thead>

		<tbody>
			<?php foreach ($images as $image): ?>
				
				<tr>
					<td><?=$image->title;?></td>
					<td><?=$image->position;?></td>
					<td><?=$image->description;?></td>
					<td><img src='/public/uploads/images/img/thumbs/<?=$image->image?>' border='0' /></td>
					<td width='60'><a class='ledit' href='/admin/images/edit/<?=$image->id?>/<?=$page?>/<?=$vehicle_id;?>'><?=lang('web_edit')?></a></td>
					<td width='60'><a class='ldelete' onClick="return confirm('<?=lang('web_confirm_delete')?>')" href='/admin/images/delete/<?=$image->id?>/<?=$page?>/<?=$vehicle_id?>'><?=lang('web_delete')?></a></td>
				</tr>
				
			<?php endforeach ?>
		</tbody>

	</table>

	<?php echo $links; ?>

<?php else: ?>

	<p class='text'>No Images Found</p>

<?php endif ?>
