<?php
class Vehiclecockpitoptions extends ActiveRecord\Model
{
	static $table_name = 'vehicle_cockpit_options';

	static $belongs_to = array(
		array('vehicle', 'class_name' => 'Vehicle'),
		array('cockpit_options', 'class_name' => 'Cockpit_option')
	);
}
