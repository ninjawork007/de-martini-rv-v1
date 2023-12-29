<script type="text/javascript">
$(document).ready(function(){
    
});
</script>
<div id='content-top'>
    <h2><?=($updType == 'create') ? lang('web_create_t', array(':name' => 'upload')) : lang('web_edit_t', array(':name' => 'upload'));?></h2>
    <a href='/admin/uploads/<?=$page?>' class='bforward'><?=lang('web_back_to_list')?></a>
    <span class='clearFix'>&nbsp;</span>
</div>

<?php 
$attributes = array('class' => 'tform', 'id' => '');
echo ($updType == 'create') ? form_open_multipart('/admin/uploads/create', $attributes) : form_open_multipart('/admin/uploads/edit', $attributes); 
?>

<p>
	<label class='labelform' for='name'>Name <span class='required'>*</span></label>
	<input id='name' type='text' name='name' maxlength='255' value="<?php echo set_value('name', (isset($upload->name)) ? $upload->name : ''); ?>"  />
	<?php echo form_error('name'); ?>
</p>

<p>
	<label class='labelform' for='description'>Description </label>
	<textarea id="description"  name="description"  /><?php echo set_value('description', (isset($upload->description)) ? htmlspecialchars_decode($upload->description) : ''); ?></textarea>
	<?php echo form_error('description'); ?>
</p>

<p>
	<label class='labelform' for='file'><?=lang( ($updType == 'edit')  ? "web_file_edit" : "web_file_create" )?> (file) <span class='required'>*</span></label>

	<input id='file' type='file' name='file' />

	<?php if ($updType == 'edit'): ?>
	<a href='/public/uploads/uploads/files/<?=$upload->file?>' />Download actual file (file)</a>
	<?php endif ?>

	<br/><?php echo form_error('file'); ?>
	<?php  echo ( isset($error_file)) ?  $error_file  : ""; ?>
</p>

<p>
    <?php echo form_submit( 'submit', ($updType == 'edit') ? lang('web_edit') : lang('web_add'), (($updType == 'create') ? "id='submit' class='bcreateform'" : "id='submit' class='beditform'")); ?>
</p>

<?=form_hidden('page',set_value('page', $page)) ?>

<?php if ($updType == 'edit'): ?>
	<?=form_hidden('id',$upload->id) ?>
<?php endif ?>

<?php echo form_close(); ?>