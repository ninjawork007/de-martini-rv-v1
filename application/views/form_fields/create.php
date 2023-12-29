<div id='content-top'>
    <h2><?=($updType == 'create') ? lang('web_create_t', array(':name' => 'Form Field')) : lang('web_edit_t', array(':name' => 'Form Field'));?></h2>
    <a href='/admin/form_fields/<?=$page?>/<?=$form_id?>' class='bforward'><?=lang('web_back_to_list')?></a>
    <span class='clearFix'>&nbsp;</span>
</div>

<?php 
$attributes = array('class' => 'tform', 'id' => '');
echo ($updType == 'create') ? form_open_multipart('/admin/form_fields/create/', $attributes) : form_open_multipart('/admin/form_fields/edit/', $attributes); 
?>

<p>
	<label class='labelform' for='label'>Label <span class='required'>*</span></label>
	<input id='label' type='text' name='label' maxlength='60' value="<?php echo set_value('label', (isset($form_field->label)) ? $form_field->label : ''); ?>"  />
	<?php echo form_error('label'); ?>
</p>

<p>
	<label class='labelform' for='name'>Name <span class='required'>*</span></label>
	<input id='name' type='text' name='name' maxlength='60' value="<?php echo set_value('name', (isset($form_field->name)) ? $form_field->name : ''); ?>"  />
	<?php echo form_error('name'); ?>
</p>

<p>
	<label class='labelform' for='type'>Type </label>

	<select name='type' id='type'>
		<option value=''><?=lang('web_choose_option')?></option>
	<option value='input' <?= preset_select('type', 'input', (isset($form_field->type)) ? $form_field->type : ''  ) ?>>Text</option>
	<option value='checkbox' <?= preset_select('type', 'checkbox', (isset($form_field->type)) ? $form_field->type : ''  ) ?>>Checkbox</option>
	<option value='textarea' <?= preset_select('type', 'textarea', (isset($form_field->type)) ? $form_field->type : ''  ) ?>>Text Area</option>
	<option value='radio' <?= preset_select('type', 'radio', (isset($form_field->type)) ? $form_field->type : ''  ) ?>>Radio</option>
	<option value='rv_dropdown' <?= preset_select('type', 'rv_dropdown', (isset($form_field->type)) ? $form_field->type : ''  ) ?>>RVs</option>		
	</select>
	<?php echo form_error('type'); ?>
</p>

<p>
	<label class='labelform' for='dropdown_options'>Dropdown Options </label>
	<textarea id="dropdown_options"  name="dropdown_options"  /><?php echo set_value('dropdown_options', (isset($form_field->dropdown_options)) ? htmlspecialchars_decode($form_field->dropdown_options) : ''); ?></textarea>
	<?php echo form_error('dropdown_options'); ?>
</p>

<p>
    <?php echo form_submit( 'submit', ($updType == 'edit') ? lang('web_edit') : lang('web_add'), (($updType == 'create') ? "id='submit' class='bcreateform'" : "id='submit' class='beditform'")); ?>
</p>

<?=form_hidden('page',set_value('page', $page)) ?>
<?=form_hidden('form_id',set_value('form_id', $page)) ?>

<?php if ($updType == 'edit'): ?>
	<?=form_hidden('id',$form_field->id) ?>
<?php endif ?>

<?php echo form_close(); ?>