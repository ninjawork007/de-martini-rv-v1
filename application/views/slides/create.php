<div id='content-top'>
    <h2><?=($updType == 'create') ? lang('web_create_t', array(':name' => 'slide')) : lang('web_edit_t', array(':name' => 'slide'));?></h2>
    <a href='/admin/slides/<?=$page?>' class='bforward'><?=lang('web_back_to_list')?></a>
    <span class='clearFix'>&nbsp;</span>
</div>

<?php 
$attributes = array('class' => 'tform', 'id' => '');
echo ($updType == 'create') ? form_open_multipart('/admin/slides/create', $attributes) : form_open_multipart('/admin/slides/edit', $attributes); 
?>

<p>
	<label class='labelform' for='name'>Name </label>
	<input id='name' type='text' name='name' maxlength='60' value="<?php echo set_value('name', (isset($slide->name)) ? $slide->name : ''); ?>"  />
	<?php echo form_error('name'); ?>
</p>

<p>
    <?php echo form_submit( 'submit', ($updType == 'edit') ? lang('web_edit') : lang('web_add'), (($updType == 'create') ? "id='submit' class='bcreateform'" : "id='submit' class='beditform'")); ?>
</p>

<?=form_hidden('page',set_value('page', $page)) ?>

<?php if ($updType == 'edit'): ?>
	<?=form_hidden('id',$slide->id) ?>
<?php endif ?>

<?php echo form_close(); ?>