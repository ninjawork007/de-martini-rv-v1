<div class="pure-g-r">
	<div class="pure-u-2-3">
		<div class="special-box">
			<h2>Lowest Prices</h2>
			<p>DeMartini RV Sales has the lowest prices on in-stock and specially ordered coaches. We deal in high volume so we can get you the best prices.</p>
			<h2>Excellent Service</h2>
			<p>We treat every customer with integrity, honesty, plus old-fashioned service and expertise. Our staff and management are knowledgeable and experienced, and we have a friendly, respectful sales staff - with no high pressure.</p>
			<h2>A Family Run Business</h2>
			<p>The owner, Tim DeMartini, has been in business since 1974. Many members of the family work at the dealership along with a great crew of employees. Together, we strive for excellence, honesty, and superb service. </p> 
		</div>
		<div class="special-box">
			 <h2>NEW! 2024 Dynamax Europa 31SS</h2> 
            <h3>Check out all the new features and selling points on the SHORTEST Super C! </h3>
			<iframe class="youtube-player" type="text/html" width="600" height="374" style="max-width:100%;" src="https://www.youtube.com/embed/06i47oIU4yE?si=HYum2iH7Z7SK8mky?rel=0" allowfullscreen frameborder="0"></iframe>	
		</div>
		<div class="special-box">
		<h2 class="blue">Featured Video</h2>
			<h2>NEW! 2023 Newmar Dutch Star 4369</h2> 
            <h3>See what's new in the best selling luxury diesel RV!  Full Walk through Video!</h3>
			<iframe class="youtube-player" type="text/html" width="600" height="374" style="max-width:100%;" src="https://www.youtube.com/embed/E__ttPhv8og?rel=0" allowfullscreen frameborder="0"></iframe>
		
         	
          <p>Subscribe to our <a href="http://youtube.com/demartinirv?sub_confirmation=1" style="font-weight:bold;">YouTube Channel </a>to see more videos!</p>
		</div>
	</div>	
	<div class="pure-u-1-3">
		<div class="special-box text-center">
	        <?php if(!empty($this->specials)):  ?>
    			<span class="title-button">Featured Special</span>
                <?php $k = array_rand($this->specials);
                    if(isset($this->specials[$k]))
                        $item = $this->specials[$k]; 
                ?>
                <span class="special-title"><a href="<?=$item->detail_url?>" title="<?=$item->tagline?>"><?=$item->tagline?></a></span>
                <a href="<?=$item->detail_url?>" title="<?=$item->tagline?>">
        			<img src="<?=($item->images) ? '/public/uploads/images/img/thumbs/' . $item->images[0]->image : $item->no_image_thumb?>" alt="<?=$item->tagline?>" width="250" />
                </a>
                <strong><?=$item->short_description?></strong>
                <p>
    			<?php if($item->vehicle_condition == 'new'): ?>
                    <strong class="blue">MSRP:</strong> $<strike><?=number_format($item->asking_price)?></strike>
                <?php else: ?>
                      <?php if(!empty($item->sale_price) && $item->asking_price > $item->sale_price): ?>
                        <strong class="blue">Price:</strong> $<strike><?=number_format($item->asking_price, 0)?></strike></span></br>
                        <strong class="price red attention">Reduced - Only $<?=number_format($item->sale_price, 0)?>!</strong>
                    <?php else: ?>
                        <strong class="blue">Price:</strong> $<?=number_format($item->asking_price, 0)?></span>
                    <?php endif; ?>

                <?php endif; ?>
                </p>
    			<a href="mailto:sales@demartini.com?subject=<?='Request Sale Price: ' . $item->item_number?>&body=<?=$item->tagline?>" title="Get Sale Price" class="yellow-button pure-u-2-1 pure-button" style="color: #CC33FF; font-size: 20px; font-weight: bold;">Get Sale Price</a>
            <?php endif; ?>
				
		</div>
		<h3 class="oswald-text">See where our customers come from...</h3>
		<a href= <?=site_url ('/details/salesmap/')?> title="Sales Map">
		<IMG src="../../../public/img/salesmapsmall.png" width="300px"/></a>
       <a href="https://gateway.appone.net/onlineapp/demartinirv" target="_blank" class="credit-app yellow-button pure-button">Submit Credit App</a>
        <div class="categories-box pure-menu pure-menu-open" style="width: 300px; margin: 10px;">
			<h3 class="tiled-header">Shop by Category</h3>
			<ul>
				<?php foreach($this->categories as $id => $name): ?>
				<li><a href="<?=base_url()?>categories/all/<?=$id?>/<?=generate_seo_link($name)?>"><?=$name?></a></li>
				<?php endforeach; ?>
				<li><a href="<?=base_url()?>categories/">List All Inventory</a></li>
			</ul>
		</div>
	</div>

</div>
