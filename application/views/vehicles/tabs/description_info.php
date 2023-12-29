<p>
<?php if(!empty($vehicle->model_specific->description) && empty($vehicle->description)): ?>
<?=$vehicle->model_specific->description?>
<?php else: ?><?=$vehicle->description?>
<?php endif; ?>
<strong>VIN:</strong> <?=substr($vehicle->vin, -6)?>
</p>