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
	<h2><?=($updType == 'create') ? lang('web_create_t', array(':name' => 'vehicle')) : lang('web_edit_t', array(':name' => 'vehicle'));?></h2>
	<a href='/admin/vehicles/<?=$page?>' class='bforward'><?=lang('web_back_to_list')?></a>
    	<span class='clearFix'>&nbsp;</span>
</div>
<?php
$attributes = array('class' => 'pure-form', 'id' => '');
echo ($updType == 'create') ? form_open_multipart('/admin/vehicles/create', $attributes) : form_open_multipart('/admin/vehicles/edit', $attributes);
?>
<?php echo form_submit( 'submit', 'Save', (($updType == 'create') ? "id='submit' class='pure-button pure-button-primary'" : "id='submit' class='pure-button pure-button-primary'")); ?>
<fieldset>
        <legend>Web Details:</legend>
        <div class="pure-g-r">
		<div class="pure-u-1-2">
			<label class='labelform' for='category>_id'>Category<span class='required'>*</span></label>
			<select name='category_id' id='category_id' size='1'>
				<option value=''><?=lang('web_choose_option')?></option>
				<?php foreach ($array_category as $item): ?>
					<option value="<?=$item->id;?>" <?= preset_select('category_id', $item->id, (isset($vehicle->category_id)) ? $vehicle->category_id : ''  ) ?>><?=$item->name;?></option>
				<?php endforeach ?>
			</select>
			<?php echo form_error('category_id'); ?>
		</div>
		<div class="pure-u-1-2">
			<label class='labelform' for='vehicle_condition'>Vehicle Condition <span class='required'>*</span></label>
			<select name='vehicle_condition' id='vehicle_condition'>
				<option value=''><?=lang('web_choose_option')?></option>
				<option value='new' <?= preset_select('vehicle_condition', 'new', (isset($vehicle->vehicle_condition)) ? $vehicle->vehicle_condition : ''  ) ?>>New</option>
				<option value='used' <?= preset_select('vehicle_condition', 'used', (isset($vehicle->vehicle_condition)) ? $vehicle->vehicle_condition : ''  ) ?>>Used</option>
			</select>
			<?php echo form_error('vehicle_condition'); ?>
		</div>
		<div class="pure-u-1-2" data-low-hide>
			<label class='labelform' for='status_id'>Status<span class='required'>*</span></label>
			<select name='status_id' id='status_id' size='1'>
				<option value=''><?=lang('web_choose_option')?></option>
				<?php foreach ($array_status as $item): ?>
					<option value="<?=$item->id;?>" <?= preset_select('status_id', $item->id, (isset($vehicle->status_id)) ? $vehicle->status_id : ''  ) ?>><?=$item->name;?></option>
				<?php endforeach ?>
			</select>
			<?php echo form_error('status_id'); ?>
		</div>
		<!--
		<div class="pure-u-1-2">
			<label class='labelform' for='template_id'>Template<span class='required'>*</span></label>
			<select name='template_id' id='template_id' size='1'>
				<option value=''><?=lang('web_choose_option')?></option>
				<?php foreach ($array_vehicle_template as $item): ?>
					<option value="<?=$item->id;?>" <?= preset_select('template_id', $item->id, (isset($vehicle->template_id)) ? $vehicle->template_id : ''  ) ?>><?=$item->name;?></option>
				<?php endforeach ?>
			</select>
			<?php echo form_error('template_id'); ?>
		</div>
		-->
		<div class="pure-u-1-2">
		</div>
		<div class="pure-u-1-4" style="padding-top: 10px;" data-low-hide>
			<label>&nbsp;</label>
			<input id='featured_special' type='checkbox' name='featured_special' value='1' <?=preset_checkbox('featured_special', '1', (isset($vehicle->featured_special)) ? $vehicle->featured_special : ''  )?> />
			&nbsp;<label class='labelforminline' for='featured_special'>Featured Special</label>
			<?php echo form_error('featured_special'); ?>
		</div>
		<div class="pure-u-1-4" style="padding-top: 10px;" data-low-hide>
			<label>&nbsp;</label>
			<input id='web_special' type='checkbox' name='web_special' value='1' <?=preset_checkbox('web_special', '1', (isset($vehicle->web_special)) ? $vehicle->web_special : ''  )?> />
			&nbsp;<label class='labelforminline' for='web_special'>Web Special</label>
			<?php echo form_error('web_special'); ?>
		</div>
		<div class="pure-u-1-4" style="padding-top: 10px;" data-low-hide>
			<label>&nbsp;</label>
			<input id='clearance' type='checkbox' name='clearance' value='1' <?=preset_checkbox('clearance', '1', (isset($vehicle->clearance)) ? $vehicle->clearance : ''  )?> />
			&nbsp;<label class='labelforminline' for='clearance'>Clearance Sale</label>
			<?php echo form_error('clearance'); ?>
		</div>
	</div>
