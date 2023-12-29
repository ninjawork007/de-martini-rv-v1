<div id='content-top'>
    <h2><?=lang('web_list_of', array(':name' => 'Testimonials'))?></h2>
   
    <a href='/admin/testimonials/create/<?=$page?>' class='bcreate'><?=lang('web_create_t', array(':name' => 'Testimonial'))?></a>
  
    <span class='clearFix'>&nbsp;</span>
</div>

<?php if ($testimonials): ?>

<div class='clear'></div>

	<table class='ftable' cellpadding='5' cellspacing='5'>

		<thead>
			<th>Testimonial</th>
			<th>Citation</th>
			<th colspan='2'><?=lang('web_options')?></th>
		</thead>

		<tbody>
			<?php foreach ($testimonials as $testimonial): ?>
				
				<tr>
					<td><?=strip_tags(html_entity_decode($testimonial->testimonial));?></td>
					<td><?=$testimonial->citation;?></td>
					<td width='60'><a class='ledit' href='/admin/testimonials/edit/<?=$testimonial->id?>/<?=$page?>'><?=lang('web_edit')?></a></td>
					<td width='60'><a class='ldelete' onClick="return confirm('<?=lang('web_confirm_delete')?>')" href='/admin/testimonials/delete/<?=$testimonial->id?>/<?=$page?>'><?=lang('web_delete')?></a></td>
				</tr>
				
			<?php endforeach ?>
		</tbody>

	</table>

	<?php echo $links; ?>

<?php else: ?>

	<p class='text'><?=lang('web_no_elements');?></p>

<?php endif ?>