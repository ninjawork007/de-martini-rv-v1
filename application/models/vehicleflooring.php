<?php
class Vehicleflooring extends ActiveRecord\Model
{
	static $table_name = 'vehicle_flooring';

	static $belongs_to = array(
		array('vehicle', 'class_name' => 'Vehicle'),
		array('flooring', 'class_name' => 'Flooring')
	);
}
