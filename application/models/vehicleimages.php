<?php
class Vehicleimages extends ActiveRecord\Model
{
	static $table_name = 'vehicle_images';

	static $belongs_to = array(
		array('vehicle', 'class_name' => 'Vehicle'),
		array('images', 'class_name' => 'Image')
	);
}
