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
    <h2><?=($updType == 'create') ? lang('web_create_t', array(':name' => 'form')) : lang('web_edit_t', array(':name' => 'Form'));?></h2>
    <a href='/admin/forms/<?=$page?>' class='bforward'><?=lang('web_back_to_list')?></a>
    <span class='clearFix'>&nbsp;</span>
</div>

<?php 
$attributes = array('class' => 'tform', 'id' => '');
echo ($updType == 'create') ? form_open_multipart('/admin/forms/create', $attributes) : form_open_multipart('/admin/forms/edit', $attributes); 
?>

<p>
	<label class='labelform' for='name'>Name </label>
	<input id='name' type='text' name='name' maxlength='60' value="<?php echo set_value('name', (isset($form->name)) ? $form->name : ''); ?>"  />
	<?php echo form_error('name'); ?>
</p>

<p>
	<label class='labelform' for='to_emails'>To Emails <span class='required'>*</span> (Separated by Commas)</label>
	<textarea id="to_emails"  name="to_emails"  /><?php echo set_value('to_emails', (isset($form->to_emails)) ? htmlspecialchars_decode($form->to_emails) : ''); ?></textarea>
	<?php echo form_error('to_emails'); ?>
</p>

<p>
	<label class='labelform' for='cc_emails'>CC Emails <span class='required'>*</span> (Separated by Commas)</label>
	<textarea id="cc_emails"  name="cc_emails"  /><?php echo set_value('cc_emails', (isset($form->cc_emails)) ? htmlspecialchars_decode($form->cc_emails) : ''); ?></textarea>
	<?php echo form_error('cc_emails'); ?>
</p>

<p>
	<input id='send_copy_to_customer'  checked type='checkbox' name='send_copy_to_customer' value='1' <?=preset_checkbox('send_copy_to_customer', '1', (isset($form->send_copy_to_customer)) ? $form->send_copy_to_customer : ''  )?> />&nbsp;<label class='labelforminline' for='send_copy_to_customer'>Send Copy To Customer <span class='required'>*</span></label>
	<?php echo form_error('send_copy_to_customer'); ?>
</p>

<p>
	<label class='labelform' for='description'>Description </label>
	<textarea id="description"  name="description"  /><?php echo set_value('description', (isset($form->description)) ? htmlspecialchars_decode($form->description) : ''); ?></textarea>
	<?php echo form_error('description'); ?>
</p>

<p>
    <?php if ($updType == 'edit'): ?>
        <iframe src="<?=base_url()?>admin/form_fields/index/1/<?=$form->id?>" width="950px" height="500px" style="border: 1px solid black; padding: 10px;"></iframe>
    <?php else: ?>
        Save the form before adding the Form Fields.
    <?php endif; ?>
</p>

<p>
    <input type="hidden" value="<?php echo md5(date('m.d.y')); ?>" name="xx_token" />
    <?php echo form_submit( 'submit', ($updType == 'edit') ? lang('web_edit') : lang('web_add'), (($updType == 'create') ? "id='submit' class='bcreateform'" : "id='submit' class='beditform'")); ?>
</p>

<?=form_hidden('page',set_value('page', $page)) ?>

<?php if ($updType == 'edit'): ?>
	<?=form_hidden('id',$form->id) ?>
<?php endif ?>

<?php echo form_close(); ?>