</fieldset>
<fieldset>
        <legend>Vehicle Info:</legend>
	<div class="pure-g-r">
		<div class="pure-u-1-2">
			<label class='labelform' for='item_number'>Item # <span class='required'>*</span></label>
			<input id='item_number' type='text' name='item_number' maxlength='10' value="<?php echo set_value('item_number', (isset($vehicle->item_number)) ? $vehicle->item_number : ''); ?>"  />
			<?php echo form_error('item_number'); ?>
		</div>
		<div class="pure-u-1-2">
			<label class='labelform' for='tagline'>Tagline </label>
			<input id='tagline' type='text' name='tagline' maxlength='100' value="<?php echo set_value('tagline', (isset($vehicle->tagline)) ? $vehicle->tagline : ''); ?>"  />
			<?php echo form_error('tagline'); ?>
		</div>
		<div class="pure-u-1" data-low-hide>
			<label class='labelform' for='short_description'>Short Description </label>
			<input id='short_description' style="width: 75%;" type='text' name='short_description' maxlength='255' value="<?php echo set_value('short_description', (isset($vehicle->short_description)) ? $vehicle->short_description : ''); ?>"  />
			<?php echo form_error('short_description'); ?>
		</div>
		<div class="pure-u-1-2">
			<label class='labelform' for='year'>Year <span class='required'>*</span></label>
			<input id='year' type='text' name='year' maxlength='4' value="<?php echo set_value('year', (isset($vehicle->year)) ? $vehicle->year : ''); ?>"  />
			<?php echo form_error('year'); ?>
		</div>
		<div class="pure-u-1-2">
			<label class='labelform' for='make'>Make <span class='required'>*</span></label>
			<input id='make' type='text' name='make' maxlength='32' value="<?php echo set_value('make', (isset($vehicle->make)) ? $vehicle->make : ''); ?>"  />
			<?php echo form_error('make'); ?>
		</div>
		<div class="pure-u-1-2">
			<label class='labelform' for='model'>Model <span class='required'>*</span></label>
			<input id='model' type='text' name='model' maxlength='32' value="<?php echo set_value('model', (isset($vehicle->model)) ? $vehicle->model : ''); ?>"  />
			<?php echo form_error('model'); ?>
		</div>
		<div class="pure-u-1-2">
			<label class='labelform' for='vin'>VIN <span class='required'>*</span></label>
			<input id='vin' type='text' name='vin' maxlength='100' value="<?php echo set_value('vin', (isset($vehicle->vin)) ? $vehicle->vin : ''); ?>"  />
			<?php echo form_error('vin'); ?>
		</div>
		<div class="pure-u-1-2">
			<label class='labelform' for='mileage'>Mileage <span class='required'>*</span></label>
			<input id='mileage' type='text' name='mileage' maxlength='12' value="<?php echo set_value('mileage', (isset($vehicle->mileage)) ? $vehicle->mileage : ''); ?>"  />
			<?php echo form_error('mileage'); ?>
		</div>
		<div class="pure-u-1-2">
			<label class='labelform' for='mileage'>Floor Plan <span class='required'>*</span></label>
			<input id='model_number' type='text' name='model_number' maxlength='16' value="<?php echo set_value('model_number', (isset($vehicle->model_number)) ? $vehicle->model_number : ''); ?>"  />
			<?php echo form_error('model_number'); ?>
		</div>
		<div class="pure-u-1-2">
			<label class='labelform' for='length'>Length </label>
			<input id='length' type='text' name='length' maxlength='2' value="<?php echo set_value('length', (isset($vehicle->length)) ? $vehicle->length : ''); ?>"  />
			<?php echo form_error('length'); ?>
		</div>
		<div class="pure-u-1-2">
			<label class='labelform' for='transmission'>Transmission </label>
			<input id='series' type='text' name='transmission' maxlength='60' value="<?php echo set_value('transmission', (isset($vehicle->transmission)) ? $vehicle->transmission : ''); ?>"  />
			<?php echo form_error('transmission'); ?>
		</div>
		<div class="pure-u-1-2" data-low-hide>
			<label class='labelform' for='drivetrain'>Drivetrain </label>
			<input id='drivetrain' type='text' name='drivetrain' maxlength='60' value="<?php echo set_value('drivetrain', (isset($vehicle->drivetrain)) ? $vehicle->drivetrain : ''); ?>"  />
			<?php echo form_error('drivetrain'); ?>
		</div>
		<div class="pure-u-1-2" data-low-hide>
			<label class='labelform' for='style'>Style </label>
			<input id='style' type='text' name='style' maxlength='60' value="<?php echo set_value('style', (isset($vehicle->style)) ? $vehicle->style : ''); ?>"  />
			<?php echo form_error('style'); ?>
		</div>
		<div class="pure-u-1-2">
			<label class='labelform' for='interior_color'>Interior Color</label>
			<input id='interior_color' type='text' name='interior_color' value="<?php echo set_value('interior_color', (isset($vehicle->interior_color)) ? $vehicle->interior_color : ''); ?>"  />
			<?php echo form_error('interior_color'); ?>
		</div>
		<div class="pure-u-1-2">
			<label class='labelform' for='exterior_color'>Exterior Color</label>
			<input id='exterior_color' type='text' name='exterior_color' value="<?php echo set_value('exterior_color', (isset($vehicle->exterior_color)) ? $vehicle->exterior_color : ''); ?>"  />
			<?php echo form_error('exterior_color'); ?>
		</div>
		<div class="pure-u-1-2">
			<label class='labelform' for='chassis'>Chassis</label>
			<input id='chassis' type='text' name='chassis' value="<?php echo set_value('chassis', (isset($vehicle->chassis)) ? $vehicle->chassis : ''); ?>"  />
			<?php echo form_error('chassis'); ?>
		</div>
		<div class="pure-u-1-2">
			<label class='labelform' for='fuel_type'>Fuel Type</label>
			<input id='fuel_type' type='text' name='fuel_type' value="<?php echo set_value('fuel_type', (isset($vehicle->fuel_type)) ? $vehicle->fuel_type : ''); ?>"  />
			<?php echo form_error('fuel_type'); ?>
		</div>

		<div class="pure-u-1-2" data-low-hide>
			<label class='labelform' for='title'>DMV Title </label>
			<input id='series' type='text' name='title' maxlength='60' value="<?php echo set_value('title', (isset($vehicle->title)) ? $vehicle->title : ''); ?>"  />
			<?php echo form_error('title'); ?>
		</div>
		<div class="pure-u-1-2">
			<label class='labelform' for='asking_price'>Asking Price </label>
			<input id='asking_price' type='text' name='asking_price' maxlength='12' value="<?php echo set_value('asking_price', (isset($vehicle->asking_price)) ? $vehicle->asking_price : ''); ?>"  />
			<?php echo form_error('asking_price'); ?>
		</div>
		<div class="pure-u-1-2" data-low-hide>
			<label class='labelform' for='sale_price'>Sale Price </label>
			<input id='sale_price' type='text' name='sale_price' maxlength='12' value="<?php echo set_value('sale_price', (isset($vehicle->sale_price)) ? $vehicle->sale_price : ''); ?>"  />
			<?php echo form_error('sale_price'); ?>
		</div>
		<div class="pure-u-1-2" data-low-hide>
			<label class='labelform' for='map_price'>Minimum Asking Price</label>
			<input id='sale_price' type='text' name='map_price' maxlength='22' value="<?php echo set_value('map_price', (isset($vehicle->map_price)) ? $vehicle->map_price : ''); ?>"  />
			<?php echo form_error('map_price'); ?>
		</div>
		<div class="pure-u-1">
			<label class='labelform' for='description'>Description</label><br>
			<label for='update_description'>Generate Description</label><input type="checkbox" name="update_description" id="update_description" value="1" /><br>
			<textarea id="description"  name="description" style="width: 700px; height: 300px;" /><?php echo set_value('description', (isset($vehicle->description)) ? htmlspecialchars_decode($vehicle->description) : ''); ?></textarea>
			<?php echo form_error('description'); ?>
		</div>
		<div class="pure-u-1" data-low-hide>
			<label class='labelform' for='video_embed'>Video Embed</label>
			<textarea id="video_embed"  name="video_embed" style="width: 700px; height: 300px;" /><?php echo set_value('video_embed', (isset($vehicle->video_embed)) ? htmlspecialchars_decode($vehicle->video_embed) : ''); ?></textarea>
			<?php echo form_error('video_embed'); ?>
		</div>
		<div class="pure-u-1-2" data-low-hide>
			<label class='labelform' for='warranty_title'>Warranty Title </label>
			<input id='warranty_title' type='text' name='warranty_title' maxlength='255' value="<?php echo set_value('warranty_title', (isset($vehicle->warranty_title)) ? $vehicle->warranty_title : ''); ?>"  />
			<?php echo form_error('warranty_title'); ?>
		</div>
		<div class="pure-u-1" data-low-hide>
			<label class='labelform' for='warranty_description'>Warranty Description </label>
			<textarea id="warranty_description"  name="warranty_description" style="width: 700px; height: 300px;" /><?php echo set_value('warranty_description', (isset($vehicle->warranty_description)) ? htmlspecialchars_decode($vehicle->warranty_description) : ''); ?></textarea>
			<?php echo form_error('warranty_description'); ?>
		</div>
	</div>
