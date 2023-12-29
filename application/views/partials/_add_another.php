<div class="row">
	<label class='labelform' for='<?=$field?>'><?=$label?></label>
	<?php foreach ($all as $item): ?>
		<input class='item_to_add' type="<?php if(isset($type)): echo $type; else: echo 'checkbox'; endif; ?>" name="<?=$field?>[]" value="<?=$item->id?>" <?php if(does_id_exist($item->id, $existing)): ?>checked="checked"<?php endif;?> ><label><?=$item->name?></label><br />
	<?php endforeach ?>
	<input class='item_template' type="<?php if(isset($type)): echo $type; else: echo 'checkbox'; endif; ?>" style="display: none;" value="">
	<div class="add_more_here"></div>
	<input type="text" class="add_another_by_name" data-model="<?=$model?>" value="" data-field="<?=$field?>" placeholder="Enter Name" />
	<button type="button" class="add_another pure-button" >Add</span>
	<?php echo form_error($field); ?>
</div>
