<section class="footer-specials">
        <h3 class="tiled-header">RVs for Sale<small class="right"><a href="/categories" title="Shop all RV's for Sale" class="title-small">Shop all RV's for Sale</a></small></h3>
        <div class="pure-u-1-3">
            <?=form_open('/vehicles/search', array('id' => 'footer-search', 'class' => 'pure-form', 'method' => 'get'))?>
                    <?=form_fieldset('')?>
                        <span class="form-sec">
                            <?=form_radio('condition', 'new', false)?>
                            <?=form_label('New', 'condition')?>
                            <?=form_radio('condition', 'used', false)?>
                            <?=form_label('Used', 'condition')?>
                            <?=form_radio('condition', 'both', true)?>
                            <?=form_label('Both', 'condition')?>
                        </span>
                        <span class="form-sec">
                            <?=form_label('Category', 'category')?>
                            <?=form_dropdown('category', array('' => 'All') + $this->categories)?>
                        </span>
                        <span class="form-sec">
                            <?=form_label('Year', 'year')?>
                            <div class="right">
        						<?=form_dropdown('from_year', array('' => 'Any') + $this->years)?>
        						&nbsp;to&nbsp;
        						<?=form_dropdown('to_year', array('' => 'Any') + $this->years)?>
                            </div>
                        </span>
                        <span class="form-sec">
                            <?=form_label('Make', 'make')?>
                            <?=form_dropdown('make', array('' => 'All') + $this->makes)?>
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
                    <?=form_fieldset_close()?>
                    <?=form_input(array(
                        'name' => 'advanced-search',
                        'type' => 'submit',
                        'id' => 'search-submit',
                        'value' => 'Search',
                        'class' => 'yellow-button pure-u-1-3 pure-button pure-button-primary'
                    ))?>
            <?=form_close()?>
        </div>
        <div class="pure-u-2-3" style="width: 65.6667%;">
            <h3 class="footer-title"><strong>Featured Specials</strong> - <i>Check out these great deals!</i></h3>
            <div id="vehicle-specials">
                <?php if(!empty($this->specials)):  ?>
                    <?php foreach($this->specials as $item): ?>
                        <div class="slide vehicle">
                            <div class="photo">
                                <a href="<?=$item->detail_url?>" title="<?=$item->tagline?>">
                                    <img src="<?=($item->images) ? '/public/uploads/images/img/thumbs/' . $item->images[0]->image : $item->no_image_thumb?>" alt="<?=$item->tagline?>" width="205" />
                                </a>
                            </div>
                            <div class="info">
                                <h2><a href="<?=$item->detail_url?>" title="<?=$item->tagline?>"><?=$item->tagline?></a></h2>
                                <div class="price-info">
                                    <?php if($item->vehicle_condition == 'new'): ?>
                                        <span class="price small">Retail MSRP: $<strike><?=number_format($item->asking_price)?></strike></span>
                                        <?php if(!empty($item->map_price)): ?>
                                            <span class="price small">Minimum Asking Price: $<strike><?=number_format($item->map_price)?></strike></span>
                                        <?php endif; ?>
                                        <?php if(!empty($item->sale_price)): ?>
                                            <span class="price red attention">Special Sale Only - $<?=number_format($item->sale_price, 0)?></span>
                                        <?php else: ?>
                                            <span class="price purple attention">Make an Offer</span>
                                        <?php endif; ?>
                                        <div class="attention">For this week's lowest price, <a href="mailto:sales@demartini.com?subject=Item <?=$item->item_number?> <?=$item->tagline?>&body=Just press 'Send' and we'll reply with this week's lowest price on this coach!" title="Lowest Prices on <?=$item->tagline?>">Click Here</a> </div>
                                    <?php else: ?>
                                        <?php if(!empty($item->sale_price) && $item->asking_price > $item->sale_price): ?>
                                            <span class="price purple attention">Sale Price - $<strike><?=number_format($item->asking_price, 0)?></strike></span>
                                            <span class="price red attention">Reduced - Only $<?=number_format($item->sale_price, 0)?></span>
                                        <?php else: ?>
                                            <span class="price purple attention">Sale Price - $<?=number_format($item->asking_price, 0)?></span>
                                        <?php endif; ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
</section>