</fieldset>
<fieldset>
        <legend>Generator:</legend>
	<div class="pure-g-r">
		<div class="pure-u-1-3">
			<label class='labelform' for='generator_make'>Generator Make </label>
			<input id='generator_make' type='text' name='generator_make' maxlength='60' value="<?php echo set_value('generator_make', (isset($vehicle->generator_make)) ? $vehicle->generator_make : ''); ?>"  />
			<?php echo form_error('generator_make'); ?>
		</div>
		<div class="pure-u-1-3">
			<label class='labelform' for='generator_kw'>Generator KW</label>
			<input id='generator_kw' type='text' name='generator_kw' maxlength='32' value="<?php echo set_value('generator_kw', (isset($vehicle->generator_kw)) ? $vehicle->generator_kw : ''); ?>"  />
			<?php echo form_error('generator_kw'); ?>
		</div>
		<div class="pure-u-1-3">
			<label class='labelform' for='generator_hours'>Generator Hours</label>
			<input id='generator_hours' type='text' name='generator_hours' maxlength='32' value="<?php echo set_value('generator_hours', (isset($vehicle->generator_hours)) ? $vehicle->generator_hours : ''); ?>"  />
			<?php echo form_error('generator_hours'); ?>
		</div>
		<div class="pure-u-1-3">
			<label class='labelform' for='hide_generator_hours'>Hide Generator Hours</label>
			<input id='hide_generator_hours' type='checkbox' name='hide_generator_hours' value='1' <?=preset_checkbox('hide_generator_hours', '1', (isset($vehicle->hide_generator_hours)) ? $vehicle->hide_generator_hours : ''  )?> />
			<?php echo form_error('hide_generator_hours'); ?>
		</div>
		<div class="pure-u-1-3">
			<label class='labelform' for='generator_type'>Generator Type</label>
			<select name='generator_type' id='generator_type'>
				<option value=''><?=lang('web_choose_option')?></option>

				<option value='gas' <?= preset_select('generator_type', 'gas', (isset($vehicle->generator_type)) ? $vehicle->generator_type : ''  ) ?>>Gas</option>
				<option value='diesel' <?= preset_select('generator_type', 'diesel', (isset($vehicle->generator_type)) ? $vehicle->generator_type : ''  ) ?>>Diesel</option>
				<option value='LP' <?= preset_select('generator_type', 'LP', (isset($vehicle->generator_type)) ? $vehicle->generator_type : ''  ) ?>>LP</option>
			</select>
			<?php echo form_error('generator_type'); ?>
		</div>
	</div>
