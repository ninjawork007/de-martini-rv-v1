<script type='text/javascript'>

	$(document).ready(function(){

		CKEDITOR.replace( 'testimonial', {language: '<?=$this->config->item('prefix_language')?>',filebrowserUploadUrl : "/admin/admin/ckeditor/"});

		$('#submit').click(function() {

			CKEDITOR.instances.testimonial.updateElement();

			return true;

		});

	});

</script>

<script src="js/datepicker/jquery.ui.datepicker-<?=$this->config->item('prefix_language')?>.js" type="text/javascript"></script>
<script>
	$(function() {
		$.datepicker.setDefaults($.datepicker.regional['<?=$this->config->item('prefix_language')?>']);
		$('.datepicker').datepicker({dateFormat: 'dd-mm-yy'});
	});
</script>

<div id='content-top'>
    <h2><?=($updType == 'create') ? lang('web_create_t', array(':name' => 'testimonial')) : lang('web_edit_t', array(':name' => 'testimonial'));?></h2>
    <a href='/admin/testimonials/<?=$page?>' class='bforward'><?=lang('web_back_to_list')?></a>
    <span class='clearFix'>&nbsp;</span>
</div>

<?php 
$attributes = array('class' => 'tform', 'id' => '');
echo ($updType == 'create') ? form_open_multipart('/admin/testimonials/create', $attributes) : form_open_multipart('/admin/testimonials/edit', $attributes); 
?>

<p>
	<label class='labelform' for='testimonial'>Testimonial <span class='required'>*</span></label>
	<textarea id="testimonial"  name="testimonial"  /><?php echo set_value('testimonial', (isset($testimonial->testimonial)) ? htmlspecialchars_decode($testimonial->testimonial) : ''); ?></textarea>
	<?php echo form_error('testimonial'); ?>
</p>

<p>
	<label class='labelform' for='display_date'>Display_date <span class='required'>*</span></label>
	<input id='display_date' type='text' name='display_date' maxlength='' class='datepicker' value="<?php echo set_value('display_date', (isset($testimonial->display_date)) ? $testimonial->display_date->format('d-m-Y') : ''); ?>"  />
	<?php echo form_error('display_date'); ?>
</p>

<p>
	<label class='labelform' for='citation'>Citation <span class='required'>*</span></label>
	<input id='citation' type='text' name='citation' maxlength='255' value="<?php echo set_value('citation', (isset($testimonial->citation)) ? $testimonial->citation : ''); ?>"  />
	<?php echo form_error('citation'); ?>
</p>

<p>
	<label class='labelform' for='location'>Location <span class='required'>*</span></label>
	<input id='location' type='text' name='location' maxlength='255' value="<?php echo set_value('location', (isset($testimonial->location)) ? $testimonial->location : ''); ?>"  />
	<?php echo form_error('location'); ?>
</p>

<p>
	<input id='active' type='checkbox' name='active' value='1' <?=preset_checkbox('active', '1', (isset($testimonial->active)) ? $testimonial->active : ''  )?> />&nbsp;<label class='labelforminline' for='active'>Is Active? </label>
	<?php echo form_error('active'); ?>
</p>

<p>
    <?php echo form_submit( 'submit', ($updType == 'edit') ? lang('web_edit') : lang('web_add'), (($updType == 'create') ? "id='submit' class='bcreateform'" : "id='submit' class='beditform'")); ?>
</p>

<?=form_hidden('page',set_value('page', $page)) ?>

<?php if ($updType == 'edit'): ?>
	<?=form_hidden('id',$testimonial->id) ?>
<?php endif ?>

<?php echo form_close(); ?>