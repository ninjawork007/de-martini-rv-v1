<div id='content-top'>
    <h2><?=($updType == 'create') ? lang('web_create_t', array(':name' => 'Floor Plan')) : lang('web_edit_t', array(':name' => 'Floor Plan'));?></h2>
    <a href='/admin/floor_plans/<?=$page?>' class='bforward'><?=lang('web_back_to_list')?></a>
    <span class='clearFix'>&nbsp;</span>
</div>

<?php 
$attributes = array('class' => 'tform', 'id' => '');
echo ($updType == 'create') ? form_open_multipart('/admin/floor_plans/create', $attributes) : form_open_multipart('/admin/floor_plans/edit', $attributes); 
?>

<p>
	<label class='labelform' for='name'>Name </label>
	<input id='name' type='text' name='name' maxlength='60' value="<?php echo set_value('name', (isset($floor_plan->name)) ? $floor_plan->name : ''); ?>"  />
	<?php echo form_error('name'); ?>
</p>

<p>
    <label class='labelform' for='model'>Model </label>
    <input id='model' type='text' name='model' maxlength='60' value="<?php echo set_value('model', (isset($floor_plan->model)) ? $floor_plan->model : ''); ?>"  />
    <?php echo form_error('model'); ?>
</p>


<p>
	<label class='labelform' for='year'>Year </label>
	<input id='year' type='text' name='year' maxlength='4' value="<?php echo set_value('year', (isset($floor_plan->year)) ? $floor_plan->year : ''); ?>"  />
	<?php echo form_error('year'); ?>
</p>

<p>
	<label class='labelform' for='floor_plan'><?=lang( ($updType == 'edit')  ? "web_file_edit" : "web_file_create" )?> (floor_plan) <span class='required'>*</span></label>

	<input id='floor_plan' type='file' name='floor_plan' />

	<?php if ($updType == 'edit'): ?>
	<a href='/public/uploads/floor_plans/files/<?=$floor_plan->floor_plan?>' />Download actual file (floor_plan)</a>
	<?php endif ?>

	<br/><?php echo form_error('floor_plan'); ?>
	<?php  echo ( isset($error_floor_plan)) ?  $error_floor_plan  : ""; ?>
</p>

<p>
    <?php echo form_submit( 'submit', ($updType == 'edit') ? lang('web_edit') : lang('web_add'), (($updType == 'create') ? "id='submit' class='bcreateform'" : "id='submit' class='beditform'")); ?>
</p>

<?=form_hidden('page',set_value('page', $page)) ?>

<?php if ($updType == 'edit'): ?>
	<?=form_hidden('id',$floor_plan->id) ?>
<?php endif ?>

<?php echo form_close(); ?>