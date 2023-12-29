<div class="title-box">
	<h2><?=$vehicle->tagline?><small class="stock-number">Stock #: <?=$vehicle->item_number?></small></h2>
</div>
<div class="vehicle pure-g-r">
    <div class="padding10">
    	<div class="pure-u-2-3">
    	     <!-- Front Image Area -->
    	     <?php if($vehicle->images): ?>
    	    <a href="<?=current_url()?>#img-<?=$vehicle->images[0]->id?>" title="Go to Big Picture">
    	        <div class="center-block" style="width: 580px;">
        	        <img src="/public/img/sold580.png" class="<?=$vehicle->status_id == 5 ? 'img-sold-580' : 'hidden'?>">
                    <img src="/public/img/salepending580.png" class="<?=$vehicle->status_id == 6 ? 'img-sold-580' : 'hidden'?>">
					<img src="/public/img/arrivingsoon580.png" class="<?=$vehicle->status_id == 7 ? 'img-sold-580' : 'hidden'?>">
                    <img src="<?=($vehicle->images) ? '/public/uploads/images/img/' . $vehicle->images[0]->image : $vehicle->no_image?>" alt="<?=$vehicle->title?>" width="580px" />
    	        </div>
            </a>
            <?php else: ?>
    	        <div class="center-block" style="width: 580px;">
                    <img src="/public/img/sold580.png" class="<?=$vehicle->status_id == 5 ? 'img-sold-580' : 'hidden'?>">
                    <img src="/public/img/salepending580.png" class="<?=$vehicle->status_id == 6 ? 'img-sold-580' : 'hidden'?>">
					<img src="/public/img/arrivingsoon580.png" class="<?=$vehicle->status_id == 7 ? 'img-sold-580' : 'hidden'?>">
                    <img src="<?=$vehicle->no_image?>" alt="<?=$vehicle->title?>" width="580px" />
    	        </div>
            <?php endif; ?>
    	    <br>
    	    <div class="list-thumbs">
        	    <?php foreach(array_slice($vehicle->images, 1, 12) as $i => $img): ?>
                    <a href="<?=current_url()?>#img-<?=$img->id?>" title="Go to Big Picture"><img src="<?=($img) ? '/public/uploads/images/img/thumbs/' . $img->image : $vehicle->no_image_thumb?>" alt="<?=$vehicle->title?>" width="112px"/></a>
                <?php endforeach; ?>
    	    </div>
    	</div>
    	<div class="pure-u-1-3">
            <!-- Info Area -->
            <div class="price-info padding25top">
                <?php if($vehicle->vehicle_condition == 'new'): ?>
                    <span class="price grey oxygen caps">Retail MSRP: $<strike><?=number_format($vehicle->asking_price)?></strike></span>
                    <?php if(!empty($vehicle->map_price)): ?>
                       </br> <span class="price oxygen caps">Lowest Price We're Allowed to Advertise: $<strike><?=number_format($vehicle->map_price)?></strike></span>
                    <?php endif; ?>
                    <?php if(!empty($vehicle->sale_price)): ?>
                        <span class="price red big-font oxygen bold">Special Sale Only - $<?=number_format($vehicle->sale_price, 0)?></span>
                    <?php else: ?>
                        <span class="price purple bold">Make an Offer!</span>
                    <?php endif; ?>
                    <div class="bold">For this week's lowest price, <a href="mailto:sales@demartini.com?subject=Item <?=$vehicle->item_number?> <?=$vehicle->tagline?>&body=Just press 'Send' and we'll reply with this week's lowest price on this coach!" title="Lowest Prices on <?=$vehicle->tagline?>">Click Here</a> </div>
                    <div class="buttons">
                        <a href="<?=site_url('/forms/offerform/' . $vehicle->id)?>" title="Make an Offer" class="purple-button pure-button">Make an offer!</a>

                <?php else: ?>
                    <?php if(!empty($vehicle->sale_price) && $vehicle->asking_price > $vehicle->sale_price): ?>
                        <span class="price grey oxygen caps">Sale Price - $<strike><?=number_format($vehicle->asking_price, 0)?></strike></span>
                        <br />
                        <span class="price red big-font oxygen bold">Special Sale - Only $<?=number_format($vehicle->sale_price, 0)?>!</span>
                        <br />
                        <span class="price grey oxygen">Expires 12/31/23</span>
                    <?php else: ?>
                        <span class="price purple big-font oxygen caps">Sale Price - $<?=number_format($vehicle->asking_price, 0)?></span>
                    <?php endif; ?>
                    <div class="buttons">
                        <a href="<?=site_url('/forms/bidform/' . $vehicle->id)?>" title="Submit Bid form" class="purple-button pure-button">Submit a Bid</a>
                <?php endif; ?>

                <a href="mailto:?subject=<?='Check out this RV: ' . $vehicle->item_number?>&body=<?=$vehicle->tagline?>%0D%0AURL:<?=$vehicle->detail_url?>" class="simple-button pure-button" title="Request More Info">Send To Friend</a>
                <a href="mailto:sales@demartini.com" class="simple-button pure-button">Email Us</a>
                <a href="mailto:sales@demartini.com?subject=<?='Request More Info: ' . $vehicle->item_number?>&body=<?=$vehicle->tagline?>" class="simple-button pure-button" title="Request More Info">Request More Info</a>


            </div>
            <div class="summary-table">
                <table class="pure-table oxygen">
                    <thead>
                        <tr><th colspan="2" class="caps">Vehicle Summary</th></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="caps">Chassis</td>
                            <?php
                            $chassis = $vehicle->chassis ? $vehicle->chassis : false;
                            if(empty($chassis) && !empty($vehicle->model_specific->chassis)){
                                $chassis  = $vehicle->model_specific->chassis;
                            }
                            if(empty($chassis)){
                                $chassis = 'N/A';
                            }
                            ?>
                            <td class="bold"><?=($chassis)?>&nbsp;</td>
                        </tr>

                        <tr>
                            <td class="caps">Generator</td>
                            <td class="bold">
                                <?php
                                $generator_make = '';
                                $generator_kw = '';
                                $generator_type = '';

                                if(!empty($vehicle->model_specific->generator_make)) {
                                    $generator_make = $vehicle->model_specific->generator_make;
                                }
                                if(!empty($vehicle->model_specific->generator_kw)) {
                                    $generator_kw = $vehicle->model_specific->generator_kw;
                                }
                                if(!empty($vehicle->model_specific->generator_type)) {
                                    $generator_type = $vehicle->model_specific->generator_type;
                                }

                                if(!empty($vehicle->generator_make)) {
                                    $generator_make = $vehicle->generator_make;
                                }
                                if(!empty($vehicle->generator_kw)) {
                                    $generator_kw = $vehicle->generator_kw;
                                }
                                if(!empty($vehicle->generator_type)) {
                                    $generator_type = $vehicle->generator_type;
                                }

                                echo $generator_make;
                                echo !empty($generator_kw) ?  ' ' . $generator_kw . ' KW' : '';
                                echo !empty($generator_type) ?  ' ' . ucwords($generator_type) : '';

                                if(empty($generator_make)){
                                    echo $generator_make;
                                }

                            ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="caps">Engine</td>
                            <?php
                            $engine = $vehicle->engines ? $vehicle->engines[0]->name : false;
                            if(empty($engine) && !empty($vehicle->model_specific->engine)){
                                $engine  = $vehicle->model_specific->engine;
                            }
                            if(empty($engine)){
                                $engine = 'N/A';
                            }
                            ?>
                            <td class="bold"><?=($engine)?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="caps">Category</td>
                            <td class="bold"><?=$vehicle->category?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="caps">Mileage</td>
                            <td class="bold"><?=($vehicle->vehicle_condition == 'new' ? 'New' : number_format($vehicle->mileage, 0))?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="caps">Slide Out</td>
                            <td class="bold"><?=$vehicle->slide?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="caps">Fuel</td>
                            <td class="bold"><?=(!empty($vehicle->fuel_type) ? $vehicle->fuel_type : 'N/A')?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="caps">Condition</td>
                            <td class="bold"><?=ucwords(str_replace('_', ' ', $vehicle->vehicle_condition))?>&nbsp;</td>
                        </tr>
                        <?php if($vehicle->vehicle_condition == 'new'): ?>
                        <tr>
                            <td class="caps">Interior Color</td>
                            <td class="bold"><?=$vehicle->interior_color?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="caps">Exterior Color</td>
                            <td class="bold"><?=$vehicle->exterior_color?>&nbsp;</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
    	</div>
	</div>
	 <div class="pure-u-1">
    	<br>
    	<br>
        <!-- Tabs Area -->
        <div class="ui-tabs">
            <ul class="ui-tabs-nav">
                <?php foreach($tabs as $k => $t): ?>
                    <li><a href="#<?=$k?>"><?=$t['lbl']?></a></li>
                <?php endforeach; ?>
            </ul>
            <?php foreach($tabs as $k => $t): ?>
                <div id="<?=$k?>" class="ui-tabs-panel">
                     <?php if(is_array($t['val'])): ?>
                        <ul>
                            <?php foreach($t['val'] as $foo): ?>
                                <li><?=!empty($foo->name) ? $foo->name : ''?>?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p><?=html_entity_decode($t['val'])?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="pure-u-1">
    	<br>
        <!-- Images Area -->
        <?php foreach($vehicle->images as $img): ?>
            <img src="/public/uploads/images/img/<?=$img->image?>" id="img-<?=$img->id?>" alt="<?=$vehicle->title?>" width="100%"/>
            <br>
            <br>
        <?php endforeach; ?>
        <center>
        <p>*Price does not include sales tax or registration. Non-California residents are not subject to California sales tax or registration.</p>
			<p>**DeMartini RV Sales is not responsible for any typos or errors on our webpages.  We believe manufacturer supplied specifications on this site to be accurate at the time of posting. However, specifications, standard equipment, model availability, options, fabrics, and colors are subject to change without notice. Some vehicles may be pictured with equipment that is only available as an option at an extra cost or unavailable on some models.  You should confirm equipment and availability by speaking with a salesperson.</p>
            <button class="pure-button yellow-button" onclick="$('html, body').scrollTop(0);">Back to Top</button>
            <br>
            <br>
        </center>
    </div>
</div>
