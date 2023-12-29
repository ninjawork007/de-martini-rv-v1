<?php
class Vehiclefurniture extends ActiveRecord\Model
{
	static $table_name = 'vehicle_furniture';

	static $belongs_to = array(
		array('vehicle', 'class_name' => 'Vehicle'),
		array('furniture', 'class_name' => 'Furniture')
	);
}
