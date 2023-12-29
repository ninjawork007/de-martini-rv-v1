<script type='text/javascript'>

	$(document).ready(function(){

		CKEDITOR.replace( 'description', {language: '<?=$this->config->item('prefix_language')?>',filebrowserUploadUrl : "/admin/admin/ckeditor/"});

		$('#submit').click(function() {

			CKEDITOR.instances.description.updateElement();

			return true;

		});

	});

</script>
<div id='content-top'>
    <h2><?=($updType == 'create') ? lang('web_create_t', array(':name' => 'Model Specific')) : lang('web_edit_t', array(':name' => 'Model Specific'));?></h2>
    <a href='/admin/model_specifics/<?=$page?>' class='bforward'><?=lang('web_back_to_list')?></a>
    <span class='clearFix'>&nbsp;</span>
</div>

<?php
$attributes = array('class' => 'tform', 'id' => '');
echo ($updType == 'create') ? form_open_multipart('/admin/model_specifics/create', $attributes) : form_open_multipart('/admin/model_specifics/edit', $attributes);
?>

<p>
	<label class='labelform' for='year'>Year <span class='required'>*</span></label>
	<input id='year' type='text' name='year' maxlength='4' value="<?php echo set_value('year', (isset($model_specific->year)) ? $model_specific->year : ''); ?>"  />
	<?php echo form_error('year'); ?>
</p>

<p>
	<label class='labelform' for='make'>Make <span class='required'>*</span></label>
	<input id='make' type='text' name='make' maxlength='60' value="<?php echo set_value('make', (isset($model_specific->make)) ? $model_specific->make : ''); ?>"  />
	<?php echo form_error('make'); ?>
</p>

<p>
	<label class='labelform' for='model'>Model <span class='required'>*</span></label>
	<input id='model' type='text' name='model' maxlength='60' value="<?php echo set_value('model', (isset($model_specific->model)) ? $model_specific->model : ''); ?>"  />
	<?php echo form_error('model'); ?>
</p>
<div class="pure-u-1">
	<label class='labelform' for='description'>Description</label><br>
	<textarea id="description"  name="description" style="width: 700px; height: 300px;" /><?php echo set_value('description', (isset($model_specific->description)) ? htmlspecialchars_decode($model_specific->description) : ''); ?></textarea>
	<?php echo form_error('description'); ?>
</div>
<p>
    <label class='labelform' for='chassis'>Chassis</label>
    <input id='chassis' type='text' name='chassis' value="<?php echo set_value('chassis', (isset($model_specific->chassis)) ? $model_specific->chassis : ''); ?>"  />
    <?php echo form_error('chassis'); ?>
</p>
<p>
    <label class='labelform' for='engine'>Engine</label>
    <input id='engine' type='text' name='engine' value="<?php echo set_value('engine', (isset($model_specific->engine)) ? $model_specific->engine : ''); ?>"  />
    <?php echo form_error('engine'); ?>
</p>
<p>
    <label class='labelform' for='generator_make'>Generator Make </label>
    <input id='generator_make' type='text' name='generator_make' maxlength='60' value="<?php echo set_value('generator_make', (isset($model_specific->generator_make)) ? $model_specific->generator_make : ''); ?>"  />
    <?php echo form_error('generator_make'); ?>
</p>
<p>
    <label class='labelform' for='generator_kw'>Generator KW</label>
    <input id='generator_kw' type='text' name='generator_kw' maxlength='32' value="<?php echo set_value('generator_kw', (isset($model_specific->generator_kw)) ? $model_specific->generator_kw : ''); ?>"  />
    <?php echo form_error('generator_kw'); ?>
</p>
<p>
    <label class='labelform' for='generator_hours'>Generator Hours</label>
    <input id='generator_hours' type='text' name='generator_hours' maxlength='32' value="<?php echo set_value('generator_hours', (isset($model_specific->generator_hours)) ? $model_specific->generator_hours : ''); ?>"  />
    <?php echo form_error('generator_hours'); ?>
</p>
<p>
    <label class='labelform' for='generator_type'>Generator Type</label>
    <select name='generator_type' id='generator_type'>
        <option value=''><?=lang('web_choose_option')?></option>

        <option value='gas' <?= preset_select('generator_type', 'gas', (isset($model_specific->generator_type)) ? $model_specific->generator_type : ''  ) ?>>Gas</option>
        <option value='diesel' <?= preset_select('generator_type', 'diesel', (isset($model_specific->generator_type)) ? $model_specific->generator_type : ''  ) ?>>Diesel</option>
        <option value='LP' <?= preset_select('generator_type', 'LP', (isset($model_specific->generator_type)) ? $model_specific->generator_type : ''  ) ?>>LP</option>
    </select>
    <?php echo form_error('generator_type'); ?>
