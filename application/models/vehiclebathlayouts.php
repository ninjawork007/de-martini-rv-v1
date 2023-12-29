<?php
class Vehiclebathlayouts extends ActiveRecord\Model
{
	static $table_name = 'vehicle_bath_layouts';

	static $belongs_to = array(
		array('vehicle', 'class_name' => 'Vehicle'),
		array('bath_layouts', 'class_name' => 'Bath_layout')
	);
}