</fieldset>
<fieldset>
        <legend>Details:</legend>
	<div class="pure-g-r">
		<div class="pure-u-1-2">
			<label class='labelform' for='slide_id'>Slide</label>
			<select name='slide_id' id='slide_id' size='1'>
				<option value=''><?=lang('web_choose_option')?></option>
				<?php foreach ($array_slide as $item): ?>
					<option value="<?=$item->id;?>" <?= preset_select('slide_id', $item->id, (isset($vehicle->slide_id)) ? $vehicle->slide_id : ''  ) ?>><?=$item->name;?></option>
				<?php endforeach ?>
			</select>
			<?php echo form_error('slide_id'); ?>
		</div>
		<div class="pure-u-1">
			<?php
			$sweet = array(
				'all' => $array_engine,
				'existing' => $vehicle->engines,
				'type' => 'radio',
				'model' => 'Engine',
				'field' => 'engine',
				'label' => 'Engine'
			);
			?>
			<?php $this->load->view('partials/_add_another', $sweet);?>
		</div>
		<div class="pure-u-1">
			<?php
			$sweet = array(
				'all' => $array_cockpit_option,
				'existing' => $vehicle->cockpit_options,
				'type' => 'checkbox',
				'model' => 'Cockpit_option',
				'field' => 'cockpit_options',
				'label' => 'Cockpit Options'
			);
			?>
			<?php $this->load->view('partials/_add_another', $sweet);?>
		</div>
		<div class="pure-u-1">
			<?php
			$sweet = array(
				'all' => $array_bedroom_layout,
				'existing' => $vehicle->bedroom_layouts,
				'model' => 'Bedroom_layout',
				'field' => 'bedroom_layouts',
				'label' => 'Bedroom Layout',
				'type' => 'checkbox',
			);
			?>
			<?php $this->load->view('partials/_add_another', $sweet);?>
		</div>
		<div class="pure-u-1">
			<?php
			$sweet = array(
				'all' => $array_bath_layout,
				'existing' => $vehicle->bath_layouts,
				'model' => 'Bath_layout',
				'field' => 'bath_layouts',
				'type' => 'checkbox',
				'label' => 'Bath Layout'
			);
			?>
			<?php $this->load->view('partials/_add_another', $sweet);?>
		</div>
		<div class="pure-u-1">
			<?php
			$sweet = array(
				'all' => $array_furniture,
				'existing' => $vehicle->furniture,
				'model' => 'Furniture',
				'field' => 'furniture',
				'type' => 'checkbox',
				'label' => 'Furniture'
			);
			?>
			<?php $this->load->view('partials/_add_another', $sweet);?>
		</div>
		<div class="pure-u-1">
			<?php
			$sweet = array(
				'all' => $array_flooring,
				'existing' => $vehicle->flooring,
				'model' => 'Flooring',
				'type' => 'checkbox',
				'field' => 'flooring',
				'label' => 'Dining/Flooring'
			);
			?>
			<?php $this->load->view('partials/_add_another', $sweet);?>
		</div>
		<div class="pure-u-1">
			<?php
			$sweet = array(
				'all' => $array_interior_equipment,
				'existing' => $vehicle->interior_equipments,
				'model' => 'Interior_equipment',
				'type' => 'checkbox',
				'field' => 'interior_equipments',
				'label' => 'Interior Equipments'
			);
			?>
			<?php $this->load->view('partials/_add_another', $sweet);?>
		</div>
		<div class="pure-u-1">
			<?php
			$sweet = array(
				'all' => $array_exterior_equipment,
				'existing' => $vehicle->exterior_equipments,
				'model' => 'Exterior_equipment',
				'type' => 'checkbox',
				'field' => 'exterior_equipments',
				'label' => 'Exterior Equipments'
			);
			?>
			<?php $this->load->view('partials/_add_another', $sweet);?>
		</div>
	</div>
</fieldset>
<fieldset data-low-hide>
    <legend>Uploads:</legend>
	<div class="pure-g-r">
		<div class="pure-u-1">
			<?=$upload_list?>
		</div>
	</div>
</fieldset>
<?=form_hidden('page',set_value('page', $page)) ?>
<?php if ($updType == 'edit'): ?>
	<?=form_hidden('id',$vehicle->id) ?>
<?php endif ?>
<?php echo form_submit( 'submit', 'Save', (($updType == 'create') ? "id='submit' class='pure-button pure-button-primary'" : "id='submit' class='pure-button pure-button-primary'")); ?>
<?php echo form_close(); ?>
<?php if ($updType == 'edit'): ?>
<div data-low-hide>
    <br />
    <hr />
    <iframe src="/admin/images/index/<?=$vehicle->id?>/1" style="width: 100%; height: 1000px;"></iframe>
    <hr />
    <br />
    <?=$upload_dropzone?>
    <hr />
    <br />
</div>
<?php else: ?>
<p>Please save the vehicle before uploading images and files.</p>
<?php endif; ?>


