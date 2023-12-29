<div class="title-box">
    <h1><?=$title?></h1>
    <?=form_open($this->uri->uri_string(), array('id' => 'sort-by-form', 'class' => 'pure-form'))?>
    <?=form_label('Sort By:', 'sort_by')?>
    <?=form_dropdown('sort_by', array(
        'created_at DESC' => 'Recent',
        'sale_price DESC' => 'Price High to Low',
        'sale_price ASC' => 'Price Low to High',
        'length DESC' => 'Length Long to Short',
        'length ASC' => 'Length Short to Long',
        'make ASC' => 'Make A-Z',
        'make DESC' => 'Make Z-A',
    ), set_value('sort_by', $this->input->get_post('sort_by') ? $this->input->get_post('sort_by') : 'created_at DESC'))?>
    <?=form_close()?>
</div>
<div class="pure-g">
    <div class="pure-u-1-4">
        <div class="column">
            <div class="categories-box pure-menu pure-menu-open">
                <?php if($this->uri->segment(3) == 'new' || $this->uri->segment(2) == 'model_new' || $this->uri->segment(2) == 'web_specials'): ?>
                    <h3 class="tiled-header">Shop by Brand</h3>
                   <ul>
                       <li><strong><a href="<?=base_url()?>categories/new_rvs/90/class-a-diesel" title="">High Line Diesel Pushers</a></strong></li>
					   <li><a href="<?=base_url()?>categories/model_new/newmar-king-aire" title="Newmar King Aire">Newmar King Aire</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/newmar-london-aire" title="Newmar London Aire">Newmar London Aire</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/newmar-mountain-aire" title="Newmar Mountain Aire">Newmar Mountain Aire</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/newmar-new-aire" title="Newmar New Aire">Newmar New Aire</a></li>
                      <li><a href="<?=base_url()?>categories/model_new/newmar-dutch-star" title="Newmar Dutch Star">Newmar Dutch Star</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/newmar-ventana" title="Newmar Ventana">Newmar Ventana</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/forest-river-berkshire" title="Forest River Berkshire">Forest River Berkshire</a></li>
                       <li><a href="<?=base_url()?>categories/model_new/thor-tuscany" title="Thor Tuscany">Thor Tuscany</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/thor-venetian" title="Thor Venetian">Thor Venetian</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/thor-aria" title="Thor Aria">Thor Aria</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/monaco-diplomat" title="Monaco Diplomat">Monaco Diplomat</a></li>
                   </ul>
                   <ul>
                       <li><strong><a href="<?=base_url()?>categories/new_rvs/90/class-a-diesel" title="">Diesel Motorhomes</a></strong></li>
					   <li><a href="<?=base_url()?>categories/model_new/newmar-kountry-star" title="Newmar Kountry Star">Newmar Kountry Star</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/coachmen-sportscoach" title="Coachmen Sportscoach">Coachmen Sportscoach</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/thor-palazzo" title="Thor Palazzo">Thor Palazzo</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/newmar-super-star" title="Newmar Super Star">Newmar Super Star Super C</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/dynamax-dynaquest" title="Dynamax Dynaquest">Dynamax Dynaquest Super C</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/dynamax-DX3" title="Dynamax DX3">Dynamax DX3 Super C</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/dynamax-europa" title="Dynamax Europa">Dynamax Europa Super C</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/dynamax-force" title="Dynamax Force">Dynamax Force Super C</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/dynamax-isata-5" title="Dynamax Isata 5">Dynamax Isata 5</a></li>
                          <li><a href="<?=base_url()?>categories/model_new/dynamax-isata-3" title="Dynamax Isata 3">Dynamax Isata 3</a></li>
                            <li><a href="<?=base_url()?>categories/model_new/jayco-seneca" title="Jayco Seneca">Jayco Seneca Super C</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/forest-river-forester" title="Forest River Forester MBS">Forest River Forester MBS</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/roadtrek" title="Roadtrek">Roadtrek</a></li>
                    	  <li><a href="<?=base_url()?>categories/model_new/thor-omni" title="Thor Omni">Thor Omni Super C</a></li>
                   </ul>
                   <ul>
                       <li><strong><a href="<?=base_url()?>categories/new_rvs/98/class-a-gas" title="">Class A Motorhomes</a></strong></li>
                    	<li><a href="<?=base_url()?>categories/model_new/forest-river-georgetown" title="Forest River Georgetown">Forest River Georgetown</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/forest-river-fr3" title="Forest River FR3">Forest River FR3</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/newmar-canyon-star" title="Newmar Canyon Star">Newmar Canyon Star</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/newmar-bay-star" title="Newmar Bay Star">Newmar Bay Star</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/newmar-bay-star-sport" title="Newmar Bay Star Sport">Newmar Bay Star Sport</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/thor-outlaw" title="Thor Outlaw">Thor Outlaw</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/thor-windsport" title="Thor Windsport">Thor Windsport</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/thor-vegas" title="Thor Vegas">Thor Vegas</a></li>
                   </ul>
                   <ul>
                       <li><strong><a href="<?=base_url()?>categories/new_rvs/99/class-b-and-c" title="">Class B & C Motorhomes</a></strong></li>
					   <li><a href="<?=base_url()?>categories/model_new/newmar-super-star" title="Newmar Super Star">Newmar Super Star Super C</a></li>
                       <li><a href="<?=base_url()?>categories/model_new/dynamax-dynaquest" title="Dynamax Dynaquest">Dynamax Dynaquest Super C</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/dynamax-DX3" title="Dynamax DX3">Dynamax DX3 Super C</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/dynamax-europa" title="Dynamax Europa">Dynamax Europa Super C</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/dynamax-force" title="Dynamax Force">Dynamax Force Super C</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/dynamax-isata" title="Dynamax Isata">Dynamax Isata</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/forest-river-forester" title="Forest River Forester MBS">Forest River Forester MBS</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/jayco-greyhawk" title="Jayco Greyhawk">Jayco Greyhawk</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/jayco-melbourne" title="Jayco Melbourne">Jayco Melbourne</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/jayco-redhawk" title="Jayco Redhawk">Jayco Redhawk</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/jayco-seneca" title="Jayco Seneca">Jayco Seneca Super C</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/roadtrek" title="Roadtrek">Roadtrek</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/coachmen-concord" title="Coachmen Concord">Coachmen Concord</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/forest-river-forester" title="Forest River Forester">Forest River Forester</a></li>
                   		<li><a href="<?=base_url()?>categories/model_new/thor-chateau" title="Thor Chateau">Thor Chateau</a></li>
                   		<li><a href="<?=base_url()?>categories/model_new/thor-omni" title="Thor Omni">Thor Omni Super C</a></li>
                   </ul>
                   <ul>
                       <li><strong><a href="<?=base_url()?>categories/new_rvs/103/toyhaulers" title="">Toyhaulers</a></strong></li>
                    	<li><a href="<?=base_url()?>categories/model_new/thor-outlaw" title="Thor Outlaw">Thor Outlaw</a></li>
                    
                   </ul>
                   <ul>
                   		<li><strong><a href="<?=base_url()?>categories/new_rvs/100/fith-wheels-and-trailers" title="">Fifth Wheels & Trailers</a></strong></li>
					    <li><a href="<?=base_url()?>categories/model_new/salem" title="Salem Hemisphere">Salem Hemisphere</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/forest-river-surveyor" title="Forest River Surveyor">Forest River Surveyor</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/Forest-River-r_pod" title="Forest River R-Pod">Forest River R-Pod</a></li>
                   </ul>
                    <ul>
                    	<li><strong><a href="<?=base_url()?>categories/new_rvs/102/park-homes" title="">Park Homes</a></strong></li>
                    	<li><a href="<?=base_url()?>categories/model_new/palm-harbor" title="Palm Harbor">Palm Harbor</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/skyline" title="Skyline">Skyline</a></li>
                    </ul>
                <?php else: ?>
                <h3 class="tiled-header">Shop by Category</h3>
                <ul>
                    <?php foreach($this->categories as $id => $name): ?>
                    <li><a href="<?=base_url()?>categories/all/<?=$id?>/<?=generate_seo_link($name)?>"><?=$name?></a></li>
                    <?php endforeach; ?>
                    <li><a href="<?=base_url()?>categories/">List All Inventory</a></li>
                </ul>
                <?php endif; ?>
            </div>
            <a href="https://gateway.appone.net/onlineapp/demartinirv" target="_blank" class="credit-app yellow-button pure-button">Submit Credit App</a>
            <div class="info-box">
                <h3 class="tiled-header">Make An Offer!</h3>
                <ul>
                    <li>Click the Make An Offer button</li>
                    <li>On the form, just enter a price that’ll work for you and we’ll get back to you as soon as possible and let you know if we are willing to sell you that coach at your price or we may give you a counter-offer.</li>
                    <li>Offers are not binding until we mutually agree upon price, terms and conditions between customer and dealership and a contract is signed.</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="pure-u-3-4">
        <div class="cat-vehicles">
            <?php if($vehicles): ?>
                <?php foreach($vehicles as $item): ?>
                    <div class="vehicle">
                        <div class="photo">
                            <a href="<?=$item->detail_url?>" title="Go to Big Picture">
                    	        <div class="center-block" style="width: 205px;">
                        	        <img src="/public/img/sold.png" data-status="<?=$item->status_id?>" class="<?=$item->status_id == 5 ? 'img-sold' : 'hidden'?>">
                                    <img src="/public/img/salependingsmall.png" data-status="<?=$item->status_id?>" class="<?=$item->status_id == 6 ? 'img-sold' : 'hidden'?>">
									<img src="/public/img/arrivingsoonsmall.png" data-status="<?=$item->status_id?>" class="<?=$item->status_id == 7 ? 'img-sold' : 'hidden'?>">
                                    <img src="<?=($item->images) ? '/public/uploads/images/img/thumbs/' . $item->images[0]->image : $item->no_image_thumb?>" alt="<?=$item->title?>" width="205px" />
                    	        </div>
                            </a>
                        </div>
                        <div class="info">
                            <h2><a href="<?=$item->detail_url?>" title="<?=$item->tagline?>"><?=$item->tagline?></a></h2>
                            <p><strong>Stock #<?=$item->item_number?></strong> <?=word_limiter(html_entity_decode($item->description), 40)?></p>
                            <div class="price-info">
                                <?php if($item->vehicle_condition == 'new'): ?>
                                    <span class="price dark-grey small">Retail MSRP: $<strike><?=number_format($item->asking_price)?></strike></span>
                                    <?php if(!empty($item->map_price)): ?>
                                        <br /><span class="price dark-grey small">MAP Price: $<strike><?=number_format($item->map_price)?></strike></span>
                                    <?php endif; ?>
                                    <?php if(!empty($item->sale_price)): ?>
                                        <span class="price red attention">Special Sale Only - $<?=number_format($item->sale_price, 0)?>!</span>
                                    <?php else: ?>
                                        <span class="price purple attention">Make an Offer!</span>
                                    <?php endif; ?>
                                    <div class="attention">For this week's lowest price, <a href="mailto:sales@demartini.com?subject=Item <?=$item->item_number?> <?=$item->tagline?>&body=Just press 'Send' and we'll reply with this week's lowest price on this coach!" title="Lowest Prices on <?=$item->tagline?>">Click Here</a> </div>
                                    <div class="buttons">
                                        <a href="<?=site_url('/forms/offerform/' . $item->id)?>" title="Make an Offer" class="simple-button pure-button">Make an offer!</a>
                                <?php else: ?>
                                   <?php if(!empty($item->sale_price) && $item->asking_price > $item->sale_price): ?>
                                        <span class="price dark-grey">Sale Price - $<strike><?=number_format($item->asking_price, 0)?></strike></span>
                                        <span class="price red attention">Reduced - Only $<?=number_format($item->sale_price, 0)?>!</span>
                                    <?php else: ?>
                                        <span class="price purple attention">Sale Price - $<?=number_format($item->asking_price, 0)?></span>
                                    <?php endif; ?>
                                    <div class="buttons">
                                        <a href="<?=site_url('/forms/bidform/' . $item->id)?>" title="Submit Bid form" class="simple-button pure-button">Submit a Bid</a>
                                <?php endif; ?>
                                   <a href="<?=$item->detail_url?>" title="<?=$item->tagline?>" class="right yellow-button pure-button">SEE DETAILS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?=$links?>
            <?php else: ?>
                <p class='text'>No Vehicles Found</p>
            <?php endif; ?>
        </div>
    <div>
</div>
