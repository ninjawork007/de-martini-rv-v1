<div id='content-top'>
    <h2><?=($updType == 'create') ? lang('web_create_t', array(':name' => 'image')) : lang('web_edit_t', array(':name' => 'image'));?></h2>
    <span class='clearFix'>&nbsp;</span>
</div>
<?php 
$attributes = array('class' => 'tform', 'id' => '');
echo ($updType == 'create') ? form_open_multipart('/admin/images/create', $attributes) : form_open_multipart('/admin/images/edit', $attributes); 
?>
	<input type="hidden" name="vehicle_id" value="<?=$vehicle_id?>" />
<p>
	<label class='labelform' for='title'>Title <span class='required'>*</span></label>
	<input id='title' type='text' name='title' maxlength='60' value="<?php echo set_value('title', (isset($image->title)) ? $image->title : ''); ?>"  />
	<?php echo form_error('title'); ?>
</p>

<p>
	<input id='is_front' type='checkbox' name='is_front' value='1' <?=preset_checkbox('is_front', '1', (isset($image->is_front)) ? $image->is_front : ''  )?> />&nbsp;<label class='labelforminline' for='is_front'>Is front? </label>
	<?php echo form_error('is_front'); ?>
</p>

<p>
	<label class='labelform' for='position'>Position </label>
	<input id='position' type='text' name='position' maxlength='4' value="<?php echo set_value('position', (isset($image->position)) ? $image->position : ''); ?>"  />
	<?php echo form_error('position'); ?>
</p>

<p>
	<label class='labelform' for='description'>Description </label>
	<textarea id="description"  name="description"  /><?php echo set_value('description', (isset($image->description)) ? htmlspecialchars_decode($image->description) : ''); ?></textarea>
	<?php echo form_error('description'); ?>
</p>

<p>
	<input id='public' type='checkbox' name='public' value='1' <?=preset_checkbox('public', '1', (isset($image->public)) ? $image->public : true  )?> />&nbsp;<label class='labelforminline' for='public'>Is public? </label>
	<?php echo form_error('public'); ?>
</p>

<p>
	<label class='labelform' for='image'><?=lang( ($updType == 'edit')  ? "web_image_edit" : "web_image_create" )?> (image) <span class='required'>*</span></label>

	<?php if ($updType == 'edit'): ?>
		<p> <img src='/public/images/images/img/thumbs/<?=$image->image?>' /> </p>
	<?php endif ?>

	<input id='image' type='file' name='image[]' multiple/>

	<br/><?php echo form_error('image'); ?>
	<?php  echo ( isset($error_image)) ?  $error_image  : ""; ?>
</p>

<p>
	<label class='labelform' for='group_id'>Group_id </label>
	<select name='group_id' id='group_id' size='1'>
		<option value=''><?=lang('web_choose_option')?></option>
		<?php foreach ($array_group as $item): ?>
			<option value="<?=$item->id;?>" <?= preset_select('group_id', $item->id, (isset($image->group_id)) ? $image->group_id : ''  ) ?>><?=$item->name;?></option>
		<?php endforeach ?>
				
	</select>
	<?php echo form_error('group_id'); ?>
</p>

<p>
    <?php echo form_submit( 'submit', ($updType == 'edit') ? lang('web_edit') : lang('web_add'), (($updType == 'create') ? "id='submit' class='bcreateform'" : "id='submit' class='beditform'")); ?>
</p>

<?=form_hidden('page',set_value('page', $page)) ?>

<?php if ($updType == 'edit'): ?>
	<?=form_hidden('id',$image->id) ?>
<?php endif ?>

<?php echo form_close(); ?>