</p>
<p>
    <?php
	$sweet = array(
		'all' => $array_cockpit_option,
		'existing' => isset($model_specific) && $model_specific->cockpit_options ? $model_specific->cockpit_options : '',
		'type' => 'checkbox',
		'model' => 'Cockpit_option',
		'field' => 'cockpit_options',
		'label' => 'Cockpit Options'
	);
	?>
	<?php $this->load->view('partials/_add_another', $sweet);?>
</p>
<p>
    <?php
	$sweet = array(
		'all' => $array_flooring,
		'existing' => isset($model_specific) && $model_specific->flooring ? $model_specific->flooring : '',
		'model' => 'Flooring',
		'type' => 'checkbox',
		'field' => 'flooring',
		'label' => 'Flooring'
	);
	?>
	<?php $this->load->view('partials/_add_another', $sweet);?>
</p>
<p>
    <?php
	$sweet = array(
		'all' => $array_furniture,
		'existing' => isset($model_specific) && $model_specific->furniture ? $model_specific->furniture : '',
		'model' => 'Furniture',
		'field' => 'furniture',
		'type' => 'checkbox',
		'label' => 'Furniture'
	);
	?>
	<?php $this->load->view('partials/_add_another', $sweet);?>
</p>
<p>
    <?php
	$sweet = array(
		'all' => $array_bedroom_layout,
		'existing' => isset($model_specific) && $model_specific->bedroom_layouts ? $model_specific->bedroom_layouts : '',
		'model' => 'Bedroom_layout',
		'field' => 'bedroom_layouts',
		'label' => 'Bedroom Layout',
		'type' => 'checkbox',
	);
	?>
	<?php $this->load->view('partials/_add_another', $sweet);?>
</p>
<p>
    <?php
	$sweet = array(
		'all' => $array_bath_layout,
		'existing' => isset($model_specific) && $model_specific->bath_layouts ? $model_specific->bath_layouts : '',
		'model' => 'Bath_layout',
		'field' => 'bath_layouts',
		'type' => 'checkbox',
		'label' => 'Bath Layout'
	);
	?>
	<?php $this->load->view('partials/_add_another', $sweet);?>
</p>
<p>
   <?php
	$sweet = array(
		'all' => $array_interior_equipment,
		'existing' => isset($model_specific) && $model_specific->interior_equipments ? $model_specific->interior_equipments : '',
		'model' => 'Interior_equipment',
		'type' => 'checkbox',
		'field' => 'interior_equipments',
		'label' => 'Interior Equipments'
	);
	?>
	<?php $this->load->view('partials/_add_another', $sweet);?>
</p>
<p>
    <?php
	$sweet = array(
		'all' => $array_exterior_equipment,
		'existing' => isset($model_specific) && $model_specific->exterior_equipments ? $model_specific->exterior_equipments : '',
		'model' => 'Exterior_equipment',
		'type' => 'checkbox',
		'field' => 'exterior_equipments',
		'label' => 'Exterior Equipments'
	);

	?>
	<?php $this->load->view('partials/_add_another', $sweet);?>
</p>
<p>
	<label class='labelform' for='manufacture_url'>Manufacture URL </label>
	<input id='manufacture_url' type='text' name='manufacture_url' maxlength='1000' value="<?php echo set_value('manufacture_url', (isset($model_specific->manufacture_url)) ? $model_specific->manufacture_url : ''); ?>"  />
	<?php echo form_error('manufacture_url'); ?>
</p>

<p>
	<label class='labelform' for='manufacture_list'>Manufacture Equipment List (LINK) </label>
	<input id='manufacture_list' type='text' name='manufacture_list' maxlength='1000' value="<?php echo set_value('manufacture_list', (isset($model_specific->manufacture_list)) ? $model_specific->manufacture_list : ''); ?>"  />
	<?php echo form_error('manufacture_list'); ?>
</p>

<p>
    <?php echo form_submit( 'submit', ($updType == 'edit') ? lang('web_edit') : lang('web_add'), (($updType == 'create') ? "id='submit' class='bcreateform'" : "id='submit' class='beditform'")); ?>
</p>

<?=form_hidden('page',set_value('page', $page)) ?>

<?php if ($updType == 'edit'): ?>
	<?=form_hidden('id',$model_specific->id) ?>
<?php endif ?>

<?php echo form_close(); ?>