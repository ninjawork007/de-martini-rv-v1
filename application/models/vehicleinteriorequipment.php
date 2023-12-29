<?php
class Vehicleinteriorequipment extends ActiveRecord\Model
{
	static $table_name = 'vehicle_interior_equipment';

	static $belongs_to = array(
		array('vehicle', 'class_name' => 'Vehicle'),
		array('interior_equipment', 'class_name' => 'Interior_equipment')
	);
}
