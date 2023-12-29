<?php
class Vehicleexteriorequipment extends ActiveRecord\Model
{
	static $table_name = 'vehicle_exterior_equipment';

	static $belongs_to = array(
		array('vehicle', 'class_name' => 'Vehicle'),
		array('exterior_equipment', 'class_name' => 'Exterior_equipment')
	);
}
