<?php
class Vehicleengine extends ActiveRecord\Model
{
	static $table_name = 'vehicle_engine';

	static $belongs_to = array(
		array('vehicle', 'class_name' => 'Vehicle'),
		array('engine', 'class_name' => 'Engine')
	);
}
