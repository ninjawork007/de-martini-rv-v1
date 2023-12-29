<h3><?=$vehicle->model_number?></h3>
<?php if(!empty($vehicle->floor_plan)): ?>
    <?php if(!empty($vehicle->floor_plan->image_url)): ?>
        <img src="<?=$vehicle->floor_plan->image_url?>" alt="<?=$vehicle->tagline?> Floor Plan" />
    <?php elseif(!empty($vehicle->floor_plan->pdf_url)): ?>
        <iframe src="<?=$vehicle->floor_plan->pdf_url?>" width="100%" height="1000px"></iframe>
    <?php else: ?>
        <a href="<?=$vehicle->floor_plan->upload_url?>" title="<?=$vehicle->tagline?> Floor Plan" class="simple-button pure-button">Floor Plan</a>
    <?php endif; ?>
<?php endif; ?>
<?php if($vehicle->uploads): ?>
<?php foreach($vehicle->uploads as $upload): ?>
    <?php if($upload->name === 'floor_plan'): ?>
        <?php if(!empty($upload->image_url)): ?>
            <img src="<?=$upload->image_url?>" alt="<?=$vehicle->tagline?> Floor Plan" />
        <?php elseif(!empty($upload->pdf_url)): ?>
        <iframe src="<?=$upload->pdf_url?>" width="100%" height="1000px"></iframe>
        <?php else: ?>
            <a href="<?=$upload->upload_url?>" title="<?=$vehicle->tagline?> Floor Plan" class="simple-button pure-button">Floor Plan</a>
        <?php endif; ?>
    <?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>