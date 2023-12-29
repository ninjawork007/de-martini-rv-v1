<h3>MSRP Sheet</h3>
<?php foreach($vehicle->uploads as $upload): ?>
    <?php if($upload->name === 'msrp'): ?>
        <?php if(!empty($upload->image_url)): ?>
            <img src="<?=$upload->image_url?>" alt="<?=$vehicle->tagline?> MSRP Sheet" />
        <?php elseif(!empty($upload->pdf_url)): ?>
            <iframe src="<?=$upload->pdf_url?>" width="100%" height="1000px"></iframe>
        <?php else: ?>
            <a href="<?=$upload->upload_url?>" title="<?=$vehicle->tagline?> MSRP Sheet" class="simple-button pure-button">MSRP Sheet</a>
        <?php endif; ?>
    <?php endif; ?>
<?php endforeach; ?>