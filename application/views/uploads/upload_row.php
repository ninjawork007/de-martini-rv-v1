<tr data-id="<?=$upload->id?>" style="background-color: #f1f1f1;">
    <td>
        <?php if(isset($type) && $type == 'new'): ?>
        <input type="hidden" name="new_upload_id[]" value="<?php echo $upload->id; ?>" />
        <?php endif; ?>
        <?php if($upload->image_url): ?>
        <img src="<?=$upload->image_url?>" alt="<?=$upload->name?>"/>
        <?php endif; ?>
    </td>
	<td><?=form_dropdown('uploads_name_' . $upload->id, array(
	        'document' => 'Generic Document',
	        'floor_plan' => 'Floor Plan',
	        'brochure' => 'Brochure',
	        'msrp' => 'MSRP Sheet'
        ), $upload->name)?>
    </td>
    <td><?php echo $upload->upload_url; ?></td>
    <td>
		<button class="pure-button save-upload" onclick="return false;"></span><?php echo "Save Upload"; ?></button><br />
		<button class="pure-button delete-upload" onclick="return false;">
			<?php echo "Delete Upload"; ?>
		</button>
	<td>
</tr>