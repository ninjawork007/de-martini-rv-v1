<h3>Brochures</h3>
<?php foreach($vehicle->uploads as $upload): ?>
    <?php if($upload->name === 'brochure'): ?>
        <?php if(!empty($upload->image_url)): ?>
            <img src="<?=$upload->image_url?>" alt="<?=$vehicle->tagline?> Brochure" />
        <?php elseif(!empty($upload->pdf_url)): ?>
        <a href="<?=$upload->pdf_url?>" class="simple-button pure-button" download="Brochure.pdf">Download Brochure</a>
        <?php else: ?>
            <a href="<?=$upload->upload_url?>" title="<?=$vehicle->tagline?> Brochure" class="simple-button pure-button">Brochure</a>
        <?php endif; ?>
    <?php endif; ?>
<?php endforeach; ?>
