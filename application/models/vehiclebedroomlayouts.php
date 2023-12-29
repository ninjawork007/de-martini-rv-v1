<?php
class Vehiclebedroomlayouts extends ActiveRecord\Model
{
	static $table_name = 'vehicle_bedroom_layouts';

	static $belongs_to = array(
		array('vehicle', 'class_name' => 'Vehicle'),
		array('bedroom_layouts', 'class_name' => 'Bedroom_layout')
	);
}
