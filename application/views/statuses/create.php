<div id='content-top'>
    <h2><?=($updType == 'create') ? lang('web_create_t', array(':name' => 'status')) : lang('web_edit_t', array(':name' => 'status'));?></h2>
    <a href='/admin/statuses/<?=$page?>' class='bforward'><?=lang('web_back_to_list')?></a>
    <span class='clearFix'>&nbsp;</span>
</div>

<?php 
$attributes = array('class' => 'tform', 'id' => '');
echo ($updType == 'create') ? form_open_multipart('/admin/statuses/create', $attributes) : form_open_multipart('/admin/statuses/edit', $attributes); 
?>

<p>
	<label class='labelform' for='name'>Name <span class='required'>*</span></label>
	<input id='name' type='text' name='name' maxlength='60' value="<?php echo set_value('name', (isset($status->name)) ? $status->name : ''); ?>"  />
	<?php echo form_error('name'); ?>
</p>

<p>
	<input id='public' type='checkbox' name='public' value='1' <?=preset_checkbox('public', '1', (isset($status->public)) ? $status->public : ''  )?> />&nbsp;<label class='labelforminline' for='public'>Is public? </label>
	<?php echo form_error('public'); ?>
</p>

<p>
    <?php echo form_submit( 'submit', ($updType == 'edit') ? lang('web_edit') : lang('web_add'), (($updType == 'create') ? "id='submit' class='bcreateform'" : "id='submit' class='beditform'")); ?>
</p>

<?=form_hidden('page',set_value('page', $page)) ?>

<?php if ($updType == 'edit'): ?>
	<?=form_hidden('id',$status->id) ?>
<?php endif ?>

<?php echo form_close(); ?>