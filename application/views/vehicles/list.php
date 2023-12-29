<div id='content-top'>
    <h2><?=lang('web_list_of', array(':name' => 'Vehicles'))?></h2>

    <a href='/admin/vehicles/create/<?=$page?>' class='bcreate'><?=lang('web_create_t', array(':name' => 'vehicle'))?></a>
    <a href='/admin/vehicles/import' class='bbutton'>Import From Automanager</a>

    <span class='clearFix'>&nbsp;</span>
</div>
<div>
    <?=form_open('/admin/vehicles', array('id' => 'search', 'class' => 'pure-form', 'method' => 'post'))?>
        <?=form_input(array(
            'name' => 'query',
            'id' => 'search-query',
            'value' => set_value('search_query'),
            'placeholder' => 'What RV are you looking for?',
            'class' => 'pure-u-2-3'
        ))?>
        <?=form_input(array(
            'name' => 'search',
            'type' => 'submit',
            'id' => 'search-submit',
            'value' => 'Search',
            'class' => 'yellow-button pure-button pure-button-primary'
        ))?>
        <div id="advanced-search">
            <?=form_fieldset('Advanced Search')?>
                <span class="form-sec">
                    <?=form_radio('condition', 'new', false)?>
                    <?=form_label('New', 'condition')?>
                    <?=form_radio('condition', 'used', false)?>
                    <?=form_label('Used', 'condition')?>
                    <?=form_radio('condition', 'both', true)?>
                    <?=form_label('Both', 'condition')?>
                </span>
                <br>
                <span class="form-sec">
                    <?=form_label('Category', 'category')?>
                    <?=form_dropdown('category', array('' => 'All') + $this->categories)?>
                </span>
                <span class="form-sec">
                    <?=form_label('Status', 'status_id')?>
                    <?=form_dropdown('status_id', array('' => 'All') + $statuses)?>
                </span>
                <span class="form-sec">
                    <?=form_label('Year', 'year')?>
                    <?=form_dropdown('year', array('' => 'All') + $this->years)?>
                    <?=form_label('Make', 'make')?>
                    <?=form_dropdown('make', array('' => 'All') + $this->makes)?>
                    <?=form_label('Price', 'price')?>
                    <?=form_dropdown('price', array(
                        '>0' => 'Any Price',
                        '0-50000' => 'Under $50,000',
                        '50001-100000' => '$50,001-$100,000',
                        '100001-150000' => '$100,001-$150,000',
                        '150001-200000' => '$150,001-$200,000',
                        '200001-250000' => '$200,001-$250,000',
                        '250000' => '$250,001 and Higher'
                    ))?>
                </span>
                <span class="form-sec">
                    <?=form_label('Length', 'length')?>
                    <?=form_dropdown('length', array(
                        '>0' => '',
                        '<31' => "30' and under",
                        '31-33' => "31' to 33'",
                        '34-36' => "34' to 36'",
                        '37-38' => "37' to 38'",
                        '39-40' => "39' to 40''",
                        '>40' => "Over 40'"
                    ))?>
                </span>
                <span class="form-sec">
                    <?=form_input(array(
                        'name' => 'advanced-search',
                        'type' => 'submit',
                        'id' => 'advanced-search-submit',
                        'value' => 'Search',
                        'class' => 'yellow-button pure-button pure-button-primary'
                    ))?>
                </span>
            <?=form_fieldset_close()?>
        </div>
        <div class="arrow-down">
        </div>
    <?=form_close()?>
</div>

<?php if ($vehicles): ?>

<div class='clear'></div>

	<table class='ftable' cellpadding='5' cellspacing='5'>

		<thead>
			<th>Item #</th>
			<th>Featured</th>
			<th>Status</th>
			<th>Year</th>
			<th>Make</th>
			<th>Model</th>
			<th>Asking Price</th>
			<th data-low-hide>Sale Price</th>
			<th>Floor Plan</th>
			<th>Mileage</th>
			<th colspan='2'><?=lang('web_options')?></th>
		</thead>

		<tbody>
			<?php foreach ($vehicles as $vehicle): ?>

				<tr class="vehicle" data-id="<?=$vehicle->id?>">
					<td><?=$vehicle->item_number;?></td>
					<td ><?=($vehicle->featured_special == '1'? '&#10004;': '');?></td>
					<td><?=form_dropdown('status_id', $statuses, $vehicle->status_id)?></td>
					<td><?=$vehicle->year;?></td>
					<td><?=$vehicle->make;?></td>
					<td><?=$vehicle->model;?></td>
					<td>$<?=number_format($vehicle->asking_price, 2);?></td>
					<td data-low-hide>$<?=number_format($vehicle->sale_price, 2);?></td>
					<td ><?=$vehicle->model_number;?></td>
					<td><?=$vehicle->mileage;?></td>
					<td width='60'><a class='ledit' href='/admin/vehicles/edit/<?=$vehicle->id?>/<?=$page?>'><?=lang('web_edit')?></a></td>
					<td width='60'><a data-low-hide class='ldelete' onClick="return confirm('<?=lang('web_confirm_delete')?>')" href='/admin/vehicles/delete/<?=$vehicle->id?>/<?=$page?>'><?=lang('web_delete')?></a></td>
				</tr>

			<?php endforeach ?>
		</tbody>

	</table>

	<?php echo $links; ?>

<?php else: ?>

	<p class='text'><?=lang('web_no_elements');?></p>

<?php endif ?>
