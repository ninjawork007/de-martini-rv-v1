<?php if(!empty($vehicle->model_specific->description)): ?>
    <p><?=$vehicle->model_specific->description?></p>
<?php endif; ?>
<?php if(empty($vehicle->hide_generator_hours) && !empty($vehicle->generator_hours)): ?>
    <br><div><strong>Generator Hours:</strong><?=$vehicle->generator_hours?></div><br>
<?php endif; ?>
<?php if($vehicle->exterior_equipments || $vehicle->exterior_equipments_c): ?>
    <h3>Exterior Equipment</h3>
    <ul>
        <?php foreach($vehicle->exterior_equipments as $item): ?>
            <li><?=$item->name?></li>
        <?php endforeach; ?>
        <?php foreach($vehicle->exterior_equipments_c as $item): ?>
            <li><?=$item->name?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<?php if($vehicle->interior_equipments || $vehicle->interior_equipments_c): ?>
    <h3>Interior Equipment</h3>
    <ul>
        <?php foreach($vehicle->interior_equipments as $item): ?>
            <li><?=$item->name?></li>
        <?php endforeach; ?>
        <?php foreach($vehicle->interior_equipments_c as $item): ?>
            <li><?=$item->name?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<?php if($vehicle->cockpit_options || $vehicle->cockpit_options_c): ?>
    <h3>Cockpit Options</h3>
    <ul>
        <?php foreach($vehicle->cockpit_options as $item): ?>
            <li><?=$item->name?></li>
        <?php endforeach; ?>
        <?php foreach($vehicle->cockpit_options_c as $item): ?>
            <li><?=$item->name?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<?php if($vehicle->bedroom_layouts || $vehicle->bedroom_layouts_c): ?>
    <h3>Bedroom Layout</h3>
    <ul>
        <?php foreach($vehicle->bedroom_layouts as $item): ?>
            <li><?=$item->name?></li>
        <?php endforeach; ?>
        <?php foreach($vehicle->bedroom_layouts_c as $item): ?>
            <li><?=$item->name?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<?php if($vehicle->flooring || $vehicle->flooring_c): ?>
    <h3>Dining/Flooring</h3>
    <ul>
        <?php foreach($vehicle->flooring as $item): ?>
            <li><?=$item->name?></li>
        <?php endforeach; ?>
        <?php foreach($vehicle->flooring_c as $item): ?>
            <li><?=$item->name?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<?php if($vehicle->furniture || $vehicle->furniture_c): ?>
    <h3>Furnitures</h3>
    <ul>
        <?php foreach($vehicle->furniture as $item): ?>
            <li><?=$item->name?></li>
        <?php endforeach; ?>
        <?php foreach($vehicle->furniture_c as $item): ?>
            <li><?=$item->name?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<?php if(!empty($vehicle->model_specific)): ?>
    <?php if(!empty($vehicle->model_specific->manufacture_url)): ?>
        <a href="<?=$vehicle->model_specific->manufacture_url?>" title="<?=$vehicle->tagline?> Manufacture URL" class="simple-button pure-button">Manufacture URL</a>
    <?php endif; ?>
    <?php if(!empty($vehicle->model_specific->manufacture_list)): ?>
        <a href="<?=$vehicle->model_specific->manufacture_list?>" title="<?=$vehicle->tagline?> Manufacture URL" class="simple-button pure-button">Manufacture Link</a>
    <?php endif; ?>
<?php endif; ?>
